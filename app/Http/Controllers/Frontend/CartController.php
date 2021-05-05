<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CartController extends Controller
{
    public function showCart()
    {
        $data['carts'] = Cart::content();
        return view('frontend.cart.view-cart', $data);
    }

    public function addToCart(Request $request)
    {
        try {
            $this->validate($request, [
                'product_id' => 'required|numeric'
            ]);

            $product = Product::findOrFail($request->input('product_id'));

            Cart::add([
                'id'=>$product->id,
                'name'=>$product->title,
                'price'=>$product->price,
                'qty'=>$request->input('qty'),
                'weight'=> 0,
                'options' => []
            ]);

            session()->flash('message', $product->title.' added to cart');

            return redirect()->back();

        } catch (ValidationException $e) {
            return redirect()->back();
        }
    }

    public function updateCart(Request $request, $id)
    {
        Cart::update($id, $request->input('qty'));

        session()->flash('message', 'Cart updated');

        return redirect()->back();
    }

    public function destroyCart()
    {
        Cart::destroy();
        session()->flash('message', 'Cart cleared');

        return redirect()->route('frontend.home');
    }
}
