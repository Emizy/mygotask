@extends('layouts.biz_dash')
@section('title')
    <title>{{ Auth::user()->business }} || Daily Entries </title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow">
                @if(Auth::user()->account_status == 'COMPLETED')
                    @if(count($customer) > 0)
                        <div class="card-header">
                            <h2 class="mb-0">
                                <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-default"
                                   style="margin-left: 50%"><i class="fe fe-plus-circle"></i> ADD NEW ENTRIES</a>
                            </h2>
                        </div>
                        <div class="modal fade" id="modal-default" tabindex="-1"
                             role="dialog"
                             aria-labelledby="modal-default" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="modal-title-default"><i
                                                    class="fe fe-plus-circle"></i>

                                            ADD NEW
                                        </h2>
                                        <a class="close" data-dismiss="modal"
                                           aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </a>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post"
                                              action="{{ route('biz.manage.dailyentries.save') }}">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                            <div class="form-group">
                                                <label class="form-label" for="name">Product Name</label>
                                                <input type="text" class="form-control" id="name"
                                                       name="name"
                                                       placeholder="Enter the Product Name">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="price">Enter Price</label>
                                                <input type="text" class="form-control" id="price"
                                                       name="price"
                                                       placeholder="Enter the Price">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="price">Enter Quantity</label>
                                                <input type="text" class="form-control" id="quantity"
                                                       name="quantity"
                                                       placeholder="Enter the Quantity">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="customer_id">Customer Name</label>
                                                <select id="customer_id" name="customer_id"
                                                        class="form-control">
                                                    <option value="">--
                                                        Select Customer--
                                                    </option>
                                                    @foreach($customer as $oc)
                                                        <option value="{{ $oc->id }}">{{ $oc->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-label mb-3">Enable to Send Mail</div>
                                                <label class="custom-switch">
                                                    <input type="checkbox" name="option" value="2" class="custom-switch-input">
                                                    <span class="custom-switch-indicator custom-switch-indicator-default"></span>
                                                </label>
                                            </div>
                                            <input type="submit" class="btn btn-primary" value="Save">
                                            <a class="btn btn-link  ml-auto"
                                                    data-dismiss="modal">Close
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            @if(Session::has('success'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                    <span class="alert-inner--text"><strong>Success!</strong>{{ Session::get('success') }}!</span>
                                    <a  class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </a>
                                </div>
                            @endif
                            @if(isset($user))
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th class="wd-15p">Name</th>
                                            <th class="wd-25p">Price</th>
                                            <th class="wd-15p">Quantity</th>
                                            <th class="wd-25p">Customer Name</th>
                                            <th class="wd-25p"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($user as $users)
                                            <tr>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->price }}</td>
                                                <td>{{ $users->quantity }}</td>
                                                <td>{{ $users->businessdirectory->name }}</td>
                                                <td>
                                                    <a data-toggle="modal" data-target=""
                                                       href=""
                                                       class="btn btn-success btn-sm" type="button"><span
                                                                class="fe fe-mail"></span>Send Mail</a>
                                                    <a data-toggle="modal" data-target="#modal-default_{{ $users->id }}"
                                                       href=""
                                                       class="btn btn-primary btn-sm" type="button"><span
                                                                class="fe fe-edit"></span>Edit</a>
                                                    <a data-toggle="modal" data-target="#modal-delete_{{ $users->id }}"
                                                       class="btn btn-danger btn-sm"
                                                       type="button"><span class="fe fe-trash"></span>Delete</a>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="modal-default_{{ $users->id }}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="modal-title-default"> <span class="fe fe-edit"></span>Edit
                                                                Entery
                                                            </h2>
                                                            <a class="close" data-dismiss="modal"
                                                               aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                  action="{{ route('biz.manage.dailyentries.update') }}">
                                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                <input type="hidden" name="id" value="{{ $users->id }}">
                                                                <input type="hidden" name="cust_id" value="{{ $users->businessdirectory->id }}">
                                                                <div class="form-group">
                                                                    <label class="form-label" for="name">Product Name</label>
                                                                    <input type="text" class="form-control" id="name"
                                                                           name="name" value="{{ $users->name }}"
                                                                           placeholder="Enter the Product Name" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price">Enter Price</label>
                                                                    <input type="text" class="form-control" id="price"
                                                                           name="price" value="{{ $users->price }}"
                                                                           placeholder="Enter the occupation" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="price">Enter Quantity</label>
                                                                    <input type="text" class="form-control" id="quantity"
                                                                           name="quantity" value="{{ $users->quantity }}"
                                                                           placeholder="Enter the Quantity" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="form-label" for="customer_id">Customer Name</label>
                                                                    <select id="customer_id" name="customer_id"
                                                                            class="form-control">
                                                                        <option value="{{ $users->businessdirectory->id }}">--
                                                                            Change  {{ $users->businessdirectory->name }} --
                                                                        </option>
                                                                        @foreach($customer as $oc)
                                                                            <option value="{{ $oc->id }}">{{ $oc->name }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <input type="submit" class="btn btn-primary" value="Save">
                                                                <a class="btn btn-link  ml-auto"
                                                                        data-dismiss="modal">Close
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="modal-delete_{{ $users->id }}" tabindex="-1"
                                                 role="dialog"
                                                 aria-labelledby="modal-default" aria-hidden="true">
                                                <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                     role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="modal-title-default"> <span class="fe fe-edit"></span>Are You Sure
                                                            </h2>
                                                            <a class="close" data-dismiss="modal"
                                                               aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post"
                                                                  action="{{ route('biz.manage.dailyentries.delete') }}">
                                                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                                                                <input type="hidden" name="id" value="{{ $users->id }}">
                                                                <input type="hidden" name="cust_id" value="{{ $users->businessdirectory->id }}">
                                                                <input type="submit" class="btn btn-primary" value="Save">
                                                                <a class="btn btn-link  ml-auto"
                                                                        data-dismiss="modal">Close
                                                                </a>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                    <span class="alert-inner--text"><strong>Info!</strong> Customer Records Empty!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            @else
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                    <span class="alert-inner--text"><strong>Info!</strong>You  add customer ,Kindly go to Add Customer</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            @else
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                    <span class="alert-inner--text"><strong>Info!</strong>You can't add customer now,Your account is yet to be VERIFIED!</span>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                        </div>
            </div>
        </div>
    </div>
@endsection