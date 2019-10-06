

@extends('frontend.layouts.master')

@section('title')
Laravel Ecommerce site
@endsection

@section('content')

@include('frontend.partials.slider')

<div class="container margin-top-20">

<div class="row">
@include('frontend.partials.sidebar')

<div class="col-md-8">
<div class="widget">
<h3>Features Products</h3>


@include('frontend.pages.products.partial.all_products')
<div class="pagination mt-3">
    {{ $products->links() }}
    </div>

</div>

</div>

</div>
</div>
    
</div>

@endsection