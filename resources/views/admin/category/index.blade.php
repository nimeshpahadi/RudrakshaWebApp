@extends('admin.Layout.app')

@section('main-content')
    <h2>Category List</h2>
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
            <tr class="category-wrapper">

                <th>Name</th>
                <th>Code</th>
                <th>Short Description</th>
                <th>Information</th>
                <th>Face No.</th>
                <th>Mantra</th>
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
                        <td class="category-info">{{$row->information }}</td>
                        <td>{{$row->face_no }}</td>
                        <td>{{$row->mantra }}</td>
                        <td>@if($row->status==1)Active @else Inactive @endif</td>
                        <td class="view_detail">

                            <a href="{{route('category.benefit',$row->id)}}">
                                <button class="btn btn-sm btn-info pad" data-toggle="popover" data-trigger="hover"
                                        data-placement="top" data-content="Add benefit to category">Add Benefit</button>
                            </a>
                            <a href="{{route('category.show',$row->id)}}">
                                <button class="btn btn-sm btn-primary pad view " data-toggle="popover" data-trigger="hover"
                                        data-placement="top" data-content="view details category">
                                        view</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif


            </tbody>

        </table>
    </div>

@endsection