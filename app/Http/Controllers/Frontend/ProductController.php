<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    
    public function index(){
        $products = Product::orderBy('id','desc')->get();
        return view('frontend.pages.products.index',compact('products'));
    }

    public function show($slug){
        $product = Product :: where('slug',$slug)->first();
            if(!is_null($product)){
                return view('frontend.pages.products.show',compact('product'));
            }else{
                session()->flash('success','Sorry ! there is no product by this URL...');
                return redirect()->route('products');
            }
        }
}
