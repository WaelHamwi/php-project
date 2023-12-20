@extends('layout.master')



@section('content')


    <div id="mycarousel" class="carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            @for($i=0 ; $i <sizeof($viewHouse);$i++)
                <li data-target="#mycarousel" data-slide-to="{{$i}}"></li>
            @endfor
        </ol>

        <!--wrapper for slider-->
        <div class="carousel-inner" style="height:400px;">
            {{--@if($blog_slider_urls !='')--}}
            @foreach($viewHouse as $viewHouse)
                <div class="item ">
                    <img src="{{asset($viewHouse->image)}}" alt="random image" style="width: 100% ; height: 400px"/>
                </div>
            @endforeach
        </div>
        <!--left and right-->
        <a class="left carousel-control" href="#mycarousel" data-slide='prev'>
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#mycarousel" data-slide='next'>
            <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
    </div>



{{--    <img src="{{asset($view_blog[0]->image_url)}}"--}}
{{--         style="width: 100%; height: 400px; border: white solid 4px; border-radius: 0px 25px;"/>--}}

    <div class="col-lg-12" style=" color: #ffffff ">
        <ul class="">
            <li><h1 style="">House size : {{$viewHouse->size}}</h1></li>
            <li><h1 style="">Number of rooms : {{$viewHouse->num_of_rooms}}</h1></li>
            <li><h1 style="">Floor : {{$viewHouse->floor}}</h1></li>
            <li><h1 style="">Address : {{$viewHouse->address}}</h1></li>
            <li><h1 style="">Cladding level : {{$viewHouse->cladding_level}}</h1></li>
            <li><h1 style="">Price : {{$viewHouse->price}}</h1></li>
            <li><h1 style="">Details : {{$viewHouse->details}}</h1></li>
        </ul>



        <form method="post" action="{{ url('buy') }}">
            {{ csrf_field() }}

            <input type="hidden" id="house_id" name="house_id" value={{$viewHouse->house_id}}>
            <div class="form-group">
                <input type="submit" name="buy" class="btn btn-primary" value="buy" />
            </div>


        </form>


{{--        <div class="bs-component">--}}
{{--            <div class="jumbotron" style="background-color: #222222;">--}}
{{--                <p>{{$viewHouse->floor}}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>




@endsection