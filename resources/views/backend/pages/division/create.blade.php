
@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Create New Division</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.division.store') }}" >
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter division name">
            </div>
            <div class="form-group">
                <label for="name">Priority</label>
                <input type="text" class="form-control" name="priority" id="name" aria-describedby="emailHelp" >
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')
        
@endsection