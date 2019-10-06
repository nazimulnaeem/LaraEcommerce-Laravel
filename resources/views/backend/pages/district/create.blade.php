
@extends('backend.layouts.master')
@section('title')
 District Create | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header mt-3 ml-2">
                <h4>Create New District</h4>
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.district.store') }}" >
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Enter District name">
            </div>

            <div class="form-group">
                <label for="division_id">Select a Division for the district</label>
                <select name="division_id" class="form-control" >
                <option value="">Please select a division for the district</option>
                @foreach($divisions as $division)
                <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')
        
@endsection