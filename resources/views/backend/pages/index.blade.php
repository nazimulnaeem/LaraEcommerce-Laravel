
@extends('backend.layouts.master')

@section('content')

<div class="main-panel">
        <div class="content-wrapper">
            
            <div class="card card-body">
            <h3>Welcome to admin pannel</h3>
            <p>
            <a href="{{ route('admin.index') }}" class="btn btn-primary">Visite main site</a>
            </p>
            </div>
         
            @include('backend.partial.footer')

@endsection