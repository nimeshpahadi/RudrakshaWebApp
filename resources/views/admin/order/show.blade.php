@extends('admin.Layout.app')

@section('main-content')


    <div class="panel-body">
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
                <td>   <a class=" fa fa-pencil" style="color: #2ab27b"
                          href="{{route('admin.order.edit',$value['cart_id'])}}"></a>
                    {!! Form::open(['method' => 'DELETE','route' => ['order.destroy',$value['cart_id']]]) !!}
                    <button class="fa fa-trash"
                            onclick="return confirm('Are you sure you want to delete this cart item?');">
                    </button>
                    {!! Form::close() !!}
                </td>

            </tr>
                @endforeach
                <h2>{{($value['order_group'])}} ::{{($value['group_status'])}}</h2>
                <h3>Customer Name: {{($value['customername'])}}  {{($value['customerlname'])}}</h3>
                <h3>Ordered On: {{($value['created_at'])}}</h3>
                <h4>Currency:   {{($value['cname'])}}</h4>
                @endforeach

            </tbody>

        </table>
    </div>
@endsection