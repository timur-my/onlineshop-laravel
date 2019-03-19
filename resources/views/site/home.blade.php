@extends("layouts.layout")

@section('header')
    @parent
@endsection

@section('content')
    <!-- / body -->

    <div id="body">
        <div class="container">

            <div class="last-products most-popular">
                <h2>Most popular</h2>
                <section class="products">
                    @foreach($products_popular as $product)
                        <article>
                            <a href="{{ route('product',[$product->id]) }}">
                                <div class="product-image">
                                    <img class="img-fluid" src="{{ Voyager::image( $product->image ) }}" alt="">
                                </div>
                                <h3>{{ mb_strimwidth($product->name,0,65,'...') }}</h3>
                            </a>
                            <h4>$ {{ $product->price }}</h4>
                            <a href="{{ route('cart_add',[$product->id]) }}" class="btn-add">Add to cart</a>
                        </article>
                    @endforeach
                </section>
            </div>

            <div class="last-products last-add">
                <h2>Last added products</h2>
                <section class="products">
                    @foreach($products_last as $product)
                        <article>
                            <a href="{{ route('product',[$product->id]) }}">
                                <div class="product-image">
                                    <img src="{{ Voyager::image( $product->image ) }}" alt="">
                                </div>
                                <h3>{{ mb_strimwidth($product->name,0,65,'...') }}</h3>
                            </a>
                            <div>
                                <h4>$ {{ $product->price }}</h4>
                                <a href="{{ route('cart') }}" class="btn-add">Add to cart</a>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>

        </div>
        <!-- / container -->
    </div>
    <!-- / body -->
@endsection

@section('footer')
    @parent
@endsection