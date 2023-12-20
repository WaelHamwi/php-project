@extends('layout.master')

@section('content')


    <div class="jumbotron" style="text-align: center; background-color: #222222; color: #ffffff ;border: white solid 4px;
    border-radius: 0px 25px;">
        <h1>Add House</h1>
    </div>

    {!! Form::open(['url' =>'saveHouse','files'=>true]) !!}

    <div class="form-group col-lg-4">
        {{Form::text('size','',['placeHolder'=>'size','class'=>'form-control','required'])}}
    </div>

    <div class="form-group col-lg-4">
        {{Form::text('num_of_rooms','',['placeHolder'=>'num of rooms','class'=>'form-control','required'])}}
    </div>


    <div class="form-group col-lg-4">
        {{Form::text('floor','',['placeHolder'=>'floor','class'=>'form-control','required'])}}
    </div>


    <div class="form-group col-lg-4">
        {{Form::text('address','',['placeHolder'=>'address','class'=>'form-control','required'])}}
    </div>

    <div class="form-group col-lg-4">
        {{Form::text('cladding_level','',['placeHolder'=>'cladding level','class'=>'form-control','required'])}}
    </div>


    <div class="form-group col-lg-4">
        {{Form::text('price','',['placeHolder'=>'price','class'=>'form-control','required'])}}
    </div>

    <div class="form-group col-lg-4">
        {!! Form::select('area', $options,'',['class'=>'form-control']) !!}
    </div>
{{--    <div class="form-group col-lg-4">--}}
{{--        {{Form::text('details','',['placeHolder'=>'details','class'=>'form-control','required'])}}--}}
{{--    </div>--}}
    <div class="form-group col-lg-4">
        {{Form::textarea('details','',['placeHolder'=>'details','class'=>'form-control'])}}
    </div>

{{--    <div class="form-group col-lg-6">--}}
{{--        {{Form::textarea('blog_body_sl','',['placeHolder'=>'Enter Body Sl','class'=>'form-control','required'])}}--}}
{{--    </div>--}}

    <div class="form-group col-lg-4">
        {{Form::file('image_url[]',['placeHolder'=>'Enter Title Pl','class'=>'form-control','style'=>'margin-bottom: 10px;','roles' => 'form', 'multiple' => 'multiple'])}}
        {{Form::submit('save',['class'=>'btn btn-primary','style'=>'width:30%'])}}
    </div>

{{--    <div class="form-group col-lg-6" style="color: white">--}}
{{--        {{Form::checkbox('blog_slider')}}--}}
{{--        {{Form::label('slider','Do You Want To View This In Slider')}}--}}
{{--    </div>--}}

    {!! Form::close() !!}
@endsection