


@extends('backend.layouts.master')
@section('title')
 Slider Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Manage Slider</h4>
            </div>
           
            <div class="card-body">
            <a href="{{ route('admin.slider.create') }}" class="btn btn-md btn-primary mb-2">Add Slider</a>
            @include('backend.partial.message')
            <table class="table table-hover table-striped mt-3" id="dataTable">
            
            <thead>
            <tr>
            <th>Serial</th>
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Slider Priority</th>
            <th>Action</th>
            </tr>
            </thead>

           <tbody>
           @foreach($sliders as $slider)
            <tr>
            <td>{{ $loop->index + 1 }}</td>
            <td>{{ $slider->title }}</td>
            <td>
            <img src="{!! asset('images/sliders/'.$slider->image) !!}" width="200" hight="200">
            </td>
            <td>{{ $slider->priority }}</td>
            <td>
            <a href="{{ route('admin.slider.edit',$slider->id) }}" class="btn btn-sm btn-primary">Edit</a>
            
            <form id="delete-form-{{ $slider->id }}" method="post" action="{{ route('admin.slider.destroy',$slider->id) }}"
                  style="display: none;">
                @csrf
                @method('DELETE')
            </form>
              <button type="button" class="btn btn-danger btn-sm" 
                  onclick="if(confirm('Are you sure? You want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{ $slider->id }}').submit();
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
            <th>Slider Title</th>
            <th>Slider Image</th>
            <th>Slider Priority</th>
            <th>Action</th>
            </tr>
            </tfoot>

            </table>
            </div>


        </div>

        @include('backend.partial.footer')


@endsection