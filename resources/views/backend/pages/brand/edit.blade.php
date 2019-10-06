
@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header">
                Edit Brand
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.brand.update',$brand->id) }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $brand->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="80" rows="8">
                {{ $brand->description }}
                </textarea>
            </div>

           
            <div class="form-group">
                <label for="oldimage">Brand Old Image</label><br>
            <img src="{!! asset('images/brands/'.$brand->image) !!}" width="100" >     
            </div>

            <div class="form-group">
                <label for="image">brand New Image</label>
                 <input type="file" class="form-control" name="image" id="image">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Brand</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection