
        @if(isset($data))

            <ul class="scroller" style="height: 250px;">
                @foreach($data as $orders)
                    <li>
                        <span class="cart-content-count">  Qty: {{$orders['quantity']}},  </span>
                        <strong><a href="">  {{ucfirst($orders['prodname'])}}</a></strong>
                    <ul> <em style="margin-left: 220px">Price:{{$orders['prodprice']}}</em></ul>

                    </li>
                @endforeach
            </ul>


            <div class="text-right">
                <a href="" class="btn btn-default">View Cart</a>
                <a href="" class="btn btn-primary">Checkout</a>
            </div>
        @endif


