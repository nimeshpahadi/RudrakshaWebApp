@extends('admin.Layout.app')

@section('main-content')


    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>

                <th>CartIds</th>
                <th>Product</th>
                <th>Product Price</th>
                <th>Capping</th>
                <th>Capping Price</th>
                <th>Quantity</th>
                <th>Remarks</th>


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
                        <td>
                            <div class="panel-heading category">
                                <ul>
                                    <li>
                                        <a class="btn btn-warning pad"
                                           href="{{route('admin.order.edit',$value['cart_id'])}}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        {!! Form::open(['method' => 'DELETE','route' => ['order.destroy',$value['cart_id']]]) !!}
                                        <button type="submit" class="btn btn-danger pad"
                                                data-toggle="popover"
                                                data-trigger="hover"
                                                data-placement="top" data-content="Delete the current currency"
                                                onclick="return confirm('Are you sure you want to delete this item?');">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            </div>
                        </td>

                    </tr>
                @endforeach
                <h2>{{($value['order_group'])}} ::{{($value['group_status'])}}</h2>
                <h3>Customer Name: {{($value['customername'])}}  {{($value['customerlname'])}}</h3>
                <h3>Ordered On: {{($value['created_at'])}}</h3>
                <h4>Currency: {{($value['cname'])}}</h4>

                <button type="button" class="btn btn-info col-md-offset-10  "  style="margin-bottom: 10px" data-toggle="modal"
                        data-target="#myModal">Change Status
                </button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content pad">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit the group status</h4>
                            </div>

                            {!! Form::model($value,array('route'=>['admin.ordergroup.status.update',$value['group_id']],'method'=>'PUT' ))!!}

                            {{ Form::hidden('id', $value['group_id']) }}
                            <div class="form-group ">

                                <label for="group_status" class="col-sm-4 control-label">Status</label>
                                <div class=" col-sm-8 ">
                                    <select id="group_status" name="group_status"
                                            class=" form-control " required>
                                        <option value="processed">Processed</option>
                                        <option value="completed">Completed</option>

                                    </select>
                                </div>
                            </div>
                            <div class="clearfix pad"></div>
                            <div align="right">
                                {{Form::submit('change', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the change'))}}
                                {!! Form::close() !!}


                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

            </tbody>

        </table>
    </div>
@endsection