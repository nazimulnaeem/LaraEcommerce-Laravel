



    @extends('frontend.layouts.master')

@section('content')

<div class="container margin-top-20">
<div class="row">

@include('frontend.partials.sidebar')

<div class="col-md-8">
<div class="widget">
<h3>All Products in <span class="badge badge-info">{{ $category->name }} category</span></h3>
@php
$products = $category->products()->paginate(9);
@endphp

@if($products->count() > 0 )
    @include('frontend.pages.products.partial.all_products')
@else
    <div class="alert alert-warning">
    No product has added yet in this category
    </div>
@endif



</div>

</div>

</div>
</div>
    
</div>

@endsection