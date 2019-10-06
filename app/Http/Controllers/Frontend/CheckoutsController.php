<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CheckoutsController extends Controller
{
    public function index(){
        $payments = Payment :: orderBy('priority','asc')->get();
        return view('frontend.pages.checkouts',compact('payments'));
    }


    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'phone' => 'required',
            'shipping_address' => 'required',
            'payment_method_id' => 'required'
        ]);

        $order = new Order();
        // check transaction ID has given or not
        if($request->payment_method_id !='cash_in'){
            if($request->transaction_id == null || empty($request->transaction_id)){
                session()->flash('sticky_error','Please give transaction id for your payment');
                return back();
            }
        }

        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->shipping_address = $request->shipping_address;
        $order->message = $request->message;
        $order->ip_address = request()->ip();
        $order->transaction_id = $request->transaction_id;
        if(Auth::check()){
            $order->user_id = Auth::id();
        }

        $order->payment_id = Payment :: where('short_name', $request->payment_method_id)->first()->id;
        $order->save(); 

        foreach(Cart::totalcarts() as $cart){
            $cart->order_id = $order->id;
            $cart->save();
        }

        session()->flash('success','Your ordr has taken successfully !! Please wait admin will soon confirm it.');
               
        return redirect()->route('index');


    }


}
