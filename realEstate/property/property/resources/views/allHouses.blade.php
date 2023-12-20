@extends('layout.master')


@section('content')
    <div class="jumbotron" style="text-align: center; background-color: #222222; color: #ffffff ;border: white solid 4px;
    border-radius: 0px 25px;">
        <h1>All Houses</h1>
    </div>

    <div class="form-group col-lg-4" style="display: contents;">
        <form role="form" action="{{ route('search')}}" method="GET">
            <input type="text" name="text_search" id="text_search" value="{{request()->input('text_search')}}" class="search-form form-control" autocomplete="off" placeholder="Search">
        </form>
    </div>
    <br>
    <!-- Blogs -->
    <div class="" style="margin-bottom: 70px">
        @foreach($allHouses as $allHouses)
            <div class="col-md-4" style="">
                <div class="thumbnail" style="margin: 10px ;max-height:500px;">
                    <img src="{{$allHouses->image}}" alt="No Image" style="width:100%">
                    <h3 class="profile-name">{{$allHouses->address}}</h3>
                    <div class="caption">
                        <p> {{str_limit($allHouses->details)}} <a
                                    href="{{url('viewHouse/'.$allHouses->house_id.'')}}" id="read_more_for_blog"
                                    blog_id={{$allHouses->house_id}}>Read More</a> ...</p>
                    </div>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection