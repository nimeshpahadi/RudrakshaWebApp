
        @if(isset($data))

            <ul class="scroller" style="height: 250px;">
                @foreach($data as $orders)
                    <li>
                        <span class="cart-content-count">  Qty: {{$orders['quantity']}},  </span>
                        <strong><a href="/{{$orders['product_id']}}/detail">  {{ucfirst($orders['prodname'])}}</a></strong>
                    <ul> <em style="margin-left: 220px">Price:{{$orders['prodprice']}}</em></ul>

                    </li>
                @endforeach
            </ul>


            <div class="text-right">
                <a href="/cart" class="btn btn-primary">View Cart</a>
            </div>
        @endif


