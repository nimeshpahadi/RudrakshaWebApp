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
{{--{{$ cat_product}}--}}
                <th>Name</th>
                <th>Code </th>
                <th>categoryname</th>
                <th>quantity</th>
                <th>tags .</th>
                <th>discount</th>
                <th>rank</th>
                <th>remark</th>


            </tr>
            </thead>
            <tbody>
            @if(isset($cat_product))
                @foreach($cat_product as $row)
                    <tr>
                        <td>{{$row->cname }}</td>
                        <td>{{$row->name }}</td>
                        <td>{{$row->code }}</td>
                        <td>{{$row->quantity_available }}</td>
                        <td>{{$row->tag }}</td>
                        <td>{{$row->discount }}</td>
                        <td>{{$row->rank }}</td>
                        <td> <a href="{{route('product.show',$row->id)}}">
                                <button class="btn btn-sm btn-success" title="View the order details">View</button>
                            </a></td>

                    </tr>
                @endforeach
            @endif



            </tbody>

        </table>
    </div>

@endsection