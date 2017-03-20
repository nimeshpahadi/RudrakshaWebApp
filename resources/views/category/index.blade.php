@extends('Layout.app')

@section('main-content')

    <div align="right" style="padding: 10px">
        <a href="{{route('category.create')}}">
            <span class=" btn btn-sm btn-success" title="Create new category">Create Category</span>
        </a>
    </div>
    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>

                <th>Name</th>
                <th>Code</th>
                <th>Short Description</th>
                <th>Information</th>
                <th>Face No.</th>
                <th>Status</th>
                <th>Remarks</th>


            </tr>
            </thead>
            <tbody>
            @if(isset($allcategory))
                @foreach($allcategory as $row)
                    <tr>

                        <td>{{$row->name }}</td>
                        <td>{{$row->code }}</td>
                        <td>{{$row->short_description }}</td>
                        <td>{{$row->information }}</td>
                        <td>{{$row->face_no }}</td>
                        <td>@if($row->status==1)Active @else Inactive @endif</td>
                        <td>
                            <a href="{{route('category.edit',$row->id)}}">
                                <button class="btn btn-warning pad" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" data-content="Edit the current category"><i
                                            class="fa fa-edit"></i></button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif


            </tbody>

        </table>
    </div>

@endsection