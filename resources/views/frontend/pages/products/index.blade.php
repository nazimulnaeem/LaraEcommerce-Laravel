



    @extends('frontend.layouts.master')

    @section('content')

    <div class="container margin-top-20">
    <div class="row">

    @include('frontend.partials.sidebar')

    <div class="col-md-8">
    <div class="widget">
    <h3>All Products</h3>
    
    @include('frontend.pages.products.partial.all_products')


    </div>

    </div>

    </div>
    </div>
        
    </div>

    @endsection