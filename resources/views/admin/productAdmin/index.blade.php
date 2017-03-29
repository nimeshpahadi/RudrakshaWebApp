@extends('admin.Layout.app')

@section('main-content')

    <div align="right" style="padding: 10px">
        <a href="{{route('products.create')}}">
            <span class=" btn btn-sm btn-success" title="Create new category">Create Product</span>
        </a>
    </div>
    <div class="panel-body">

        @if(isset($catprod))
            @foreach($catprod as $cat=>$value)

                <td><h2 class="" style="background-color: #8c8c8c">{{strtoupper($cat)}} </h2></td>

                <table id="example1"
                       class="table table-striped table-bordered dt-responsive  table-responsive "
                       cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Quantity</th>
                        <th>Tags</th>
                        <th>Discount</th>
                        <th>Rank</th>
                        <th>Remark</th>

                    </tr>
                    </thead>

                    @if(isset($value['product'] ))
                        @foreach($value['product'] as $prodCat=>$item)
                            <tbody>
                            <tr>

                                <td>{{$item['name'] }}</td>
                                <td>{{$item['code'] }}</td>
                                <td>{{$item['quantity_available'] }}</td>
                                <td>{{ join(",",$item['tag'])}}</td>
                                <td>{{$item['discount'] }}</td>
                                <td>{{$item['rank'] }}</td>
                                <td><a href="{{route('products.show',$item['id'])}}">
                                        <button class="btn btn-sm btn-success" title="View the order details">View
                                        </button>
                                    </a></td>
                            </tr>
                            </tbody>
                        @endforeach
                    @endif


                </table>

            @endforeach
        @endif
    </div>
@endsection