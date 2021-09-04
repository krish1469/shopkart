<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class OrderController extends Controller
{
    // Pending Orders
    public function PendingOrders() {
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_orders', compact('orders'));
    }

    // Pending Order Details
    public function PendingOrderDetails($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('backend.orders.pending_order_details', compact('order', 'orderItem'));
    }

    // Confirmed Orders
    public function ConfirmedOrders() {
        $orders = Order::where('status', 'Confirmed')->orderBy('id', 'DESC')->get();
        return view('backend.orders.confirmed_orders', compact('orders'));
    }

    // Processing Orders
    public function ProcessingOrders() {
        $orders = Order::where('status', 'Processing')->orderBy('id', 'DESC')->get();
        return view('backend.orders.processing_orders', compact('orders'));
    }

    // Picked Orders
    public function PickedOrders() {
        $orders = Order::where('status', 'Picked')->orderBy('id', 'DESC')->get();
        return view('backend.orders.picked_orders', compact('orders'));
    }

    // Shipped Orders
    public function ShippedOrders() {
        $orders = Order::where('status', 'Shipped')->orderBy('id', 'DESC')->get();
        return view('backend.orders.shipped_orders', compact('orders'));
    }

    // Delivered Orders
    public function DeliveredOrders() {
        $orders = Order::where('status', 'Delivered')->orderBy('id', 'DESC')->get();
        return view('backend.orders.delivered_orders', compact('orders'));
    }

    // Cancelled Orders
    public function CancelledOrders() {
        $orders = Order::where('status', 'Cancelled')->orderBy('id', 'DESC')->get();
        return view('backend.orders.cancelled_orders', compact('orders'));
    }

    public function PendingToConfirm($order_id) {
        Order::findOrFail($order_id)->update(['status' => 'Confirmed']);

        $notification = array(
            'message' => 'Order Confirmed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function ConfirmToProcessing($order_id) {
        Order::findOrFail($order_id)->update(['status' => 'Processing']);

        $notification = array(
            'message' => 'Order Processed Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function ProcessingToPicked($order_id) {
        Order::findOrFail($order_id)->update(['status' => 'Picked']);

        $notification = array(
            'message' => 'Order Picked Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function PickedToShipped($order_id) {
        Order::findOrFail($order_id)->update(['status' => 'Shipped']);

        $notification = array(
            'message' => 'Order Shipped Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function ShippedToDelivered($order_id) {
        $product = OrderItem::where('order_id', $order_id)->get();
        foreach($product as $item) {
            Product::where('id', $item->product_id)->update(['product_qty' => DB::raw('product_qty-'. $item->qty)]);
        }

        Order::findOrFail($order_id)->update(['status' => 'Delivered']);

        $notification = array(
            'message' => 'Order Delivered Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function DeliveredToCancelled($order_id) {
        Order::findOrFail($order_id)->update(['status' => 'Cancelled']);

        $notification = array(
            'message' => 'Order Cancelled Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('pending-orders')->with($notification);
    }

    public function AdminInvoiceDownload($order_id) {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $pdf = PDF::loadView('backend.orders.order_invoice', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }
}
