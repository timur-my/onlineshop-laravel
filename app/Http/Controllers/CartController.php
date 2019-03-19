<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
  public function show() {
    if(view()->exists('site.cart')) {
      $products = session('cart.products');
      $total_price = 0;
      if($products) {
        foreach($products as $product) {
          $total_price += $product['price']*$product['quantity'];
        }
      }
      $data = [
        'title'=>'Cart',
        'products'=>$products,
        'total_price'=>$total_price,
        'shipment'=>30,
      ];

      return view('site.cart', $data);
    }
    return abort(404);
  }

  public function add($id) {
    $quantity = $_POST['quantity'] ?? 1;
    $cart_products = session('cart.products');
    if($cart_products) {
      foreach($cart_products as $id_product=>$product) {
        if($product['id'] == $id) {
          session(["cart.products.$id_product.quantity"=>$product['quantity']+$quantity]);
          return redirect(route('cart'));
        }
      }
    }
    $product = Product::find($id);
    session()->push('cart.products',['id'=>$product->id,'name'=>$product->name,'price'=>$product->price,'description'=>$product->description,'image'=>$product->image,'quantity'=>$quantity]);
    return redirect(route('cart'));
  }
}
