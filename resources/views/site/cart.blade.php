@extends("layouts.layout")

@section('header')
    @parent
@endsection

@section('content')
    <div id="breadcrumbs">
        <div class="container">
            <ul>
                <li><a href="/">Home</a></li>
                <li>Cart</li>
            </ul>
        </div>
        <!-- / container -->
    </div>

    <div id="body">
        <div class="container">
            <div id="content" class="full">
                <div class="cart-table">
                    <table>
                        <tr>
                            <th class="items">Items</th>
                            <th class="price">Price</th>
                            <th class="qnt">Quantity</th>
                            <th class="total">Total</th>
                            <th class="delete"></th>
                        </tr>
                        @if($products)
                            @foreach($products as $product)
                                <tr>
                                    <td class="items">
                                        <div class="cart_image">
                                            <img src="\storage\{{ $product['image'] }}" alt="">
                                        </div>
                                        <h3><a href="#">{{ $product['name'] }}</a></h3>
                                    </td>
                                    <td class="price">$ {{ $product['price'] }}</td>
                                    <td class="qnt">{{ $product['quantity'] }}</td>
                                    <td class="total">$ {{ $product['price'] * $product['quantity'] }}</td>
                                    <td class="delete"><a href="#" class="ico-del"></a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="items">
                                    <h2>No items in you cart.</h2>
                                </td>
                                <td class="price"></td>
                                <td class="qnt"></td>
                                <td class="total"></td>
                                <td class="delete"></td>
                            </tr>
                        @endif
                    </table>
                </div>

                <div class="total-count">
                    <h4>Subtotal: $ {{ $total_price }}</h4>
                    <p>+shippment: $ {{ $shipment }}</p>
                    <h3>Total to pay: <strong>$ {{ $total_price + $shipment }}</strong></h3>
                    <a href="#" class="btn-grey">Finalize and pay</a>
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

