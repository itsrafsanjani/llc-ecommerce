@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="card my-3">
            <div class="row">
                <div class="col-sm-5 border-right">
                    <div class="gallery-wrap">
                        <div>
                            <img src="{{ $product->getFirstMediaUrl('products') }}" alt="{{ $product->title }}"
                                 class="card-img">
                        </div>
                    </div>
                </div>
                <div class="col-sm-7">
                    <article class="card-body p-5">
                        <h3 class="title mb-3">
                            {{ $product->title }}
                        </h3>
                        <p class="price-detail-wrap">
                            <span class="price h3 text-warning">
                                <span class="currency">BDT </span>
                                @if($product->sale_price)
                                    <span class="num">
                                    BDT. {{ $product->sale_price }}
                                    <strike>BDT. {{ $product->price }}</strike>
                                </span>
                                @else
                                    <span class="num">
                                    BDT. {{ $product->price }}
                                </span>
                                @endif
                            </span>
                        </p>
                        <dl class="item-property">
                            <dt>Description</dt>
                            <dd><p>{{ $product->description }}</p></dd>
                        </dl>
                        <hr>
                        <a href="#" class="btn btn-lg btn-outline-primary text-uppercase">Add to cart</a>
                    </article>
                </div>
            </div>


        </div>
    </div>
@endsection
