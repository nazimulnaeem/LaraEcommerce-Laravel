<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Models\ProductImage;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function manage_product(){
        $products = Product::orderBy('id','desc')->get();
        return view('backend.pages.product.index',compact('products'));
    }

    
    public function product_create(){
        return view('backend.pages.product.create');
    }

    public function product_store(Request $request){

        $this->validate($request, [
           
            'title'=>'required|max:150',
            'description'=>'required',
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
            'category_id'=>'required|numeric',
            'brand_id'=>'required|numeric'
        ]);

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        $slug = $product->slug = str_slug($request->title);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->admin_id = 1;
        $product->save();

        // ProductImage model insert image

        // if($request->hasFile('product_image')){

        //     $image = $request->file('product_image');
        //     $img = time(). '.'. $image->getClientOriginalExtension();
        //     $location = public_path('images/products/'.$img);
        //     Image:: make($image)->save($location);

        //     $product_image = new ProductImage;
        //     $product_image->product_id = $product->id;
        //     $product_image->image= $img;
        //     $product_image->save();

        // }

        if(count($request->product_image) > 0 ){
            foreach($request->product_image as $image){
                
                $currentDate = Carbon::now()->toDateString();
                $img = $slug.'-'.$currentDate.'-'. uniqid() . '.' . $image->getClientOriginalExtension();
                $location = 'images/products/' . $img;
                Image::make($image)->save($location);

                $product_image = new ProductImage;
                $product_image->product_id = $product->id;
                $product_image->image = $img;

                $product_image->save();

            }
        }

        return redirect()->route('admin.product');
    }

    public function product_edit($id){
        $product = Product :: find($id);
        return view('backend.pages.product.edit',compact('product'));
    }

    public function product_update(Request $request, $id){


        $this->validate($request, [
           
            'title'=>'required|max:150',
            'description'=>'required',
            'quantity'=>'required|numeric',
            'price'=>'required|numeric',
            'category_id'=>'required|numeric',
            'brand_id'=>'required|numeric'
        ]);

        $product = Product :: find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;

        $slug = str_slug($request->title);


        if($request->product_image > 0 ){
            foreach($request->product_image as $image){

                 //  Delete old image from folder
                    if(File::exists('images/products/'.$product->image)){
                        File::delete('images/products/'.$product->image);
                    }
                  
                
                    $currentDate = Carbon::now()->toDateString();
                    $img = $slug.'-'.$currentDate.'-'. uniqid() .'.'. $image->getClientOriginalExtension();
                    $location = public_path('images/products/' . $img);
                    Image::make($image)->save($location);

                $product_image = ProductImage :: find($id);
                $product_image->product_id = $product->id;
                $product_image->image = $img;

                $product_image->save();

            }
        }

        $product->save();

        return redirect()->route('admin.product');
    }

public function product_destroy($id){
    $product = Product :: find($id);
    if(!is_null($product)){
        $product->delete();
    }
    // delete all images
    foreach($product->images as $img){
        // delete from path
        $file_name = $img->image;
        if(file_exists("images/products/".$file_name)){
            unlink("images/products/".$file_name);
        }
        $img->delete();
    }
    session()->flash('success','Product successsfully deleted.');
    return redirect()->back();
}


}
