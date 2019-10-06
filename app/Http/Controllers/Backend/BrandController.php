<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brand.index',compact('brands'));
    }
    public function create(){
        return view('backend.pages.brand.create');
    }

    public function edit($id){
        
        $brand = Brand::find($id);
        if(!is_null($brand)){
            return view('backend.pages.brand.edit',compact('brand'));
        }else{
            return redirect()->route('admin.brands');
        }
    }

    public function store(Request $request){

        $this->validate($request, [
           
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|image',
        ],[
            'name.required' => 'Please provide brand name',
            'image.image' => 'Please insert valid image with jpg, png, gif, jpeg extension..'
        ]
    );

    $brand = new Brand();
    $brand->name = $request->name;
    $brand->description = $request->description;

     if($request->image > 0 ){

            $currentDate = Carbon::now()->toDateString();
            $image = $request->file('image');
            $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
            $location = 'images/brands/'.$img;
            Image:: make($image)->save($location);
            $brand->image = $img;

        }

    $brand->save();

    session()->flash('success','brand added successfully !!');
    return redirect()->route('admin.brands');

    }


    public function update(Request $request, $id){

        $this->validate($request, [
           
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|image',
        ],[
            'name.required' => 'Please provide brand name',
            'image.image' => 'Please insert valid image with jpg, png, gif, jpeg extension..'
        ]
    );

    $brand =  Brand::find($id);
    $brand->name = $request->name;
    $brand->description = $request->description;
     if($request->image > 0 ){
        //  Delete old image from folder

        if(File::exists('images/brands/'.$brand->image)){
            File::delete('images/brands/'.$brand->image);
        }

           $currentDate = Carbon::now()->toDateString();
            $image = $request->file('image');
            $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
            $location = 'images/brands/'.$img;
            Image:: make($image)->save($location);
            $brand->image = $img;

        }

    $brand->save();

    session()->flash('success','brand updated successfully !!');
    return redirect()->route('admin.brands');

    }

    public function destroy($id){
        $brand = Brand :: find($id);
        if(!is_null($brand)){
         
            // delete brand image

            if(File::exists('images/brands/'.$brand->image)){
                File::delete('images/brands/'.$brand->image);
            }

        $brand->delete();
        }
        session()->flash('success','brand successsfully deleted.');
        return redirect()->back();
    }

}
