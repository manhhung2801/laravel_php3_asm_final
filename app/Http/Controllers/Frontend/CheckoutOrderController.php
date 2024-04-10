<?php

namespace App\Http\Controllers\Frontend;


use Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutOrderController extends Controller
{
    public function index() {
        $total = $this->total();

        return view('frontend.checkout-order', compact('total'));
    }

    // total cart
    public function total(){
        $total = 0;
        foreach (Cart::content() as $product) {
            $total += ($product->price + $product->options->variants_total) * $product->qty;
        }
        return $total ;
    }

    public function order(Request $request){

        $request->validate([
            "username" => ['required', 'string'],
            "phone" => ['required', 'integer'],
            "email" => ['required', 'email'],
            "address" => ['required', 'string'],
        ]);

        $uuid = Str::uuid();
        $code = "OD-DT-" .  strtoupper(substr($uuid, 0, 20));

        // order
        $order = new Order();

        $order->username = $request->username;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->address = $request->address;
        $order->note = $request->note;
        $order->code_order =  $code;



        $order->user_id = Auth::user()->id;
        if (session()->exists('applyVoucher') && session()->exists('totalApplyVoucher')){
            $order->voucher = session('applyVoucher')->code;
            $order->total = session('totalApplyVoucher');
        }else {
            $order->total = $this->total();
        }

        foreach(Cart::content() as $cart){
             // order detail
            $orderDetail = new OrderDetail();

            $orderDetail->qty = $cart->qty;
            $orderDetail->options = $cart->options;
            $orderDetail->product_id = $cart->id;
            $orderDetail->code_order = $code;
            $orderDetail->save();
        }

        // add
        $order->save();
        // Forget multiple keys...
        session()->forget(['applyVoucher', 'totalApplyVoucher']);
        Cart::destroy();

        toastr()->success('Đặt hàng thành công.');

        return redirect()->back();


    }
}
