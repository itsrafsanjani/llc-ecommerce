@extends('frontend.layouts.master')

@section('content')

    @include('frontend.partials._hero')

    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <a href="{{ $product->slug }}">
{{--                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"--}}
{{--                                     xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice"--}}
{{--                                     focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>--}}
{{--                                        Placeholder</title>--}}
{{--                                    <rect width="100%" height="100%" fill="#55595c"/>--}}
{{--                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>--}}
{{--                                </svg>--}}
                                <img src="{{ $product->getFirstMediaUrl('products') }}" class="bd-placeholder-img card-img-top" alt="{{ $product->title }}">
                            </a>
                            <div class="card-body">
                                <a href="{{ route('frontend.product.details', $product->slug) }}">
                                    <p class="card-text">{{ $product->title }}</p>
                                </a>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary"> Add to cart
                                        </button>
                                    </div>
                                    <p class="text-muted">BDT. {{ $product->price }}</p>
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
