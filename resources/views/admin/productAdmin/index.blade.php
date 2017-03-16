@extends('Layout.app')

@section('main-content')

    <div align="right" style="padding: 10px">
        <a href="{{route('product.create')}}">
            <span class=" btn btn-sm btn-success" title="Create new category">Create Product</span>
        </a>
    </div>
    <div class="panel-body">

        @if(isset($catprod))
            @foreach($catprod as $cat=>$value)
                <tr>
                    <td><h2>{{$cat }}</h2></td>

                    <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>Name</th>
                <th>Code </th>
                <th>quantity</th>
                <th>tags .</th>
                <th>discount</th>
                <th>rank</th>
                <th>remark</th>

            </tr>
            </thead>

                        @if(isset($value['product'] ))
                            @foreach($value['product'] as $prodCat=>$item)
                            <tbody>


                                 <td>{{$item['name'] }}</td>
                                 <td>{{$item['code'] }}</td>
                                 <td>{{$item['quantity_available'] }}</td>
                                 <td>{{ join(",",json_decode($item['tag']))}}</td>
                                 <td>{{$item['discount'] }}</td>
                                 <td>{{$item['rank'] }}</td>
                                 <td> <a href="{{route('product.show',$item['id'])}}">
                                         <button class="btn btn-sm btn-success" title="View the order details">View</button>
                                     </a></td>
                            </tbody>
                            @endforeach
                        @endif










        </table>
                </tr>
            @endforeach
        @endif
    </div>

@endsection