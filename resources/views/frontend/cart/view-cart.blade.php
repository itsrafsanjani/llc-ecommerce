@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <h3 class="text-center mt-3">Cart Details</h3>
        <hr>
        <div class="row">
            <div class="col-lg-8 ">
                <table class="table table-hover border">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($carts as $cart)
                        <tr>
                            <td>Serial No.</td>
                            <td>{{$cart->name}}</td>
                            <td>TK. {{$cart->price}}</td>

                            <td>
                                <form action="{{ route('frontend.cart.update', $cart->rowId) }}" class="form-inline" method="post">
                                    @csrf
                                    <input type="number" name="qty" value="{{$cart->qty}}" class="form-control col-4">
                                    <input type="hidden" name="rowId" value="{{$cart->rowId}}">
                                    <input type="submit" name="btn" value="update" class="btn btn-primary">
                                </form>
                            </td>
                            <td>TK. {{$cart->price*$cart->qty}}</td>
                            <td>
                                <a href="#"><i class="fa fa-trash fa-2x text-danger"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <form action="{{ route('frontend.cart.destroy') }}" method="post">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">Clear All</button>
                </form>
            </div>
            <div class="col-lg-4">
                <table class="table table-hover border">
                    <tr>
                        <th>Subtotal:</th>
                        <td>{{ Cart::subtotal() }}</td>
                    </tr>
                    <tr>
                        <th>Tax (18%):</th>
                        <td>{{ Cart::tax() }}</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>{{ Cart::total() }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection
