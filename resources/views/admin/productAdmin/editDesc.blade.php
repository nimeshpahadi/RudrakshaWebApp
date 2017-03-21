@extends('Layout.app')

@section('main-content')

    <div class="panel-body">

        @include('admin.productAdmin.partials.heading')

        <div class="row setup-content" id="step-1">
            <div class="col-xs-10">
                <div class="col-md-12 well text-center">
                    <h1>Product Description</h1>

                    {!! Form::model($desc,array('route'=>['product_desc_update',$desc],'method'=>'PUT' ))!!}

                    {{ Form::hidden('product_id', $desc->product_id) }}


                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }} clearfix">
                        <label for="description" class="col-sm-4 control-label">Description</label>

                        <div class="col-sm-8">
                            {{ Form::text('description',null,array('class'=>'form-control'))}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('information') ? ' has-error' : '' }} clearfix">
                        <label for="information" class="col-sm-4 control-label">Information</label>

                        <div class="col-sm-8">
                            {{ Form::text('information',null,array('class'=>'form-control'))}}
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('benifit') ? ' has-error' : '' }} clearfix">
                        <label for="benifit" class="col-sm-4 control-label"> Health Benifits </label>
                        <div class="col-sm-8">
                            <div class="" id="room_fileds">
                                @foreach($desc["benifit"] as $head=>$value)
                                    @foreach($value as $list)
                                        @if($head =='health')
                                            <input id="more_fields" type="text" class="form-control"
                                                   name='benifit[health][]'
                                                   value="{{$list}}" autofocus>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <input type="button" id="more_fields" onclick="add_fields();" value="Add More"/>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('benifit') ? ' has-error' : '' }} clearfix">
                        <label for="benifit" class="col-sm-4 control-label"> Business Benifits </label>
                        <div class="col-sm-8">
                            <div class="" id="b_room_fileds">
                                @foreach($desc["benifit"] as $head=>$value)

                                    @foreach($value as $list)
                                        @if($head =='business')
                                            <input id="b_more_fields" type="text" class="form-control" value="{{$list}}"
                                                   name='benifit[business][]'
                                                   autofocus>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                            <input type="button" id="b_more_fields" onclick="b_add_fields();" value="Add More"/>
                        </div>
                    </div>

                    <div class="clearfix pad"></div>
                    <div align="right">
                        {{Form::submit('Save Changes', array('class'=>'btn btn-bg btn-primary ','title'=>'Save the category'))}}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>


        </div>

@endsection