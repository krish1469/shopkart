<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderMail;
use Carbon\Carbon;
use PDF;

class AllUserController extends Controller
{
    public function MyOrders() {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.orders_view', compact('orders'));
    }

    public function OrderDetails($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.order_details', compact('order', 'orderItem'));
    }

    public function InvoiceDownload($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        // return view('frontend.user.orders.order_invoice', compact('order', 'orderItem'));
        $pdf = PDF::loadView('frontend.user.orders.order_invoice',compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    // Return Order 
    public function ReturnOrder(Request $request, $order_id) {
        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);

        $notification = array(
            'message' => 'Return Requested Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('my.orders')->with($notification);
    }

    // Return Order List
    public function ReturnOrderList() {
        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.return_orders_view', compact('orders'));
    }

    // Cancel Order List
    public function CancelOrderList() {
        $orders = Order::where('user_id', Auth::id())->where('status', 'Cancelled')->orderBy('id', 'DESC')->get();
        return view('frontend.user.orders.cancel_orders_view', compact('orders'));
    }
}
