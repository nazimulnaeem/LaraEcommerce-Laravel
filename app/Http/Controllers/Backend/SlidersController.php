<?php

namespace App\Http\Controllers\Backend;

use App\Models\Slider;
use Image;
use File;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SlidersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    
    public function index(){
        $sliders = Slider::orderBy('priority','asc')->get();
        return view('backend.pages.slider.index',compact('sliders'));
    }

    public function create(){
        return view('backend.pages.slider.create');
    }


    public function store(Request $request){
        $this->validate($request,[
            'title' => 'required',
            'priority' => 'required',
            'image'=>'nullable|image',
            'button_link'=>'nullable|url',
        ],
    [
        'title.required' => 'Please provide a slider title',
        'priority.required' => 'Please provide a priority',
        'image.image' => 'Please insert valid image with jpg, png, gif, jpeg extension..'
    ]);


    $slider = new Slider();
    $slider->title = $request->title;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;

    if($request->image > 0 ){

        $currentDate = Carbon::now()->toDateString();
        $image = $request->file('image');
        $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
        $location = 'images/sliders/'.$img;
        Image:: make($image)->save($location);
        $slider->image = $img;

    }

    $slider->save();
    session()->flash('success','A new slider added successfully !!');
    return redirect()->route('admin.sliders');

    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('backend.pages.slider.edit',compact('slider'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'title' => 'required',
            'priority' => 'required',
        ],
    [
        'title.required' => 'Please provide a slider title',
        'priority.required' => 'Please provide a priority'
    ]);


    $slider = Slider::find($id);
    $slider->title = $request->title;
    $slider->button_text = $request->button_text;
    $slider->button_link = $request->button_link;
    $slider->priority = $request->priority;

    if($request->image > 0 ){
        //  Delete old image from folder

        if(File::exists('images/sliders/'.$slider->image)){
            File::delete('images/sliders/'.$slider->image);
        }

           $currentDate = Carbon::now()->toDateString();
            $image = $request->file('image');
            $img = $currentDate. '.'. uniqid() . '.'. $image->getClientOriginalExtension();
            $location = 'images/sliders/'.$img;
            Image:: make($image)->save($location);
            $slider->image = $img;

        }


    $slider->save();

    session()->flash('success','Slider has update successfully');
    return redirect()->route('admin.sliders');

    }

    public function destroy($id){

    $slider = Slider :: find($id);
    if(!is_null($slider)){

        // delete slider image

        if(File::exists('images/sliders/'.$slider->image)){
            File::delete('images/sliders/'.$slider->image);
        }

    $slider->delete();
    }
    session()->flash('success','slider deleted successfully');
    return back();

    }



}
