@extends('Layout.app')

@section('main-content')

    <div class="panel-body">
        <table id="example1"
               class="table table-striped table-bordered dt-responsive  table-responsive "
               cellspacing="0" width="100%">
            <thead>
            <tr>

                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Alt. Contact</th>
                <th>Status</th>
                <th>Image</th>
                <th>Remarks</th>


            </tr>
            </thead>
            <tbody>
            @if(isset($customer))
                @foreach($customer as $row)
                    <tr>

                        <td>{{$row->name }}</td>
                        <td>{{$row->email }}</td>
                        <td>{{$row->contact }}</td>
                        <td>{{$row->alternative_contact }}</td>
                        <td>@if($row->status==1)Active @else Inactive @endif</td>
                        <td>{{$row->alternative_contact }}</td>

                        <td>


                            <a href="{{route('customer.show',$row->id)}}">
                                <button class="btn btn-primary btn-sm " data-toggle="popover" data-trigger="hover"
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