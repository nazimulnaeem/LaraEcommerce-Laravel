<?php

namespace App\Models;
use Auth;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $fillable = [
        'user_id',
        'product_id',
        'order_id',
        'ip_address',
        'product_quantity'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    
       /*
        total  cart
        @return integer total cart

        */
        public static function totalcarts(){
            if(Auth::check()){
                $carts = Cart :: where('user_id',Auth::id())
                        ->orWhere('ip_address', request()->ip())
                         ->where('order_id',NULL)
                         ->get();
            }else{
                $carts = Cart :: where('ip_address',request()->ip())->get();
            }
            return $carts;
        
            }
        

       /*
        total item in the cart
        @return integer total item

        */
    public static function totalItems(){
    $carts = Cart :: totalcarts();

    $total_item = 0;
    foreach($carts as $cart){
        $total_item += $cart->product_quantity;
    }
    return $total_item;

    }


}
