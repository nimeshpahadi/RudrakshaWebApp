@extends('Layout.app')

@section('main-content')

    <div align="right" style="padding: 10px">
        <a href="{{route('currency.create')}}">
            <span class=" btn btn-sm btn-success" title="Create new category">Create Currency</span>
        </a>
    </div>
    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>

                <th>Currency Name</th>
                <th>Code</th>
                <th>Representation</th>
                <th>Remarks</th>


            </tr>
            </thead>
            <tbody>
            @if(isset($currency))
                @foreach($currency as $row)
                    <tr>

                        <td>{{$row->currency }}</td>
                        <td>{{$row->code }}</td>
                        <td>{{$row->representation }}</td>

                        <td><a href="{{route('currency.edit',$row->id)}}">
                                <button class="btn btn-warning pad" title="Edit the {{$row->currency}} currency"><i
                                            class="fa fa-edit"></i></button>
                            </a>
                            {!! Form::open(['method' => 'DELETE','route' => ['currency.destroy', $row->id]]) !!}

                            <button type="submit" class="btn btn-danger  glyphicon glyphicon-trash pad"
                                    data-toggle="popover"
                                    data-trigger="hover"
                                    data-placement="top" data-content="Delete the current currency"
                                    onclick="return confirm('Are you sure you want to delete this item?');">

                            </button>
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            @endif
            </tbody>

        </table>
    </div>
@endsection