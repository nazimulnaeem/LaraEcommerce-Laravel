<?php

namespace App\Http\Controllers\Backend;

use App\Models\Brand;
use App\Models\Category;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.category.index',compact('categories'));
    }
    public function create(){
        $main_category = Category::orderBy('name','desc')->where('parent_id',null)->get();
        return view('backend.pages.category.create',compact('main_category'));
    }

    public function edit($id){
        
        $main_category = Category::orderBy('name','desc')->where('parent_id',null)->get();
        $category = Category::find($id);
        if(!is_null($category)){
            return view('backend.pages.category.edit',compact('category','main_category'));
        }else{
            return redirect()->route('admin.categories');
        }
    }

    public function store(Request $request){

        $this->validate($request, [
           
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|image',
        ],[
            'name.required' => 'Please provide category name',
            'image.image' => 'Please insert valid image with jpg, png, gif, jpeg extension..'
        ]
    );

    $category = new Category();
    $category->name = $request->name;
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;

     if($request->image > 0 ){

            $currentDate = Carbon::now()->toDateString();
            $image = $request->file('image');
            $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
            $location = 'images/categories/'.$img;
            Image:: make($image)->save($location);
            $category->image = $img;

        }

    $category->save();

    session()->flash('success','Category added successfully !!');
    return redirect()->route('admin.categories');

    }


    public function update(Request $request, $id){

        $this->validate($request, [
           
            'name'=>'required',
            'description'=>'required',
            'image'=>'nullable|image',
        ],[
            'name.required' => 'Please provide category name',
            'image.image' => 'Please insert valid image with jpg, png, gif, jpeg extension..'
        ]
    );

    $category =  Category::find($id);
    $category->name = $request->name;
    $category->description = $request->description;
    $category->parent_id = $request->parent_id;

     if($request->image > 0 ){
        //  Delete old image from folder

        if(File::exists('images/categories/'.$category->image)){
            File::delete('images/categories/'.$category->image);
        }

           $currentDate = Carbon::now()->toDateString();
            $image = $request->file('image');
            $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
            $location = 'images/categories/'.$img;
            Image:: make($image)->save($location);
            $category->image = $img;

        }

    $category->save();

    session()->flash('success','Category updated successfully !!');
    return redirect()->route('admin.categories');

    }

    public function destroy($id){
        $category = Category :: find($id);
        if(!is_null($category)){
            // if it is parent category then delet all sub category
            if($category->parent_id == null){
                // delete sub category

                $sub_category = Category::orderBy('name','desc')->where('parent_id',$category->id)->get();
                foreach($sub_category as $sub){
                    // delete category image
                    if(File::exists('images/categories/'.$category->image)){
                        File::delete('images/categories/'.$category->image);
                    }

                    $sub->delete();
                }

            }

            // delete category image

            if(File::exists('images/categories/'.$category->image)){
                File::delete('images/categories/'.$category->image);
            }

        $category->delete();
        }
        session()->flash('success','Category successsfully deleted.');
        return redirect()->back();
    }

}
