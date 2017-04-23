@extends('shop.layout.app')

@section('main-content')
    @include('shop.layout.breadcrum')
    <section id="cart-wrapper">
        <div class="container">
            <div class="col-md-12 col-sm-12 histry-wrapper">
                <h2>History</h2>
                <div style="overflow-x:auto;">
                    <table id="example1"
                           class="table table-striped table-bordered dt-responsive  table-responsive "
                           cellspacing="0" width="100%">
                        <thead>
                        <tr>

                            <th>ID</th>
                            <th>Order Group</th>
                            <th>Customer</th>
                            <th>Group Status</th>
                            <th>CartIds</th>
                            <th>Order Placed On</th>
                            <th>Remarks</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($history as $group)
                            <tr>
                                <td>{{($group['id'])}}</td>
                                <td>{{($group['order_group'])}}</td>
                                <td>{{($group['firstname'])}} {{($group['lastname'])}}</td>
                                <td>{{($group['group_status'])}}</td>
                                <td>
                                    @foreach($group['order_items_id'] as $cartid)
                                        {{$cartid}},
                                    @endforeach
                                </td>
                                <td>{{($group['created_at'])}}</td>
                                <td><a href="{{route('history.view',$group['id'])}}">
                                        <button class="btn btn-warning pad" title="View the {{$group['id']}} order"><i
                                                    class="fa fa-dashcube"></i></button>
                                    </a></td>

                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>




@endsection
