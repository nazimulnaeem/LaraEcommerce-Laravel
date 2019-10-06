
@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Create New Brand</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.brand.store') }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter name">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="80" rows="8"></textarea>
           </div>

            
            <div class="form-group">
                <label for="image">Brand Image</label>
                     <input type="file" class="form-control" name="image" id="image">
                    
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')
        
@endsection