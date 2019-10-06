
@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Create New Slider</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.slider.store') }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Title <small class="text-danger">(required)</small></label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter slider title">
            </div>
            <div class="form-group">
                <label for="button_text">Slider Button text <small>(optional)</small></label>
                <input type="text" class="form-control" name="button_text" id="button_text" placeholder="Enter slider button text"placeholder="Enter slider button text" >
            </div>
            <div class="form-group">
                <label for="button_link">Slider Button link <small>(optional)</small></label>
                <input type="url" class="form-control" name="button_link" id="button_link" aria-describedby="emailHelp" placeholder="Enter slider button link">
            </div>
            <div class="form-group">
                <label for="priority">Priority <small class="text-danger">(required)</small></label>
                <input type="text" class="form-control" name="priority" id="priority" aria-describedby="emailHelp" >
            </div>
            
            <div class="form-group">
                <label for="image">Slider Image <small class="text-danger">(required)</small></label>
                     <input type="file" class="form-control" name="image" id="image">
                    
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')
        
@endsection