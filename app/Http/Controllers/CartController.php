<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request, $productID)
    {
        $product = Product::findOrFail($productID);
        $cart = $this->getCart();

        $cart->product()->syncWithoutDetaching([
            $productID => [
                'quantity' => $request->quantity ?? 1,
                'price' => $product->price,
            ],
        ]);
        return redirect()->route('cart')->with('success', 'Item added to cart!');
    }

    private function getCart()
    {
        if (auth()->check()) {
            return Cart::firstOrCreate(['user_id' => auth()->id()]);
        }
    }

    public function Showcart()
    {
        $cart = $this->Getcart();
        $Cartitems = $cart->product()->Withpivot('Quantity', 'Price')->Get();
        $Total = $Cartitems->Sum(function ($Item) {
            return $Item->Pivot->Price * $Item->Pivot->Quantity;
        });
        return View('Cart', Compact('Cartitems', 'Total'));
    }
}
