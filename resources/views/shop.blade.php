@extends('layout')

@section('title', 'Products')

@section('extra-css')

@endsection

@section('content')

  <div class="breadcrumbs">
    <div class="container">
      <a href="/">Home</a>
      <i class="fa fa-chevron-right breadcrumb-separator"></i>
      <a href="{{ route('shop.index') }}">Shop</a>
    </div>
  </div> <!-- end breadcrumbs -->

  <div class="products-section container">
    <div class="sidebar">
      <h3>By Category</h3>
      <ul>
        @foreach ($categories as $category)
        <li><a href="{{  route('shop.index', ['category' => $category->slug]) }}">{{ $category->name }}</a></li>
        @endforeach
        <li><a href="#">Laptops</a></li>
        <li><a href="#">Desktops</a></li>
        <li><a href="#">Mobile Phones</a></li>
        <li><a href="#">Tablets</a></li>
        <li><a href="#">TVs</a></li>
        <li><a href="#">Digital Cameras</a></li>
        <li><a href="#">Appliances</a></li>
      </ul>

      <h3>By Price</h3>
      <ul>
        <li><a href="#">$0 - $700</a></li>
        <li><a href="#">$700 - $2500</a></li>
        <li><a href="#">$2500+</a></li>
      </ul>
    </div> <!-- end sidebar -->
    <div>
      <div class="products-header">
        <h1 class="stylish-heading">{{ $categoryName }}</h1>
        <div>
          <strong>Price: </strong>
          <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'low_high']) }}">Low to High</a> |
          <a href="{{ route('shop.index', ['category' => request()->category, 'sort' => 'high_low']) }}">High to Low</a>
        </div>
      </div>
      <div class="products text-center">

        @foreach ($products as $product)
          <div class="product">
            <a href="{{ route('shop.show', $product->slug) }}"><img src="/img/macbook-pro.png" alt="product"></a>
            <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
            <div class="product-price">{{ $product->presetPrice() }}</div>
          </div>
        @endforeach

      </div> <!-- end products -->

      <div class="spacer"></div>
      {{ $products->appends(request()->input())->links() }}
    </div>
  </div>

@endsection
