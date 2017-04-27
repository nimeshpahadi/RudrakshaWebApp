@extends('admin.Layout.app')

@section('main-content')


    @if(isset($cate))
        <div class="panel panel-success pad ">
            <div class="panel-heading category"><h4>Category Info</h4>
                   <ul>
                       <li>
                    <a href="{{route('category.edit',$cate->id)}}">
                        <button class="btn btn-warning " data-toggle="popover" data-trigger="hover"
                                data-placement="top" data-content="Edit the current category"><i
                                    class="fa fa-edit"></i></button>
                    </a>
                       </li>
                       <li>
                {!! Form::open(['class'=>'cat_form','method' => 'DELETE','route' => ['category.destroy', $cate->id]]) !!}
                <button type="submit" class="btn btn-danger " data-toggle="popover"
                        data-trigger="hover"
                        data-placement="top" data-content="Delete the category"
                        onclick="return confirm('Are you sure you want to delete this item?');"><i
                            class="fa fa-trash"></i>

                </button>
                {!! Form::close() !!}
                </li>
                   </ul>
            </div>




            <div class="row">
                <label class="col-sm-6 "> Code :</label>
                <p class="col-md-6">{{$cate->code}}</p>
            </div>

            <div class="row">
                <label class="col-sm-6 "> Name :</label>
                <p class="col-md-6"> {{$cate->name}}</p>
            </div>
            <div class="row">
                <label class="col-sm-6 "> Short Description:</label>
                <p class="col-md-6">{{$cate->short_description}}</p>
            </div>
            <div class="row">
                <label class="col-sm-6 "> Information :</label>
                <p class="col-md-6">{{$cate->information}}</p>
            </div>
            <div class="row">
                <label class="col-sm-6 "> Status :</label>
                @if($cate->status==1)
                    <p class="col-md-6"> Active</p>
                @else
                    <p class="col-md-6">   In-active</p>
                @endif
            </div>

            <div class="row">
                <label class="col-sm-6 "> Quantity Available :</label>
                <p class="col-md-6"> {{$cate->face_no}}</p>
            </div>
        </div>
    @endif


    @if(isset($cate_beni))
        <div class="panel panel-success pad ">
            <div class="panel-heading category "><h4>Category Benifits</h4>
                <div align="right" style="padding: 10px">
                    <a href="{{route('category.benefit',$cate->id)}}">
                        <span class=" btn btn-sm btn-success" title="Create new category">Add Benifit</span>
                    </a>
                </div>
            </div>

            <div class="row ">
                <div class="cat_benefit">

                <table >
                    <div class="table_benefit">

                    @foreach($cate_beni as $benifitall)
                    <tr style="margin:0; padding: 0 ">
                        <th class="panel-heading category1">

                            <ul>
                                <h4 style="width: 400px; font-weight: bold; font-size: 22px"> {{ucfirst($benifitall->benefit_heading)}}  </h4>
                                <li >

                            <a href="{{route('category.benefit.edit',$benifitall->id)}}">
                                    <button class="btn btn-warning " data-toggle="popover" data-trigger="hover"
                                            data-placement="top" data-content="Edit the current category"><i
                                                class="fa fa-edit"></i></button>
                                </a>
                                </li>
                                <li>
                                    {!! Form::open(['method' => 'DELETE','route' => ['category.benefit.delete', $benifitall->id]]) !!}
                                    <button type="submit" class="btn btn-danger "
                                            data-toggle="popover"
                                            data-trigger="hover"
                                            data-placement="top" data-content="Delete the current product"
                                            onclick="return confirm('Are you sure you want to delete this item?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    {!! Form::close() !!}
                                    </li>

                            </ul>

                        </th>
                    </tr>

                        @foreach($benifitall->benefit as $ben)
                            <tr class="ben">
                                <td >
                                    <li style="padding-left: 70px; margin-top:0px">{{$ben}}</li>
                                </td>
                            </tr>
                        @endforeach

                    @endforeach
                    </div>
                </table>

                </div>
            </div>
        </div>
    @endif


@endsection