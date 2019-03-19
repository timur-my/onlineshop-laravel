@extends("layouts.layout")

@section('header')
    @parent
@endsection

@section('content')
    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Product results</li>
            </ul>
        </div>
        <!-- / container -->
    </div>

    <div id="body">
        <div class="container">
            <div class="pagination">
                {{ $products->links() }}
            </div>
            <div class="products-wrap">
                <aside id="sidebar">
                    <form action="" method="POST">
                        <input type="submit" class="btn-success" value="Apply filters">
                        <div class="widget">
                            <h3>Products per page:</h3>
                                <fieldset>
                                    <input @if($paginate == 9) checked @endif type="radio" name="prod-per-page" value="9">
                                    <label>9</label>
                                    <input @if($paginate == 18) checked @endif type="radio" name="prod-per-page" value="18">
                                    <label>18</label>
                                    <input @if($paginate == 36) checked @endif type="radio" name="prod-per-page" value="36">
                                    <label>36</label>
                                </fieldset>
                        </div>
                        <div class="widget">
                            <h3>Sort by:</h3>
                            <fieldset>
                                <input @if($sort_by == 'views') checked @endif type="radio" name="sort" value="views">
                                <label>Popularity</label>
                                <input @if($sort_by == 'created_at') checked @endif type="radio" name="sort" value="created_at">
                                <label>Date</label>
                                <input @if($sort_by == 'price') checked @endif type="radio" name="sort" value="price">
                                <label>Price</label>
                            </fieldset>
                        </div>
                        <div class="widget">
                            <h3>Material:</h3>
                            <fieldset>
                                <input type="radio" checked>
                                <label>Leather</label>
                            </fieldset>
                        </div>
                        <!--<div class="widget">
                            <h3>Color:</h3>
                            <fieldset>
                                <input type="radio" name="color">
                                <label>Black</label>
                                <input type="radio" name="color">
                                <label>White</label>
                                <input type="radio" name="color">
                                <label>Red</label>
                                <input type="radio" name="color">
                                <label>Grown</label>
                                <input type="radio" name="color">
                                <label>Green</label>
                                <input type="radio" name="color">
                                <label>Blue</label>
                                <input type="radio" name="color">
                                <label>Yellow</label>
                            </fieldset>
                        </div>-->
                        {{ csrf_field() }}
                    </form>
                </aside>
                <div id="content">
                    <section class="products">
                        @if(count($products)>0)
                            @foreach($products as $product)
                                <article>
                                    <a href="{{ route('product',[$product->id]) }}">
                                        <div class="product-image">
                                            <img src="{{ Voyager::image( $product->image ) }}" alt="">
                                        </div>
                                        <h3>{{ mb_strimwidth($product->name,0,65,'...') }}</h3>
                                    </a>
                                    <h4>$ {{ $product->price }}</h4>
                                    <a href="{{ route('cart_add',[$product->id]) }}" class="btn-add">Add to cart</a>
                                </article>
                            @endforeach
                        @else
                            <h2 class="products-h2">There are no products in this category yet.</h2>
                        @endif
                    </section>
                </div>
                <!-- / content -->
            </div>
        </div>
        <!-- / container -->
    </div>
@endsection

@section('footer')
    @parent
@endsection