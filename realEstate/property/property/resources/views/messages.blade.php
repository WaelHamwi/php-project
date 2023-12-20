@extends('layout.master')



@section('content')
    <div class="jumbotron" style="text-align: center; background-color: #222222; color: #ffffff ;border: white solid 4px;
    border-radius: 0px 25px;">
        <h1>Messages</h1>
    </div>

    <table class="table" style="color: white">
        <thead>
        <tr id="#head_id">
{{--            <th>#</th>--}}
            <th>Name</th>
{{--            <th>Subject</th>--}}
{{--            <th>Mail</th>--}}
            <th>Message</th>
{{--            <th>Option</th>--}}
        </tr>
        </thead>
        <tbody>
        @foreach( $messages as $messages )
            <tr id="row{{$messages->contact_messages_id}}">
{{--                <td>{{$messages->contact_messages_id}}</td>--}}
                <td>{{$messages->full_name}}</td>
{{--                <td>{{$messages->contact_subject}}</td>--}}
{{--                <td>{{$messages->contact_mail}}</td>--}}
                <td>{{$messages->details}}</td>
{{--                <td><a data-messages_id="{{$messages->contact_messages_id}}" class="delete_link"><span--}}
{{--                                class="glyphicon glyphicon-trash"></span></a></td>--}}
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection