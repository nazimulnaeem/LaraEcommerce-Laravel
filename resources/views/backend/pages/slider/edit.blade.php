
@extends('backend.layouts.master')
@section('title')
 Slider Edit Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-2 ml-2">
                <h4>Edit Slider</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.slider.update',$slider->id) }}">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="title">Title <small class="text-danger">(required)</small></label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" value="{{ $slider->title }}">
            </div>
            <div class="form-group">
                <label for="button_text">Slider Button text <small>(optional)</small></label>
                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Enter slider text"placeholder="Enter slider button text" value="{{ $slider->button_text }}">
            </div>
            <div class="form-group">
                <label for="button_link">Slider Button link <small>(optional)</small></label>
                <input type="url" class="form-control" name="button_link" id="button_link" aria-describedby="emailHelp" placeholder="Enter slider button link" value="{{ $slider->button_link }}">
            </div>
            <div class="form-group">
                <label for="priority">Priority <small class="text-danger">(required)</small></label>
                <input type="number" class="form-control" priority="priority" id="priority" aria-describedby="emailHelp" value="{{ $slider->priority }}">
            </div>
            
            <div class="form-group">
                <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                <div>
                
                <img src="{!! asset('images/sliders/'.$slider->image) !!}" width="80" hight="120">
                </div>
                     <input type="file" class="form-control" name="image" id="image">
                    
            </div>
            
            <button type="submit" class="btn btn-primary">Update slider</button>
            <a class="btn btn-primary" href="{{ route('admin.sliders') }}">Back to slider</a>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection