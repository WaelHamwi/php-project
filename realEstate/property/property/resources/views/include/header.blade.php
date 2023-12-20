<nav class="navbar navbar-inverse" style="margin: 0px">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">WWD</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
            <ul class="nav navbar-nav  navbar-right">
                <li><a href="{{url('/')}}">Home</a></li>
                <li><a href="{{url('contact')}}">Contact</a></li>
                <li><a href="{{url('messages')}}">Messages</a></li>
                <li><a href="{{url('addHouse')}}">Add House</a></li>
                <li><a href="{{url('allHouses')}}">All Houses</a></li>
                <li><a href="{{url('login')}}">Login</a></li>
                <li><a href="{{url('logout')}}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>
{{--URL::to('/all_blogs')--}}