@extends('frontend.layouts.master')

@section('content')
    @include('frontend.partials._hero')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="{{ route('frontend.product.details', $product->slug) }}">
                                <img src="{{ $product->getFirstMediaUrl('products') }}"
                                     class="bd-placeholder-img card-img-top" alt="{{ $product->title }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('frontend.product.details', $product->slug) }}">
                                    <p class="card-text">{{ $product->title }}</p>
                                </a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ route('frontend.cart.add') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="qty" value="1">
                                        <div class="btn-group">
                                            <button type="submit" class="btn btn-sm btn-outline-secondary"> Add to cart
                                            </button>
                                        </div>
                                    </form>
                                    @if($product->sale_price)
                                        <p class="text-muted">
                                            BDT. {{ $product->sale_price }}
                                            <strike>BDT. {{ $product->price }}</strike>
                                        </p>
                                    @else
                                        <p class="text-muted">BDT. {{ $product->price }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}

        </div>
    </div>
@endsection
