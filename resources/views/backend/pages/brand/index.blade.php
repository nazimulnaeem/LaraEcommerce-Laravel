


@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage Brand</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.brand.create') }}" class="btn btn-md btn-primary mb-2">Add Brand</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
           
            <thead>
           <tr>
            <th>Serial</th>
            <th>Name</th>
            <th>Brand Image</th>
            <th>Action</th>
            </tr>
           </thead>

            <tbody>
            @foreach($brands as $brand)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $brand->name }}</td>
            <td>
            <img src="{!! asset('images/brands/'.$brand->image) !!}" width="200" hight="200">
            </td>

            <td>
            <a href="{{ route('admin.brand.edit',$brand->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $brand->id }}" method="post" action="{{ route('admin.brand.destroy',$brand->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $brand->id }}').submit();
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
            <th>Brand Image</th>
            <th>Action</th>
            </tr>
           </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')

@endsection