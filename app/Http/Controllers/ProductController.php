<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
  public function show($id) {
    if(view()->exists('site.product')) {
      $product = Product::find($id);
      $data = [
        'id'=>$id,
        'title'=>$product->name,
        'product'=>$product,
      ];

      return view('site.product', $data);
    }
    return abort(404);
  }
}
