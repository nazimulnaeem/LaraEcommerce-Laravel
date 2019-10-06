<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){

    }

    public function show($id){
        $category = Category::find($id);
        if(!is_null($category)){
            return view('frontend.pages.categories.show',compact('category'));
        }else{
            session()->flash('errors','Sorry there is no category by this ID !!');
        }
    }

}
