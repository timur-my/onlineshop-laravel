<?php

namespace App\Http\ViewComposers;

use App\Category;
use Illuminate\View\View;

class NavigationComposer
{
  public function compose(View $view)
  {
    $menu = cache('menu');
    if(!$menu) {
      $categories = Category::all();
      $menu = view('layouts.widgets.nav',['categories'=>$categories])->render();
      cache(['menu'=>$menu],600);
    }
    return $view->with('menu', $menu);
  }
}