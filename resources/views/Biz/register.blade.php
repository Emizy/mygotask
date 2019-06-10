@extends('layouts.biz_master')
@section('title')
    <title> MYGOTASK || Register </title>
@endsection

@section('content')


    <style>
        html, body {
            height: 100%;
            margin: 0px;
            padding: 0px;
            line-height: 1 !important;
        }

        .grandParentContaniner {
            display: table;
            height: 100%;
            min-height: 100vh;
            margin: 0 auto;
        }

        .parentContainer {
            display: table-cell;
            vertical-align: middle;
        }

        #myform {
            width: 300px;

        }

        .wrap-login100 {
            box-sizing: border-box;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 50px;
        }

        .p-5 {
            padding: 3rem !important;
        }

        .text-center {
            font-size: 24px;
            color: #333333;
            line-height: 1.2;
            text-align: center;
            width: 100%;
            display: block;
            padding-bottom: 10px;
        }

        .login100-form-btn {
            font-size: 15px;
            line-height: 1.5;
            color: #fff;
            text-transform: uppercase;
            width: 100%;
            background: #f4f6fb;
            height: 50px;
            border-radius: 25px;
            display: flex;
            padding: 0 25px;
            justify-content: center;
            align-items: center;
            background-color: #00c3ed;
            border-color: #00c3ed;
            box-shadow: 0 4px 6px rgba(55, 130, 146, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }

        .login100-form-btn:hover {
            background-color: #00c3ed;
            border-color: #00c3ed;
            box-shadow: 0 4px 6px rgba(55, 130, 146, .11), 0 1px 3px rgba(0, 0, 0, .08);
        }
    </style>



    <div class="grandParentContaniner">
        <div class="parentContainer">
            <div class="wrap-login100 p-5"
                 style="box-shadow: 0 4px 6px rgba(55, 130, 146, .11), 0 1px 3px rgba(0, 0, 0, .08)">
                <div class="alert alert-primary" id="process" style="display: none">Proccessing.....<span
                            class="fa fa-spinner fa-spin"></span>
                </div>
                @if(Session::has('success'))
                    <div id="myform">
                        <div class="alert alert-success" id="success" style="display: block"><strong>Success!</strong>
                            Registration
                            successfull,Account Confirmation link has been sent to your Mail,You can check your Spam if
                            not
                            inside Inbox! <span class="fa fa-check-square"
                                                style="font-weight: bold"></span>
                        </div>
                    </div>

                @endif
                @if(Session::has('error'))
                    <div id="myform">
                        <div class="alert alert-danger" style="display: block"><strong>Success!</strong>
                            {{ Session::get('error') }}! <span class="fa fa-check-square"
                                                               style="font-weight: bold"></span>
                        </div>
                    </div>
                @endif
                <div id="myform">

                    <div class="alert alert-danger" id="danger" style="display: none"><strong>Success!</strong>
                        Registration
                        successfull,Account Confirmation link has been sent to your Mail,You can check your Spam if
                        not
                        inside Inbox! <span class="fas fa-expand-arrows-alt"
                                            style="font-weight: bold"></span>
                    </div>
                </div>


                <h2 class="text-center">Register Account</h2>

                <form role="form" method="POST" id="myform" action="{{ route('biz.register.submit') }}">
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                    <div class="form-group">
                        <label for="business">Business Name</label>
                        <input type="text" class="form-control" id="business" name="business"
                               placeholder="Enter Business Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email"
                               placeholder="Enter Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary login100-form-btn">Submit
                    </button>
                    <br>
                    <span class="">Already Have an Account <a
                                href="{{ route('biz.login') }}"> Login ?</a> </span>

                </form>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {

            $('#btn_send').click(function (event) {
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                var url_name = "{{ url('/biz') }}/register";
                var business = $('#business').val();
                var email = $('#email').val();
                var password = $('#password').val();

                $.ajax({
                    type: "POST",
                    url: url_name,
                    data: {
                        business: business,
                        email: email,
                        password: password,
                    },
                    beforeSend: function () {
                        $('#process').show();

                    },
                    success: function (response) {
                        $('#process').hide();
                        $('#success').show();

                    },
                    error: function (data) {
                        var response = JSON.parse(data);
                        console.log(response);
                        $('#message').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +
                            "\t\t\t\t\t\t\t\t\t\t\t\t<strong>Oops!</strong> All field are required or Invalid Input fields\n" +
                            "\t\t\t\t\t\t\t\t\t\t\t</div></div>");


                    }
                })
            })

        })

    </script>
@endsection