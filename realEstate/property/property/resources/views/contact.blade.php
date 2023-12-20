@extends('layout.master')

@section('content')


{{--        <ul class="">--}}
{{--            <li><h1 style="">Address : </h1></li>--}}
{{--            <li style=""><h1 style="">Phone : </h1></li>--}}
{{--            <li style=""><h1 style="">Email : </h1></li>--}}
{{--            <li style=""><h1 style="">Our Services : {{$about[0]->details}}</h1></li>--}}
{{--        </ul>--}}
    <!-- Contact Section -->
{{--    <div class="form-horizontal" style="border: white solid 4px;--}}
{{--    border-radius: 25px 0px;">--}}
{{--        <form class="row" action="{{url('contactUs')}}" name="contactform"--}}
{{--              method="post">--}}
{{--            {{csrf_field()}}--}}
{{--            <fieldset>--}}
{{--                <h1 style="text-align: center; color: #ffffff ">Keep In Touch</h1>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="Name" class="col-lg-1 control-label">Name</label>--}}
{{--                    <div class="col-lg-2">--}}
{{--                        <input type="text" class="form-control" id="input_name" placeholder="Name">--}}
{{--                    </div>--}}

{{--                    <label for="Subject" class="col-lg-1 control-label">Subject</label>--}}
{{--                    <div class="col-lg-2">--}}
{{--                        <input type="text" class="form-control" id="input_subject" placeholder="Subject">--}}
{{--                    </div>--}}

{{--                    <label for="inputEmail" class="col-lg-1 control-label">Email</label>--}}
{{--                    <div class="col-lg-2">--}}
{{--                        <input type="text" class="form-control" id="input_email" placeholder="Email">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="textArea" class="col-lg-1 control-label">Message</label>--}}
{{--                    <div class="col-lg-8">--}}
{{--                        <textarea class="form-control" rows="4" id="input_message"></textarea>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <div class="col-lg-10 col-lg-offset-1">--}}
{{--                        <button type="submit" class="btn btn-primary" id="save_message">Send</button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </fieldset>--}}
{{--        </form>--}}
{{--    </div>--}}
    <!-- End Contact Section -->



    <!-- Contact Section -->
    <div class="form-horizontal" style="border: white solid 4px;
    border-radius: 25px 0px;">
        <ul class="" style=" color: #ffffff ">
            <li><h1 style="">Address : {{$about[0]->address}}</h1></li>
            <li style=""><h1 style="">Phone : {{$about[0]->phone}}</h1></li>
            <li style=""><h1 style="">Email : {{$about[0]->email}}</h1></li>
        </ul>
        {{csrf_field()}}
        <fieldset>
            <h1 style="text-align: center; color: #ffffff ">Keep In Touch</h1>
            <div class="form-group">
                <label for="Name" class="col-lg-1 control-label">Name</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="input_name" placeholder="Name">
                </div>

                <label for="Subject" class="col-lg-1 control-label">Subject</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="input_subject" placeholder="Subject">
                </div>

                <label for="inputEmail" class="col-lg-1 control-label">Email</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control" id="input_email" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="textArea" class="col-lg-1 control-label">Message</label>
                <div class="col-lg-8">
                    <textarea class="form-control" rows="4" id="input_message"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-1">
                    <button class="btn btn-primary" id="save_message">Send</button>
                </div>
            </div>
        </fieldset>
    </div>
    <!-- End Contact Section -->

@endsection



@section('scripts')

    <script>
        $(function () {
            $('#save_message').click(function () {
                console.log('aaasssdsdsds');
                var contact_name = $('#input_name').val();
                var contact_subject = $('#input_subject').val();
                var email = $('#input_email').val();
                var contact_message = $('#input_message').val();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'contactUs',
                    datatType: 'json',
                    type: 'POST',
                    data: {
                        'contact_name': contact_name,
                        'contact_subject': contact_subject,
                        'email': email,
                        'contact_message': contact_message
                    },

                    success: function (response) {
                        clear_input();
                        alert('SUCCESS');
                        console.log('SUCCESS');
                    }
                });
            });


        });

        function clear_input() {
            $('#input_name').val('');
            $('#input_subject').val('');
            $('#input_email').val('');
            $('#input_message').val('');
        }


    </script>

@endsection