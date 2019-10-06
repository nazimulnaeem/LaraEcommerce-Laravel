


@extends('backend.layouts.master')
@section('title')
 Categoy | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage category</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.category.create') }}" class="btn btn-md btn-primary mb-2">Add category</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
           <thead>
           <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>category Image</th>
            <th>Parent category</th>
            <th>Action</th>
            </tr>
           </thead>
            
           <tbody>
           @foreach($categories as $category)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $category->name }}</td>
            <td>
            <img src="{!! asset('images/categories/'.$category->image) !!}" width="200" hight="200">
            </td>
            <td>
            @if($category->parent_id == Null)
              Primary category
            @else
              {{ $category->parent->name }}
            
            @endif
            </td>

            <td>
            <a href="{{ route('admin.category.edit',$category->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $category->id }}" method="post" action="{{ route('admin.category.destroy',$category->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $category->id }}').submit();
              }else {
                  event.preventDefault();
                      }"><a class="">delete</a></button>
           
            </td>
            </tr>
            @endforeach
           </tbody>

           <tfoot>
           <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>category Image</th>
            <th>Parent category</th>
            <th>Action</th>
            </tr>
           </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection