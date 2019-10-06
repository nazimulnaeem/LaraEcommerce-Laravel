


@extends('backend.layouts.master')
@section('title')
 Division Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage Division</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.division.create') }}" class="btn btn-md btn-primary mb-2">Add Division</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
            
            <thead>
            <tr>
            <th>Serial</th>
            <th>Division Name</th>
            <th>Division Priority</th>
            <th>Action</th>
            </tr>
            </thead>

           <tbody>
           @foreach($divisions as $division)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $division->name }}</td>
            <td>{{ $division->priority }}</td>
            <td>
            <a href="{{ route('admin.division.edit',$division->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $division->id }}" method="post" action="{{ route('admin.division.destroy',$division->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $division->id }}').submit();
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
            <th>Division Name</th>
            <th>Division Priority</th>
            <th>Action</th>
            </tr>
            </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection