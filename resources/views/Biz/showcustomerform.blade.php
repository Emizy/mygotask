@extends('layouts.biz_dash')
@section('title')
    <title>{{ Auth::user()->business }} || Customer Management </title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0"><span class="fe fe-plus-circle"></span> ADD NEW CUSTOMERS</h2>
                </div>
                @if(Session::has('form_error'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">

                        <span class="alert-inner--text"><strong>Info!</strong> All fields Are Required!</span>
                        <a class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                @endif
                @if(Session::has('form_success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">

                        <span class="alert-inner--text"><i class="fe fe-check"></i> Customer Successfully Added!</span>
                        <a class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </a>
                    </div>
                @endif
                @if(Auth::user()->account_status == "UNCOMPLETED")
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                        <span class="alert-inner--text"><strong>Info!</strong> You can't add customer now,Your account is yet to be VERIFIED!<i
                                    class="fe fe-watch"></i></span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @else
                    <div class="card-body">
                        <form method="post" action="{{ route('biz.manage.save') }}">
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Enter Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                               placeholder="Enter Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="email">Enter Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               placeholder="Enter Email" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="phone">Enter Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Enter Your Phone" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="dob">Date-Of-Birth</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                               placeholder="Enter Your Date-Of-Birth" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="state">Enter State</label>
                                        <select id="state" name="state" class="form-control" required>
                                            <option value="">----Select Occupation---</option>
                                            @foreach($state as $st)
                                                <option value="{{ $st->state }}">{{ $st->state }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="local_govt">Enter Local_Govt</label>
                                        <input type="text" class="form-control" id="local_govt" name="local_govt"
                                               placeholder="Enter Local Government" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="product">Occupation</label>
                                        @if(count($occupation) == 0)
                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                                <span class="alert-inner--text"><strong>Info!</strong> You are yet to add your customer occupation,Kindly follow this link!  <a
                                                            href="{{ route('biz.manage.occupation') }}" style="color: darkred;font-weight: bolder"><i
                                                                class="fe fe-plus-circle"></i> <strong>ADD</strong></a></span>
                                            </div>
                                        @else
                                            <select id="state" name="occupation" class="form-control" required>
                                                @foreach($occupation as $oc)
                                                    <option value="{{ $oc->occupation }}">{{ $oc->occupation }}</option>
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-label mb-3">Enable to send Thank You Email message</div>
                                        <label class="custom-switch">
                                            <input type="checkbox" name="option" value="1" class="custom-switch-input">
                                            <span class="custom-switch-indicator custom-switch-indicator-default"></span>
                                        </label>
                                    </div>
                                </div>
                                @if(count($occupation) > 0)
                                    <div style="margin: 0 auto">
                                        <input class="btn btn-primary" type="submit" id="btn_send" value="Save">

                                    </div>
                                @endif
                            </div>

                        </form>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection