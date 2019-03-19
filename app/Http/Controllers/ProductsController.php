<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductsController extends Controller
{
  public function show(Request $request,$category_alias) {
    if(view()->exists('site.products')) {
      if($request->isMethod('POST')) {
        session(['paginate'=>$request->input('prod-per-page')]);
        session(['sort_by'=>$request->input('sort')]);
        return redirect()->route('products',$category_alias);
      }
      if(!session('paginate')) {
        session(['paginate'=>9]);
      }
      $paginate = session('paginate');
      if(!session('sort_by')) {
        session(['sort_by'=>'created_at']);
      }
      $sort_by = session('sort_by');
      $categories = Category::all();
      foreach($categories as $cat) {
        if($cat->alias == $category_alias) {
          $category = $cat;
        }
      }

      $categories_child_arr = [];
      foreach($categories as $cat) {
        if($cat->parent_id == $category->id) {
          $categories_child_arr[] = $cat;
          if(count($categories_child_arr)>0){
            foreach ($categories as $cat2) {
              if($cat2->parent_id == $cat->id) {
                $categories_child_arr[] = $cat2;
              }
            }
          }
        }
      }

      if(count($categories_child_arr)>0) {
        $category_child_id = [$category->id];
          foreach($categories_child_arr as $category_child) {
            $category_child_id[] = $category_child->id;
          }
        $products = Product::whereIn('category_id',$category_child_id)->orderBy($sort_by,'desc')->paginate($paginate);
      }
      else {
        $products = Product::where('category_id',$category->id)->orderBy($sort_by,'desc')->paginate($paginate);
      }

      $data = [
        'title'=>$category->title,
        'products'=>$products,
        'paginate'=>$paginate,
        'sort_by'=>$sort_by,
      ];

      return view('site.products', $data);
    }
    return abort(404);
  }
}
