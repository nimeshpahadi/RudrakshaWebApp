@extends('shop.layout.app')

@section('main-content')
    @include('shop.layout.breadcrum')
    <section id="cart-wrapper">
        <div class="container">
            <div class="col-md-12 col-sm-12 histry-wrapper">
                <h2>Detail</h2>
                <div style="overflow-x:auto;">
    <table id="example1"
           class="table table-striped table-bordered dt-responsive  table-responsive "
           cellspacing="0" width="100%">
        <thead>
        <tr>

            <th>CartIds </th>
            <th>Product</th>
            <th>Product Price</th>
            <th>Capping</th>
            <th>Capping Price</th>
            <th>Quantity</th>


        </tr>
        </thead>
        <tbody>

        @foreach($data as $val)
            @foreach($val as $value)
                <tr>
                    <td>{{($value['cart_id'])}}</td>

                    <td>{{($value['prodname'])}}</td>
                    <td>{{($value['prodprice'])}}</td>
                    <td>{{($value['captype'])}}</td>
                    <td>{{($value['capprice'])}}</td>
                    <td>{{($value['quantity'])}}</td>
                </tr>
            @endforeach
            <h1>{{($value['order_group'])}} ::{{($value['group_status'])}}</h1>
            <h3>Ordered On: {{($value['created_at'])}}</h3>
            <h4>Currency: {{($value['cname'])}}</h4>
        @endforeach

        </tbody>

    </table>
</div>
</div>
</div>
    </section>
    @endsection
