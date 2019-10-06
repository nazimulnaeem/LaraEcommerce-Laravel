
@extends('backend.layouts.master')
@section('title')
 Create Product | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Create New Product</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp" placeholder="Enter title">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description" cols="80" rows="8"></textarea>
   
            </div>
            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="emailHelp" placeholder="Enter quantity">
            </div>
            
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" name="price" id="price" aria-describedby="emailHelp" placeholder="Enter price">
            </div>
            
            <div class="form-group">
                <label for="price">Select Category</label>
                <select name="category_id" class="form-control">
                <option value="">Please select a category for the product</option>
                @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
  
                <option value="{{ $parent->id }}">{{ $parent->name }}</option>
               
                @foreach(App\Models\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                <option value="{{ $child->id }}"> -----> {{ $child->name }}</option>
                @endforeach
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="price">Select Brand</label>
                <select name="brand_id" class="form-control">
                <option value="">Please select a brand for the product</option>
                @foreach(App\Models\Brand::orderBy('name','asc')->get() as $brand)
  
                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
               
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="product_image">Product Image</label>
                <div class="row">
                    <div class="col-md-4">
                     <input type="file" class="form-control" name="product_image[]" id="product_image">
                    </div>
                    <div class="col-md-4">
                     <input type="file" class="form-control" name="product_image[]" id="product_image">
                    </div>
                    <div class="col-md-4">
                     <input type="file" class="form-control" name="product_image[]" id="product_image">
                    </div>
                    <div class="col-md-4">
                     <input type="file" class="form-control" name="product_image[]" id="product_image">
                    </div>
                    <div class="col-md-4">
                     <input type="file" class="form-control" name="product_image[]" id="product_image">
                    </div>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection