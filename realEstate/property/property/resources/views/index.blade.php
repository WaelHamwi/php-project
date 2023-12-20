@extends('layout.master')

@section('content')
    <!-- About Section -->
    <div class="jumbotron" style="text-align: center; background-color: #222222; color: #ffffff ;border: white solid 4px;
    border-radius: 0px 25px;">
        <h1>About Company</h1>
    </div>

    <div class="col-lg-12" style=" color: #ffffff ">
        <ul class="">
{{--            <li><h1 style="">Address : {{$about[0]->address}}</h1></li>--}}
{{--            <li style=""><h1 style="">Phone : {{$about[0]->phone}}</h1></li>--}}
{{--            <li style=""><h1 style="">Email : {{$about[0]->email}}</h1></li>--}}
            <li style=""><h1 style="">Our Services : {{$about[0]->details}}</h1></li>
        </ul>
<br>
        <h1 style="">Our Area : </h1>
        @foreach($area as $i => $area)
{{--            $i : {{$area->area_name}}--}}
            <div class="item ">
                <h1 style="">{{$area->area_name}}</h1>
            </div>
        @endforeach


        {{--        <div class="bs-component">--}}
        {{--            <div class="jumbotron" style="background-color: #222222;">--}}
        {{--                <p>Email : {{$about[0]->email}}</p>--}}
        {{--            </div>--}}
        {{--        </div>--}}
    </div>
    <!-- End About Section -->


@endsection


@section('scripts')

    <script>

    </script>

@endsection