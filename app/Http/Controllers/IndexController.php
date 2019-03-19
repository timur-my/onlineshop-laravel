<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
  public function show() {
    if(view()->exists('site.home')) {

      $products_popular = Product::select('*')->orderBy('views', 'desc')->take(12)->get();
      $products_last = Product::select('*')->orderBy('created_at', 'desc')->take(8)->get();
      $data = [
        'title'=>'Home',
        'products_popular'=>$products_popular,
        'products_last'=>$products_last,
      ];

      return view('site.home', $data);
    }
    return abort(404);
  }
}