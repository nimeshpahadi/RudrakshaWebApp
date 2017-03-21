@extends('Layout.app')

@section('main-content')


    @if(isset($cate))
        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Category Info</h5>
            </div>
            <a href="{{route('category.edit',$cate->id)}}">
                <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                        data-placement="top" data-content="Edit the current category"><i
                            class="fa fa-edit"></i></button>
            </a>

            <div class="row">
                <label class="col-sm-6 "> Code :</label>
                {{$cate->code}}
            </div>

            <div class="row">
                <label class="col-sm-6 "> Name :</label>
                {{$cate->name}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Short Description:</label>
                {{$cate->short_description}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Information :</label>
                {{$cate->information}}
            </div>
            <div class="row">
                <label class="col-sm-6 "> Status :</label>
                {{$cate->status}}
            </div>

            <div class="row">
                <label class="col-sm-6 "> Quantity Available :</label>
                {{$cate->face_no}}
            </div>
        </div>
    @endif

    <div class="panel panel-success pad ">
        <div class="panel-heading "><h5>Category Benifits</h5>
        </div>
        @if(!isset($cate_beni))
            <div align="right" style="padding: 10px">
                <a href="{{route('category.benifit',$cate->id)}}">
                    <span class=" btn btn-sm btn-success" title="Create new category">Add Benifit</span>
                </a>
            </div>
            @endif


        <div class="row">
                <label class="col-sm-4 "> Benifits :</label>

                <table>
                    @if(isset($cate_beni))
                    @foreach($cate_beni as $benifitall=>$val)
                        <thead>
                        <th><h2> {{$val->benefit_heading}}
                                <a href="{{route('category.benefit.edit',$val->id)}}">
                                    <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Edit the current category"><i
                                                class="fa fa-edit"></i></button>
                                </a>
                                <div class="col-md-offset-10">
                                {!! Form::open(['method' => 'DELETE','route' => ['category.benefit.delete', $val->id]]) !!}
                                <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="popover"
                                        data-trigger="hover"
                                        data-placement="top" data-content="Delete the current product"
                                        onclick="return confirm('Are you sure you want to delete this item?');">

                                </button>
                                {!! Form::close() !!}
                                </div>
                            </h2>

                        </th>

                        </thead>
                        @foreach(json_decode($val->benefit) as $ben)
                            <tr>
                                <td>
                                    <li>{{$ben}}</li>
                                </td>
                            </tr>
                        @endforeach

                    @endforeach
                    @endif
                </table>
            </div>

    </div>


@endsection