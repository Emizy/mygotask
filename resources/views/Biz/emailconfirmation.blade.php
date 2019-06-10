@extends('layouts.biz_master')
@section('title')
    <title>MYGOTASK || CONFIRMATION </title>
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
            >

                @if(Session::has('confirm_1'))
                    <div id="myform">
                        <img src="{{ asset('img/confirm.png') }}" style="height: 70%;width: 70%;margin-left: 50px; ">
                    </div>
                    <h5 class="text-center" style="color: green;font-size: 17px;">{{ Session::get('confirm_1') }}</h5>
                    <div class="text-center">
                        <a href="{{ route('biz.index') }}" class="btn btn-success" style="border-radius: 25px;">Back to
                            Home</a>
                    </div>
                @elseif(Session::has('confirm'))
                    <div id="myform">
                        @if(Session::get('img') == 'think.png')
                            <img src="{{ asset('img/think.jpeg') }}" style="height: 70%;width: 70%;margin-left: 50px; ">
                        @else
                            <img src="{{ asset('img/sad.png') }}" style="height: 70%;width: 70%;margin-left: 50px; ">
                        @endif
                    </div>
                    <h5 class="text-center" style="color: green;font-size: 17px;">{{ Session::get('confirm') }}</h5>
                    <div class="text-center">
                        <a href="{{ route('biz.index') }}" class="btn btn-success" style="border-radius: 25px;">Back to
                            Home</a>
                    </div>

                @endif
                {{--@if(Session::has('confirm_3'))--}}
                {{--<div id="myform">--}}
                {{--<img src="{{ asset('img/confirm.png') }}" style="height: 70%;width: 70%;margin-left: 50px; ">--}}
                {{--</div>--}}
                {{--<h5 class="text-center" style="color: green;font-size: 17px;">{{ Session::get('confirm_3') }}</h5>--}}
                {{--<div class="text-center">--}}
                {{--<a href="{{ route('biz.index') }}" class="btn btn-success" style="border-radius: 25px;">Back to--}}
                {{--Home</a>--}}
                {{--</div>@endif--}}


            </div>
        </div>
    </div>
@endsection