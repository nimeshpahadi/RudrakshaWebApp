@extends('Layout.app')

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
                <th>design_image</th>
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
                    {{--ln -s ~/web/RudrakshaWebbapp/storage/app/public/capping ~/web/RudrakshaWebbapp/public/storage/--}}
                    <td><img class="cappingimage" src="{{asset('storage/capping')}}/{{$capping->design_image}}"></td>
                    <td>{{$capping->price}}</td>
                    <td>{{$capping->metal_quantity_used}}</td>
                    <td>{{$capping->description}}</td>
                    <td>{{$capping->status}}</td>
                    <td>
                        <a href="{{route('capping.edit',$capping->id)}}">
                            <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                    data-placement="top" data-content="Edit the {{$capping->id}} capping"><i class="fa fa-edit"></i>
                            </button>
                        </a>

                        {!! Form::open(['method' => 'DELETE','route' => ['capping.destroy', $capping->id]]) !!}
                        <button type="submit" class="btn btn-danger glyphicon glyphicon-trash pad" data-toggle="popover"
                                data-trigger="hover"
                                data-placement="top" data-content="Delete the current product"
                                onclick="return confirm('Are you sure you want to delete this item?');">

                        </button>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach


            </tbody>

        </table>
    </div>

@endsection