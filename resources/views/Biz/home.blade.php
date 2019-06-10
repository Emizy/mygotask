<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap 4.1.3 -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Animate Css -->
    <link rel="stylesheet" href="{{ asset('css/plugins/animate.css') }}">
    <!-- Google Font -->
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900"
            rel="stylesheet">
    <!-- Font Awesome -->
    <link
            href="../../stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
            rel="stylesheet">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('css/plugins/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('css/plugins/slick-theme.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/plugins/magnific-popup.css') }}">
    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <script src="{{ asset('js/plugins/jquery-3.3.1.min.js') }}"></script>
    <title>Home || MyGoTask</title>
</head>
<body>
<!-- Page Loading -->
<div class="se-pre-con"></div>
<!-- ======== Start Navbar ======== -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        @if(isset(Auth::user()->id))
            <a class="navbar-brand" href="{{ route('biz.index') }}"><img src="{{ asset('img/logo4.png') }}" alt="logo"></a>
        @else
            <a class="navbar-brand" href="{{ route('home') }}"><img src="{{ asset('img/logo4.png') }}" alt="logo"></a>
        @endif
        <button
                class="navbar-toggler"
                type="button"
                data-toggle="collapse"
                data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#features">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#benefits">Benefits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#price">Price</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact</a>
                </li>

            </ul>
            @if(isset(Auth::user()->id))
                <a href="{{ route('biz.account') }}" class="btn-1">Account</a>
                <a href="{{ route('biz.logout') }}" class="btn-1">Logout</a>
            @else
                <a href="{{ route('biz.login') }}" class="btn-1">Free Try</a>
            @endif
        </div>
    </div>
</nav>
<!-- ======== End Navbar ======== -->

<!-- ======== Start Slider ======== -->
<section class="slider d-flex align-items-center" id="slider">
    <div class="container">
        <div class="content">
            <div class="row d-flex align-items-center">
                <div class="col-md-6">
                    <div class="left">
                        <h1>Make Your Business
                            <br>More Profitable</h1>
                        <p>To design is much more than simply to assemble, to order,<br>
                            or even to edit it is to add value and meaning, to
                            <br>
                            illuminate, to simplify, to clarify.</p>
                        <a href="#0" class="btn-1">Get Started</a>
                    </div>
                </div>
                <!-- Right-->
                <div class="col-md-6">
                    <div class="right">
                        <img src="{{ asset('img/slider-img.png') }}" alt="slider-img" class="img-fluid wow fadeInRight"
                             data-wow-offset="1">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Slider ======== -->

<!-- ======== Start Features ======== -->
<section class="features" id="features">
    <div class="container text-center">
        <div class="heading">
            <h2>Exclusive Features</h2>
        </div>
        <div class="line"></div>
        <div class="row">
            <!-- Box-1 -->
            <div class="col-md-4">
                <div class="box">
                    <img src="{{ asset('img/feature-1.png') }}" alt="feature-1">
                    <h3>Go-Emails</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture
                        should influence way people.</p>
                </div>
            </div>
            <!-- Box-2 -->
            <div class="col-md-4">
                <div class="box">
                    <img src="{{ asset('img/feature-2.png') }}" alt="feature-1">
                    <h3>Go-SMSs</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture
                        should influence way people.</p>
                </div>
            </div>
            <!-- Box-3 -->
            <div class="col-md-4">
                <div class="box">
                    <img src="{{ asset('img/feature-3.png') }}" alt="feature-1">
                    <h3>Go-Consultant</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture
                        should influence way people.</p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ======== End Features ======== -->

<!-- ======== Start Some Facts ======== -->
<section class="some-facts">
    <div class="container text-center">
        <div class="row">
            <!-- Box-1 -->
            <div class="col-lg-3 col-sm-6">
                <div class="items">
                    <img src="{{ asset('img/some-fact/1.png') }}" alt="some-fact-1">
                    <h3>
                        <span class="counter">1,200</span>+</h3>
                    <div class="line mx-auto"></div>
                    <h4>Clients</h4>
                </div>
            </div>
            <!-- Box-2 -->
            <div class="col-lg-3 col-sm-6">
                <div class="items">
                    <img src="{{ asset('img/some-fact/2.png') }}" alt="some-fact-1">
                    <h3>$
                        <span class="counter">3,15</span>M</h3>
                    <div class="line mx-auto"></div>
                    <h4>Invested</h4>
                </div>
            </div>
            <!-- Box-3 -->
            <div class="col-lg-3 col-sm-6">
                <div class="items">
                    <img src="{{ asset('img/some-fact/3.png') }}" alt="some-fact-1">
                    <h3>
                        <span class="counter">14</span>%</h3>
                    <div class="line mx-auto"></div>
                    <h4>Growth p.a</h4>
                </div>
            </div>
            <!-- Box-4 -->
            <div class="col-lg-3 col-sm-6">
                <div class="items">
                    <img src="{{ asset('img/some-fact/4.png') }}" alt="some-fact-1">
                    <h3>
                        <span class="counter">2,500</span>+</h3>
                    <div class="line mx-auto"></div>
                    <h4>Hours of Work</h4>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- ======== End Some Facts ======== -->

<!-- ======== Start Project ======== -->
<section class="project">
    <div class="container">
        <div class="row d-flex align-items-center">
            <!-- Left -->
            <div class="col-md-6">
                <img src="{{ asset('img/project-img.png') }}" alt="project" class="img-fluid">
            </div>
            <!-- Right -->
            <div class="col-md-5">
                <div class="right">
                    <span>PROJECT SCHEDULES</span>
                    <h2>Easily balance workloads and
                        <br>manage resources</h2>
                    <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                        and filter to focus in on anything form a single project to an individual
                        person's workload
                        <br>
                        Discover where each customer came from, how they interact with your marketing
                        channels, and gain deeper insights into what drives them to purchase.a.</p>
                    <a href="#0" class="btn-1">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Project ======== -->

<!-- ======== Start Video ======== -->
{{--<section class="video">--}}
{{--<div class="container text-center">--}}
{{--<div class="video-icon">--}}
{{--<div class="icon-abs">--}}
{{--<a href="https://www.youtube.com/watch?v=S6lzo-OWoqI" class="icon pulse expand video-link">--}}
{{--<i class="fa fa-play" aria-hidden="true"></i>--}}
{{--</a>--}}
{{--</div>--}}
{{--</div>--}}
{{--</div>--}}
{{--</section>--}}
<!-- ======== End Video ======== -->


<!-- ======== Start Benefits ======== -->
<section class="benefits" id="benefits">
    <div class="container text-center">
        <div class="heading">
            <h2>Benefits of Jaxa</h2>
        </div>
        <div class="line"></div>
        <div class="row">
            <!-- Box-1 -->
            <div class="col-md-4 col-sm-6">
                <div class="box mb-30">
                    <img src="{{ asset('img/benefits/1.png') }}" alt="benefits">
                    <h3>Cart Report</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni tur.</p>

                </div>
            </div>
            <!-- Box-2 -->
            <div class="col-md-4 col-sm-6">
                <div class="box mb-30">
                    <img src="{{ asset('img/benefits/2.png') }}" alt="benefits">
                    <h3>Build Browsers</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture.</p>

                </div>
            </div>
            <!-- Box-3 -->
            <div class="col-md-4 col-sm-6">
                <div class="box mb-30">
                    <img src="{{ asset('img/benefits/3.png') }}" alt="benefits">
                    <h3>Trak Sales</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture.</p>

                </div>
            </div>
            <!-- Box-4 -->
            <div class="col-md-4 col-sm-6">
                <div class="box">
                    <img src="{{ asset('img/benefits/4.png') }}" alt="benefits">
                    <h3>Build-in skills</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture.</p>

                </div>
            </div>
            <!-- Box-5 -->
            <div class="col-md-4 col-sm-6">
                <div class="box">
                    <img src="{{ asset('img/benefits/5.png') }}" alt="benefits">
                    <h3>Scope Techno</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture.</p>

                </div>
            </div>
            <!-- Box-6 -->
            <div class="col-md-4 col-sm-6">
                <div class="box">
                    <img src="{{ asset('img/benefits/6.png') }}" alt="benefits">
                    <h3>Responsive</h3>
                    <p>The aim of being a good designer is to an influence. If you design furni ture.</p>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Benifits ======== -->


<!-- ======== Start Get Started ======== -->
@if(!isset(Auth::user()->id))
    <section class="get-started">
        <div class="container text-center">
            <span>get started</span>
            <h3>15-day free trial. No credit card required</h3>
            <a href="{{ route('biz.login') }}" class="btn-1">Get Started</a>

        </div>
    </section>
@endif
<!-- ======== End Get Started ======== -->

<!-- ======== Start Testimonial ======== -->
<section class="testimonials">
    <div class="container text-center">
        <div class="heading">
            <h2>Testimonials</h2>
        </div>
        <div class="line"></div>
        <div class="slick-slider">
            <!-- Box-1 -->
            <div class="box">
                <img src="{{ asset('img/testimonials/1.png') }}" alt="" class="m-auto">
                <h3>Alamin Musa</h3>
                <span>Graphic Designer</span>
                <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                    and filter to focus in on anything form a single what drives them to purchase.a.</p>
            </div>
            <!-- Box-1 -->
            <div class="box">
                <img src="{{ asset('img/testimonials/2.png') }}" alt="" class="m-auto">
                <h3>Mohamed Moaz</h3>
                <span>Logo Designer</span>
                <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                    and filter to focus in on anything form a single what drives them to purchase.a.</p>
            </div>
            <!-- Box-1 -->
            <div class="box">
                <img src="{{ asset('img/testimonials/3.png') }}" alt="" class="m-auto">
                <h3>Musa Ahmed</h3>
                <span>Web Designer</span>
                <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                    and filter to focus in on anything form a single what drives them to purchase.a.</p>
            </div>
            <!-- Box-1 -->
            <div class="box">
                <img src="{{ asset('img/testimonials/1.png"') }}" alt="" class="m-auto">
                <h3>Gassim Ahmed</h3>
                <span>Back End Developer</span>
                <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                    and filter to focus in on anything form a single what drives them to purchase.a.</p>
            </div>
            <!-- Box-1 -->
            <div class="box">
                <img src="{{ asset('img/testimonials/2.png') }}" alt="" class="m-auto">
                <h3>Adil Elsaeed</h3>
                <span>Wordpress Developer</span>
                <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                    and filter to focus in on anything form a single what drives them to purchase.a.</p>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Testimonial ======== -->

<!-- ======== Start Project-2 ======== -->
<section class="project-2">
    <div class="container">
        <div class="row d-flex align-items-center">
            <!-- Left -->
            <div class="col-md-5">
                <div class="left">
                    <span>PROJECT FETURES</span>
                    <h2>Increase conversions and sales</h2>
                    <p>Plan ahead by day, week, or month, and see project status at a glance. Search
                        and filter to focus in on anything form a single project to an individual
                        person's workload Discover where each customer came from, how they interact with
                        your and gain deeper insights into what drives them to purchase
                        <br><br>
                        Plan ahead by day, week, or month, and see project status at a glance. Search
                        and filter to focus in on anything form a single project to an Plan ahead by
                        day, week, or month .</p>
                    <a href="#0" class="btn-1">Get Started</a>
                </div>
            </div>
            <!-- Right -->
            <div class="col-md-7">
                <img src="{{ asset('img/project-2-img.png') }}" alt="project" class="img-fluid">
            </div>
        </div>
    </div>
</section>
<!-- ======== End Project-2 ======== -->

<!-- ======== Start Our Price ======== -->
<section class="our-price" id="price">
    <div class="container text-center">
        <div class="heading">
            <h2>Our Price</h2>
        </div>
        <div class="line"></div>
        <div class="row">
            <!-- Box-1 -->
            <div class="col-md-4">
                <div class="box">
                    <h3>Basic</h3>
                    <h4>$<span>25</span>/ year</h4>
                    <ul>
                        <li>Admin Panel</li>
                        <li>100GB Storge</li>
                        <li>Unlimited Email</li>
                    </ul>
                    <a href="#0" class="btn-2">Get Started</a>
                </div>
            </div>
            <!-- Box-2 -->
            <div class="col-md-4">
                <div class="box box-center">
                    <a href="#0" class="top-btn">Popular</a>
                    <h3>Standard</h3>
                    <h4>$<span class="blue">45</span>/ year</h4>
                    <ul>
                        <li>Admin Panel</li>
                        <li>300GB Storge</li>
                        <li>Unlimited Email</li>
                    </ul>
                    <a href="#0" class="btn-1">Get Started</a>
                </div>
            </div>
            <!-- Box-3 -->
            <div class="col-md-4">
                <div class="box">
                    <h3>Ultimate</h3>
                    <h4>$<span>85</span>/ year</h4>
                    <ul>
                        <li>Admin Panel</li>
                        <li>500GB Storge</li>
                        <li>Unlimited Email</li>
                    </ul>
                    <a href="#0" class="btn-2">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Our Price ======== -->

<!-- ======== Start Clients ======== -->
<section class="clients">
    <div class="container">
        <div class="slick-slider-clients">
            <div class="item"><img src="{{ asset('img/clients/1.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/2.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/3.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/4.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/5.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/1.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/2.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/3.png') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/4.png"') }}" alt="" class="img-fluid"></div>
            <div class="item"><img src="{{ asset('img/clients/5.png"') }}" alt="" class="img-fluid"></div>
        </div>
    </div>
</section>
<!-- ======== End Clients ======== -->

<!-- ======== Start Contact Us ======== -->
<section class="contact" id="contact">
    <div class="container">
        <div class="heading text-center">
            <h2>Keep In Touch</h2>
            <div class="line"></div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="title">
                    <h3>Contact Us :</h3>
                    <p>Nulla metus metus ullamcorper vel tincidunt sed euismod nibh Quisque volutpat</p>
                </div>
                <div class="content">
                    <!-- Info-1 -->
                    <div class="info d-flex align-items-start">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        <h4 class="d-inline-block">PHONE :
                            <br>
                            <span>+249122115057 , +249123456789</span></h4>
                    </div>
                    <!-- Info-2 -->
                    <div class="info d-flex align-items-start">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                        <h4 class="d-inline-block">EMAIL :
                            <br>
                            <span>brextheme@info.com</span></h4>
                    </div>
                    <!-- Info-3 -->
                    <div class="info d-flex align-items-start">
                        <i class="fa fa-street-view" aria-hidden="true"></i>
                        <h4 class="d-inline-block">ADDRESS :<br>
                            <span>6743 Saudi Arabia Street ,Ryadh, Bahri</span></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-7">

                <form method="POST" action="{{ route('sendemail') }}">
                    <div class="row">

                        @if(Session::has('contact_success'))

                            <div class="col-sm-12">
                                <div class="alert alert-success" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-check-square"></i></span>
                                    <span class="alert-inner--text"><strong>Primary!</strong> This is a warning alert—check it out that has an icon too!</span>
                                </div>
                            </div>

                        @endif
                        @if(Session::has('contact_error'))
                                <div class="col-sm-12">
                                    <div class="alert alert-danger" role="alert">
                                        <span class="alert-inner--icon"><i class="fe fe-check-square"></i></span>
                                        <span class="alert-inner--text"><strong>Oops!</strong> Message Not Sent</span>
                                    </div>
                                </div>
                        @endif
                        <br>
                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" placeholder="Name" id="name">
                        </div>
                        <div class="col-sm-6">
                            <input type="email" class="form-control" placeholder="Email" id="email">
                        </div>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" placeholder="Subject" id="subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" rows="5" id="message" placeholder="Message"></textarea>
                    </div>
                    <input class="btn btn-block" type="submit" value="Send Now!!">
                </form>
            </div>
        </div>
    </div>
</section>
<!-- ======== End Contact Us ======== -->

<!-- ======== Start Footer ======== -->
<footer class="footer">
    <div class="container text-center">
        <img src="{{ asset('img/logo-white.png') }}" alt="">
        <p>© 2018 MyGoTask. All rights reserved.</p>
    </div>
</footer>
<!-- ======== End Footer ======== -->
{{--<script>--}}
{{--$(document).ready(function () {--}}


{{--$('#btn_send').click(function (event) {--}}
{{--event.preventDefault();--}}

{{--$.ajaxSetup({--}}
{{--headers: {--}}
{{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--}--}}
{{--});--}}
{{--var url_name = "{{ url('/sendemail') }}";--}}
{{--var name = $('#name').val();--}}
{{--var email = $('#email').val();--}}
{{--var subject = $('#subject').val();--}}
{{--var message = $('#message').val();--}}

{{--$.ajax({--}}
{{--type: "post",--}}
{{--url: url_name,--}}
{{--data: {--}}
{{--name: name,--}}
{{--email: email,--}}
{{--subject: subject,--}}
{{--message: message,--}}
{{--},--}}
{{--beforeSend: function () {--}}
{{--$('#btn_send').text('Proccessing.....');--}}

{{--},--}}
{{--success: function (response) {--}}
{{--$('#btn_send').text('Your request has been successfully submitted');--}}
{{--$('#btn_send').text('Your request has been successfully submitted');--}}
{{--$('#btn_send').text('Your request has been successfully submitted');--}}
{{--$('#btn_send').text('Your request has been successfully submitted');--}}
{{--// $('#message').html("<div class='panel panel-danger'>Your request has been successfully submitted</div>");--}}


{{--},--}}
{{--error: function (data) {--}}
{{--$('#btn_send').text('Request submisssion not Successfully');--}}
{{--//$('#message').html("<div class='panel panel-danger' style='background-color: red'>Request submisssion not Successfully</div>");--}}
{{--// location.reload();--}}
{{--console.log('Failed');--}}
{{--}--}}
{{--})--}}
{{--})--}}

{{--})--}}
{{--</script>--}}
<!-- ======== Java Script ======== -->

<!-- Bootstrap 4.1.3 -->
<script src="{{ asset('js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Slick Slider -->
<script src="{{ asset('js/plugins/slick.min.js') }}"></script>
<!-- Couner Up-->
<script src="{{ asset('js/plugins/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery.counterup.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('js/plugins/wow.min.js') }}"></script>
<!-- Magnific Popup-->
<script src="{{ asset('js/plugins/magnific-popup.min.js') }}"></script>
<!-- Main Js-->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>