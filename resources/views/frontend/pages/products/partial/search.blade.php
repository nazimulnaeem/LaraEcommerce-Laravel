

    @extends('frontend.layouts.master')
@section('title')
Search Product
@endsection

@section('content')

<div class="container margin-top-20">
<div class="row">

@include('frontend.partials.sidebar')

<div class="col-md-8">
<div class="widget">
<h3>Search Products for - <span class="badge badge-primary">{{ $search }}</span></h3>

@include('frontend.pages.products.partial.all_products')


</div>

</div>
</div>
</div>
    
</div>

@endsection