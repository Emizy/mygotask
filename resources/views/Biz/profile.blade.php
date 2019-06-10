@extends('layouts.biz_dash')
@section('title')
    <title>{{ Auth::user()->business }} || Profile </title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-profile  overflow-hidden">
                <div class="card-body text-center cover-image"
                     data-image-src="{{ asset('assets/img/profile-bg.jpg') }}">
                    <div class=" card-profile">
                        <div class="row justify-content-center">
                            <div class="">
                                <div class="">
                                    <a href="#">
                                        <img src="/uploads/{{ Auth::user()->image }}" class="rounded-circle"
                                             alt="profile">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(Auth::user()->account_status == "COMPLETED")
                        <h3 class="mt-3 text-white">{{ Auth::user()->name }}</h3>
                    @endif
                    <p class="mb-4 text-white">{{ Auth::user()->business }} Company</p>
                    <button class="btn btn-primary btn-sm">
                        <span class="fab fa-twitter"></span> Follow
                    </button>
                    <a href="#" class="btn btn-success btn-sm"><i class="fas fa-pencil-alt" aria-hidden="true"></i> Edit
                        profile</a>
                </div>
                <div class="card-body">
                    <div class="nav-wrapper p-0">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active show mt-md-2 mt-0 mt-lg-0"
                                   id="tabs-icons-text-1-tab"
                                   data-toggle="tab" href="#tabs-icons-text-1" role="tab"
                                   aria-controls="tabs-icons-text-1" aria-selected="false"><i
                                            class="fas fa-home mr-2"></i>Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 mt-md-2 mt-0 mt-lg-0" id="tabs-icons-text-2-tab"
                                   data-toggle="tab" href="#tabs-icons-text-2" role="tab"
                                   aria-controls="tabs-icons-text-2" aria-selected="false"><i
                                            class="fas fa-user mr-2"></i>About Me</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0   mt-md-2 mt-0 mt-lg-0"
                                   id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab"
                                   aria-controls="tabs-icons-text-3" aria-selected="true"><i
                                            class="fas fa-users mr-2"></i>Social Me! </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card shadow ">
                <div class="card-body pb-0">
                    <div class="tab-content" id="myTabContent">
                        <!-- Profile-->
                        <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel"
                             aria-labelledby="tabs-icons-text-1-tab">
                            @if(isset($prof_error))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
                                    <span class="alert-inner--text"><strong>Warning!</strong> Profile Updated Not Successfull</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            @endif
                            @if(isset($prof_success))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-thumbs-up"></i></span>
                                    <span class="alert-inner--text"><strong>Success!</strong> "Profile Updated Successfullyt!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h2>Edit Profile</h2>
                            <div class="mb-4">
                                <form role="form" method="post" enctype="multipart/form-data"
                                      action="{{ route('biz.profile.update') }}">
                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       placeholder="Enter Your Name" value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"> Email </label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       placeholder="Enter Your Email" value="{{ Auth::user()->email }}">
                                                @if(Auth::user()->email_confirmation == 'NO')
                                                    <small style="color: red">

                                                        <strong>Warning!</strong> Yet to confirm your email,Kindly Click
                                                        Resend Button <a
                                                                href="{{ route('biz.resendemail') }}">Resend</a>


                                                    </small>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="business">Business Name</label>
                                                <input type="text" class="form-control" id="business" name="business"
                                                       placeholder="Enter Your Business Name"
                                                       value="{{ Auth::user()->business }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="business_type"> Business Type </label>
                                                <input type="text" class="form-control" id="business_type"
                                                       name="business_type" placeholder="Enter Your Business Type"
                                                       value="{{ Auth::user()->business_type }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="text" class="form-control" id="phone" name="phone"
                                                       placeholder="Enter Your Business Phone"
                                                       value="{{ Auth::user()->phone }}">
                                            </div>
                                        </div>
                                        @if(count($referral)>0)
                                            @foreach($referral as $r)
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="referal"> Referal </label>
                                                        <input type="text" class="form-control" id="referal"
                                                               name="referal"
                                                               value="{{ $r->user->business }}" disabled>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endif
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="state">State of location</label>
                                                <select id="state" name="state" class="form-control">

                                                    <option value="{{ Auth::user()->state }}">----Select your
                                                        state---
                                                    </option>
                                                    @if(count($state)>0)
                                                        @foreach($state as $p)

                                                            <option value="{{ $p->state }}">{{ $p->state }}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="local_govt"> Local-Government </label>
                                                <input type="text" class="form-control" id="local_govt"
                                                       name="local_govt"
                                                       placeholder="" value="{{ Auth::user()->local_govt }}">
                                                <small>Enter a correct local-government for your customer to locate you
                                                    easily
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address"> Business Address </label>
                                                <input type="text" class="form-control" id="address"
                                                       name="address"
                                                       placeholder="" value="{{ Auth::user()->address }}">
                                                <small>Enter a correct business location for your customer to locate you
                                                    easily
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="dob"> Date-Of-Birth </label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            <i class="fa fa-calendar tx-16 lh-0 op-6"></i>
                                                        </div>
                                                    </div>
                                                    <input class="form-control datepicker" placeholder="MM/DD/YYYY"
                                                           type="text" value="{{ Auth::user()->dob }}" name="dob">
                                                </div>
                                                <small>Let us be part of your memories</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image"> Business Logo (If Any) </label>

                                                <input type="file" class="form-control"
                                                       name="image" id="image"/>

                                            </div>
                                        </div>
                                        <div style="margin: 0 auto">
                                            <input class="btn btn-primary" type="submit" id="btn_send" value="Update">


                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!--End Profile-->

                        <div aria-labelledby="tabs-icons-text-2-tab" class="tab-pane fade" id="tabs-icons-text-2"
                             role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media-heading mt-3">
                                        <h3><strong>About Us</strong></h3>
                                    </div>
                                    @if(Auth::user()->about_us =! Null)
                                        <p class="mb-4">{{ Auth::user()->about_us }}</p>
                                    @else
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-warning alert-dismissible fade show"
                                                     role="alert">
                                                    <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
                                                    <span class="alert-inner--text"><strong>Warning!</strong> You are yet to update your About Us!</span>
                                                    <a class="close" data-dismiss="alert"
                                                       aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div style="margin: 0 auto">
                                    <a class="btn btn-primary" data-toggle="modal" data-target="#about_us"
                                       style="color: #fff;">EDIT
                                        <span class="fa fa-edit"></span></a>
                                </div>
                                <div class="modal fade" id="about_us" tabindex="-1" role="dialog"
                                     aria-labelledby="about_us" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="modal-title-default">Update About
                                                    Business</h2>
                                                <a class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('biz.profile.about') }}">
                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea class="form-control"
                                                                      id="about_us" name="about_us" rows="3"
                                                                      placeholder="{{ Auth::user()->about_us }}"
                                                                      value="{{ Auth::user()->about_us }}"></textarea>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="margin: 0 auto">
                                                        <input type="submit" class="btn btn-primary" value="Update">
                                                        <a class="btn btn-link"
                                                           data-dismiss="modal">Close
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade " id="tabs-icons-text-3" role="tabpanel"
                             aria-labelledby="tabs-icons-text-3-tab">
                            <div class="media-heading mt-3">
                                <h3><strong>Social Media Links</strong></h3>
                            </div>
                            <form method="post" action="{{ route('biz.profile.social') }}">
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                <div class="row">
                                    @if(count($social)>0)
                                        @foreach($social as $s)

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fab fa-facebook-square tx-16 lh-0 op-6"
                                                                   style="color: #0b1e70"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control"
                                                               placeholder="Enter your facebook page URL"
                                                               type="text" value="{{ $s->facebook }}" name="facebook">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fab fa-twitter-square tx-16 lh-0 op-6"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control"
                                                               placeholder="Enter your Twitter page URL"
                                                               type="text" value="{{ $s->twitter }}" name="twitter"
                                                               style="color: #0c85d0">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fab fa-instagram tx-16 lh-0 op-6"
                                                                   style="color: #7f1c30"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control"
                                                               placeholder="Enter your INSTAGRAM page URL"
                                                               type="text" value="{{ $s->instagram }}" name="instagram">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                <i class="fab fa-linkedin tx-16 lh-0 op-6"
                                                                   style="background-color: #0c1628"></i>
                                                            </div>
                                                        </div>
                                                        <input class="form-control"
                                                               placeholder="Enter your LINKEDIN page URL"
                                                               type="text" value="{{ $s->linkedin }}" name="linkedin">
                                                    </div>
                                                </div>
                                            </div>

                                        @endforeach
                                        <div style="margin: 0 auto">
                                            <input type="submit" class="btn btn-primary" id="update" value="Update">
                                        </div>
                                </div>
                            </form>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <span class="alert-inner--icon"><i class="fe fe-info"></i></span>
                                            <span class="alert-inner--text"><strong>Warning!</strong> You are yet to update your social media links!</span>
                                            <a class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin: 0 auto">
                                    <a class="btn btn-primary" data-toggle="modal" style="color: #fff"
                                       data-target="#social">EDIT <span
                                                class="fa fa-edit"></span></a>
                                </div>
                                <div class="modal fade" id="social" tabindex="-1" role="dialog"
                                     aria-labelledby="about_us" aria-hidden="true">
                                    <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="modal-title-default">Update Social Media
                                                    Links
                                                </h2>
                                                <a class="close" data-dismiss="modal"
                                                   aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </a>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('biz.profile.social') }}" method="post">
                                                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fab fa-facebook-square tx-16 lh-0 op-6"
                                                                               style="color: #0b1e70"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control"
                                                                           placeholder="Enter your facebook page URL"
                                                                           type="text" name="facebook">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fab fa-twitter-square tx-16 lh-0 op-6"
                                                                               style="color: #0c85d0"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control"
                                                                           placeholder="Enter your Twitter page URL"
                                                                           type="text" name="twitter">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fab fa-instagram tx-16 lh-0 op-6"
                                                                               style="color: #7f1c30"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control"
                                                                           placeholder="Enter your INSTAGRAM page URL"
                                                                           type="text" name="instagram">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <div class="input-group-text">
                                                                            <i class="fab fa-linkedin tx-16 lh-0 op-6"
                                                                               style="background-color: #0c1628"></i>
                                                                        </div>
                                                                    </div>
                                                                    <input class="form-control"
                                                                           placeholder="Enter your LINKEDIN page URL"
                                                                           type="text" name="linkedin">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div style="margin: 0 auto">
                                                        <input type="submit" class="btn btn-primary">
                                                        <a class="btn btn-link"
                                                           data-dismiss="modal">Close
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        $(document).ready(function () {

            $('#btn_send').click(function (event) {
                event.preventDefault();
                alert('dfghj');

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                {{--var url_name = "{{ url('/biz') }}/register";--}}
                {{--var business = $('#business').val();--}}
                {{--var email = $('#email').val();--}}
                {{--var password = $('#password').val();--}}

                {{--$.ajax({--}}
                {{--type: "POST",--}}
                {{--url: url_name,--}}
                {{--data: {--}}
                {{--business: business,--}}
                {{--email: email,--}}
                {{--password: password,--}}
                {{--},--}}
                {{--beforeSend: function () {--}}
                {{--$('#process').show();--}}

                {{--},--}}
                {{--success: function (response) {--}}
                {{--$('#process').hide();--}}
                {{--$('#success').show();--}}

                {{--},--}}
                {{--error: function (data) {--}}
                {{--var response = JSON.parse(data);--}}
                {{--console.log(response);--}}
                {{--$('#message').html("<div class=\"alert alert-danger\" role=\"alert\">\n" +--}}
                {{--"\t\t\t\t\t\t\t\t\t\t\t\t<strong>Oops!</strong> All field are required or Invalid Input fields\n" +--}}
                {{--"\t\t\t\t\t\t\t\t\t\t\t</div></div>");--}}


                {{--}--}}
                {{--})--}}
            })

        })

    </script>
@endsection