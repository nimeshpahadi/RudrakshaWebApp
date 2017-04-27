@extends('admin.Layout.app')

@section('main-content')

    <div align="right" style="padding: 10px">
        <a href="{{route('capping.create')}}">
            <span class=" btn btn-sm btn-success" title="Create new category">Create New Capping</span>
        </a>
    </div>

    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>

                <th>Type</th>
                <th>Design Image</th>
                <th>Price</th>
                <th>Metal Quantity</th>
                <th>Description</th>
                <th>Status</th>
                <th>Remarks</th>


            </tr>
            </thead>
            <tbody>

            @foreach($cap as $capping)
                <tr>
                    <td>{{$capping->type}}</td>
                    <td class="design_image">
                        <img class="cappingimage" src="{{asset('storage/image/capping')}}/{{$capping->design_image}}">
                        <button type="button" class="btn btn-info  " data-toggle="modal"
                                data-target="#myModal">change
                        </button>

                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Choose images to upload</h4>
                                    </div>
                                    {!! Form::model($capping,array('route'=>['capping.updateImage',$capping->id],'method'=>'PUT', 'enctype'=>'multipart/form-data'))!!}
                                    {{ Form::hidden('type', $capping->type) }}
                                    {{ Form::hidden('id', $capping->id) }}

                                    <div class="form-group ">
                                        <label for="design_image" class="col-sm-4 control-label">Image</label>
                                        <div class=" col-sm-8 ">

                                            <span class="input-group-addon "><i class="fa fa-file"></i></span>
                                            <input type="file" class="form-control" name="design_image"
                                                   id="design_image" required
                                                   autofocus>
                                        </div>
                                    </div>

                                    <div class="clearfix pad"></div>
                                    <div class="modal-footer">
                                        {{Form::submit('Save', array('class'=>'btn btn-bg btn-primary ','title'=>'Save image'))}}
                                        {!! Form::close() !!}

                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close
                                        </button>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td>{{$capping->price}}</td>
                    <td>{{$capping->metal_quantity_used}}</td>
                    <td>{{$capping->description}}</td>
                    <td>@if($capping->status==1)Active @else Inactive @endif</td>
                    <td>
                        <div class="panel-heading category">
                            <ul>
                                <li>
                        <a href="{{route('capping.edit',$capping->id)}}">
                            <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                    data-placement="top" data-content="Edit the {{$capping->id}} capping"><i
                                        class="fa fa-edit"></i>
                            </button>
                        </a>
                                </li>
                                <li>

                        {!! Form::open(['method' => 'DELETE','route' => ['capping.destroy', $capping->id]]) !!}
                        <button type="submit" class="btn btn-danger pad " data-toggle="popover"
                                data-trigger="hover"
                                data-placement="top" data-content="Delete the current product"
                                onclick="return confirm('Are you sure you want to delete this item?');">
                            <i
                                    class="fa fa-trash"></i>
                        </button>
                        {!! Form::close() !!}
                                </li>
                            </ul>
                    </td>
                </tr>
            @endforeach


            </tbody>

        </table>
    </div>

@endsection