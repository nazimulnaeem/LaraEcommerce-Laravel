


@extends('backend.layouts.master')
@section('title')
 Product Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage Product</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.product.create') }}" class="btn btn-md btn-primary mb-2">Add Product</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
           
            <thead>
           <tr>
            <th>Serial</th>
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
            </tr>
           </thead>

           <tbody>
           @foreach($products as $product)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $product->title }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
            <a href="{{ route('admin.product.edit',$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $product->id }}" method="post" action="{{ route('admin.product.destroy',$product->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $product->id }}').submit();
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
            <th>Title</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
            </tr>
           </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection