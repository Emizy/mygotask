@extends('layouts.biz_dash')
@section('title')
    <title> {{ Auth::user()->business }} || Dashboard</title>
@endsection


@section('content')

    <div class="row">
        <div class="col-xl-3">
            <div class="card shadow overflow-hidden">
                <div class="card-body">
                    <div class="widget text-center">
                        <div><i class="fas fa-users fa-5x text-yellow"></i></div>
                        <h4 class="text-muted mt-2 mb-0">Total Customers</h4>
                        @if(count($customer)>0)
                            <h2 class="display-2 mb-0">{{ count($customer) }}</h2>
                        @else
                            <h2 class="display-2 mb-0">0</h2>
                        @endif
                        <a href="#" class="btn btn-outline-yellow mt-3 btn-sm btn-pill">view all</a>
                    </div>
                </div>
                <span class="updating-chart" data-peity='{ "fill": ["#ffa21d"]}'>5,3,9,6,5,9,2,5,3,6,7,8,6</span>
            </div>
        </div>
        {{--<div class="col-xl-3">--}}
        {{--<div class="">--}}
        {{--<div class="">--}}
        {{--<div class="row">--}}
        {{--<div class="col-xl-12 col-lg-12 col-sm-12">--}}
        {{--<div class="card shadow overflow-hidden">--}}
        {{--<div class="card-body pb-0">--}}
        {{--<div class="widget text-center">--}}
        {{--<small class="text-muted">Customer Per Month</small>--}}
        {{--<h2 class="text-xxl mb-0">$ 8,343</h2>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<span class="bar" data-peity='{ "fill": ["#00c3ed"]}'>5,4,5,2,8,4,5,6,5,2,4,4,8,4,6,2,3,4</span>--}}
        {{--</div>--}}
        {{--<div class="card shadow overflow-hidden">--}}
        {{--<div class="card-body pb-0">--}}
        {{--<div class="widget text-center">--}}
        {{--<small class="text-muted">Sales Weekly</small>--}}
        {{--<h2 class="text-xxl mb-0">$ 683</h2>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<span class="bar" data-peity='{ "fill": ["#18b16f"]}'>5,4,5,2,8,4,5,6,5,2,4,4,8,4,6,2,3,4</span>--}}

        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        <div class="col-xl-6">
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="">Account Status</small>
                                        @if(Auth::user()->account_status == 'COMPLETED')
                                            <h2 class="text-xxl mb-1 text-success"><i
                                                        class="fe fe-check-square ml-1 text-success"></i></h2>
                                            <p class="mb-0"> <span class=""><i
                                                            class="fe fe-check-square text-success ml-1"></i>Verified</p>
                                        @else
                                            <h2 class="text-xxl mb-1 text-success"><i
                                                        class="fe fe-watch ml-1 text-success"></i></h2>
                                            <p class="mb-0">
                                                Pending</p>
                                        @endif

                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="">Customer Lifetime Value</small>
                                        <h2 class="text-xxl mb-1 text-yellow">$ 256</h2>
                                        <p class="mb-0"><span class=""><i
                                                        class="fas fa-caret-down text-danger ml-1"></i> 5%</span>
                                            last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="">Total Sales</small>
                                        <h2 class="text-xxl text-primary mb-1">{{ count($total_sales) }}</h2>
                                        <p class="mb-0"><span class=""><i
                                                        class="fas fa-chart-line text-success ml-1"></i> {{ count($total_sales)  / 100 * 30 }}%</span>
                                            Increase</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-body">
                                    <div class="widget text-center">
                                        <small class="">Monthly Sales Growth</small>
                                        <h2 class="text-xxl text-danger mb-1">12%</h2>
                                        <p class="mb-0"><span class=""><i
                                                        class="fas fa-caret-down text-danger ml-1"></i> 8%</span>
                                            last month</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
