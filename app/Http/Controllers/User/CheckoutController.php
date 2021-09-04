<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\ShipDivision;
use App\Models\ShipState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    public function CheckoutCreate() {
        if(Auth::check()) {
            if(Cart::total() > 0) {
                $carts = Cart::content();
                $cartQty = Cart::count();
                $cartTotal = Cart::total();
                $divisions = ShipDivision::orderBy('division_name', 'ASC')->get();
                return view('frontend.checkout.checkout_view', compact('carts', 'cartQty', 'cartTotal', 'divisions'));
            }else {
                $notification = array(
                    'message' => 'Please Add Products before Checkout',
                    'alert-type' => 'error'
                );
                return redirect()->to('/')->with($notification);
            }

        }else {
            $notification = array(
                'message' => 'Please Login before Checkout',
                'alert-type' => 'error'
            );
            return redirect()->route('login')->with($notification);
        }
    }

    // Get District and State with Ajax
    public function GetDistrict($division_id) {
        $ship = ShipDistrict::where('division_id', $division_id)->orderBy('district_name', 'ASC')->get();
        return json_encode($ship);
    }

    public function GetState($district_id) {
        $ship = ShipState::where('district_id', $district_id)->orderBy('state_name', 'ASC')->get();
        return json_encode($ship);
    }

    // Checkout Store
    public function CheckoutStore(Request $request) {
        // dd($request->all());
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['post_code'] = $request->post_code;
        $data['division_id'] = $request->division_id;
        $data['district_id'] = $request->district_id;
        $data['state_id'] = $request->state_id;
        $data['notes'] = $request->notes;
        $cartTotal = Cart::total();

        if($request->payment_method =='stripe') {
            return view('frontend.payment.stripe', compact('data', 'cartTotal'));
        }elseif($request->payment_method == 'card'){
            return 'card';
        }else {
            return view('frontend.payment.cash', compact('data', 'cartTotal'));
        }
    }
}
