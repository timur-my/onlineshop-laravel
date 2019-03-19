@extends("layouts.layout")

@section('header')
    @parent
@endsection

@section('content')
    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Product page</li>
            </ul>
        </div>
        <!-- / container -->
    </div>

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="product">
                    <div class="image">
                        <img src="{{ Voyager::image( $product->image ) }}" alt="">
                    </div>
                    <div class="details">
                        <h1>{{ $product->name }}</h1>
                        <h4>$ {{ $product->price }}</h4>
                        <div class="entry">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            <div class="tabs">
                                <div class="nav">
                                    <ul>
                                        <li class="active"><a href="#desc">Description</a></li>
                                        <li><a href="#spec">Specification</a></li>
                                        <li><a href="#deliv">Delivery</a></li>
                                    </ul>
                                </div>
                                <div class="tab-content active" id="desc">
                                    <p>{!! $product->description !!}</p>
                                </div>
                                <div class="tab-content" id="spec">
                                    <p>{!! $product->specification !!}</p>
                                </div>
                                <div class="tab-content" id="deliv">
                                    <p>3 Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <label>Quantity:</label>
                            <form action="{{ route('cart_add',[$product->id]) }}" method="POST">
                                <select name="quantity">
                                    @for($i=1; $i<=5; $i++)
                                        <option>{{ $i }}</option>
                                    @endfor
                                </select>
                                {{ csrf_field() }}
                                <input type="submit" class="btn-grey" value="Add to cart" name="sumbit">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / content -->
        </div>
        <!-- / container -->
    </div>
@endsection

@section('footer')
    @parent
@endsection