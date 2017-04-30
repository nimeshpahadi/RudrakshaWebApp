@extends('admin.Layout.app')

@section('main-content')


    <div class="panel-body">
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
            @if(isset($data))
                @foreach($data as $group)
                    <tr>
                        <td>{{($group['id'])}}</td>
                        <td>{{($group['order_group'])}}</td>
                        <td>{{($group['firstname'])}} {{($group['lastname'])}}</td>
                        <td>{{($group['group_status'])}}


                        </td>
                        <td>
                            @foreach($group['order_items_id'] as $cartid)
                                {{$cartid}},
                            @endforeach
                        </td>
                        <td>{{($group['created_at'])}}</td>
                        <td>
                            <a href="{{route('order.detail',$group['id'])}}">
                                <button class="btn btn-warning pad" title="View the {{$group['id']}} order"><i
                                            class="fa fa-share"></i></button>
                            </a>
                        </td>

                @endforeach

            @endif

            </tbody>

        </table>
    </div>
@endsection