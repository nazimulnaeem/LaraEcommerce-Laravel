
@extends('backend.layouts.master')
@section('title')
 Division Edit Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header">
                Edit Division
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.division.update',$division->id) }}">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $division->name }}">
            </div>
            <div class="form-group">
                <label for="priority">Priority</label>
                <input type="number" class="form-control" priority="priority" id="priority" aria-describedby="emailHelp" value="{{ $division->priority }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Update Division</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection