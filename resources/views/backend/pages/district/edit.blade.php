
@extends('backend.layouts.master')
@section('title')
 District Edit Page | Lara Ecommerce Admin dashboard
@endsection
@section('content')

<div class="main-panel">
        <div class="content-wrapper">
        
        <div class="card">
            <div class="header">
                Edit District
            </div>
            <div class="card-body">
            <form method="post" action="{{ route('admin.district.update',$district->id) }}">
                @csrf
                @include('backend.partial.message')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" value="{{ $district->name }}">
            </div>

            <div class="form-group">
                <label for="division_id">Select a Division for the district</label>
                <select name="division_id" class="form-control" >
                <option value="">Please select a division for the district</option>
                @foreach($divisions as $dvsn)
                <option value="{{ $dvsn->id }}" {{ $district->division->id == $dvsn->id ? 'selected' : '' }}>{{ $dvsn->name }}</option>
                @endforeach
                </select>
            </div>

            
            <button type="submit" class="btn btn-primary">Update District</button>
            </form>
            </div>
        </div>

        @include('backend.partial.footer')

@endsection