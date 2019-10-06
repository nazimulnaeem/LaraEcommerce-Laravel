
@extends('backend.layouts.master')
@section('title')
 Edit Category | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header">
                Edit Category
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.category.update',$category->id) }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $category->name }}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="80" rows="8">
                {{ $category->description }}
                </textarea>
            </div>

            <div class="form-group">
                <label for="parent_id">Parent Category</label>
                <select name="parent_id" id="parent_id" class="form-control">
                <option value="">Select a primary category</option>
                @foreach($main_category as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $category->parent_id ? 'selected' : '' }}>
                {{ $cat->name }}
                </option>
                @endforeach
                </select>
            </div>
           
            <div class="form-group">
                <label for="oldimage">Category Old Image</label><br>
            <img src="{!! asset('images/categories/'.$category->image) !!}" width="100" >     
            </div>

            <div class="form-group">
                <label for="image">Category New Image</label>
                 <input type="file" class="form-control" name="image" id="image">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Category</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection