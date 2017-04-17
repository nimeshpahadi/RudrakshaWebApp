@extends('admin.Layout.app')

@section('main-content')


    @if(isset($cate))
        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Category Info</h5>
            </div>
            <div class="col-md-12">
                <div class="col-md-1">
            <a href="{{route('category.edit',$cate->id)}}">
                <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                        data-placement="top" data-content="Edit the current category"><i
                            class="fa fa-edit"></i></button>
            </a>
                </div>
                <div class="col-md-offset-1">
            {!! Form::open(['method' => 'DELETE','route' => ['category.destroy', $cate->id]]) !!}
            <button type="submit" class="btn btn-danger glyphicon glyphicon-trash " data-toggle="popover"
                    data-trigger="hover"
                    data-placement="top" data-content="Delete the category"
                    onclick="return confirm('Are you sure you want to delete this item?');">

            </button>
            {!! Form::close() !!}
                </div>
                </div>
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
                @if($cate->status==1)
                    Active
                @else
                    In-active
                @endif
            </div>

            <div class="row">
                <label class="col-sm-6 "> Quantity Available :</label>
                {{$cate->face_no}}
            </div>
        </div>
    @endif


    @if(isset($cate_beni))
        <div class="panel panel-success pad ">
            <div class="panel-heading "><h5>Category Benifits</h5>
            </div>
            <div align="right" style="padding: 10px">
                <a href="{{route('category.benefit',$cate->id)}}">
                    <span class=" btn btn-sm btn-success" title="Create new category">Add Benifit</span>
                </a>
            </div>
            <div class="row">
                <label class="col-sm-4 "> Benifits :</label>

                <table>
                    @foreach($cate_beni as $benifitall)
                        <thead>
                        <th>
                            <h2> {{$benifitall->benefit_heading}}  </h2>
                                <div class="col-md-12">
                                <div class="col-md-2">
                                <a href="{{route('category.benefit.edit',$benifitall->id)}}">
                                    <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Edit the current category"><i
                                                class="fa fa-edit"></i></button>
                                </a>
                                </div>
                                <div class="col-md-offset-10">
                                    {!! Form::open(['method' => 'DELETE','route' => ['category.benefit.delete', $benifitall->id]]) !!}
                                    <button type="submit" class="btn btn-danger glyphicon glyphicon-trash "
                                            data-toggle="popover"
                                            data-trigger="hover"
                                            data-placement="top" data-content="Delete the current product"
                                            onclick="return confirm('Are you sure you want to delete this item?');">

                                    </button>
                                    {!! Form::close() !!}
                                </div>
                                </div>


                        </th>
                        </thead>
                        @foreach($benifitall->benefit as $ben)
                            <tr>
                                <td>
                                    <li>{{$ben}}</li>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    @endif


@endsection