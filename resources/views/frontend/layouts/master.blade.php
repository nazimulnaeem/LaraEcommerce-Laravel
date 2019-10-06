
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @include('frontend.partials.style')
    <title>
        @yield('title','Laravel Ecommerce Project')
    </title>
</head>
<body>


@include('frontend.partials.nav')

@include('frontend.partials.message')

@yield('content')

@include('frontend.partials.footer')

@include('frontend.partials.scripts')

@yield('scripts')

</body>
</html>