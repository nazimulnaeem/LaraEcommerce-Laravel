


@extends('backend.layouts.master')
@section('title')
 District Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage District</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.district.create') }}" class="btn btn-md btn-primary mb-2">Add District</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
            
            <thead>
            <tr>
            <th>Serial</th>
            <th>District Name</th>
            <th>Action</th>
            </tr>
            </thead>
            
            <tbody>
            @foreach($districts as $district)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $district->name }}</td>
            <td>
            <a href="{{ route('admin.district.edit',$district->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $district->id }}" method="post" action="{{ route('admin.district.destroy',$district->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $district->id }}').submit();
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
            <th>District Name</th>
            <th>Action</th>
            </tr>
            </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection