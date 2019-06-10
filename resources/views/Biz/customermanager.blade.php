@extends('layouts.biz_dash')
@section('title')
    <title>{{ Auth::user()->business }} || Customer Management </title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-header">
                    <h2 class="mb-0">Data Table</h2>
                </div>
                <div class="card-body">
                    @if(Auth::user()->account_status == 'COMPLETED')
                        @if(Session::has('email_success'))
                            <div class="alert alert-info" role="alert">
                                <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                <span class="alert-inner--text"><strong>Success!</strong> {{ Session::get('email_success') }}</span>
                            </div>
                        @endif
                            @if(Session::has('Deletion_status'))
                                <div class="alert alert-info" role="alert">
                                    <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                    <span class="alert-inner--text"><strong>Success!</strong> {{ Session::get('Deletion_status') }}</span>
                                </div>
                            @endif
                        @if(isset($user))
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">Name</th>
                                        <th class="wd-15p">Email</th>
                                        <th class="wd-20p">Phone</th>
                                        <th class="wd-25p">D-O-B</th>
                                        <th class="wd-15p">State</th>
                                        <th class="wd-10p">Local-Government</th>
                                        <th class="wd-25p">Occupation</th>
                                        <th class="wd-25p">Total Visits</th>
                                        <th class="wd-25p">Date Visited</th>
                                        <th class="wd-25p"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $users)
                                        <tr>
                                            <td>{{ $users->name }}</td>
                                            <td>{{ $users->email }}</td>
                                            <td>{{ $users->phone }}</td>
                                            @if(\Illuminate\Support\Str::substr($users->dob, 5, 5) == $birthday)
                                                <td style="color: green"><i class="pe pe-7s-volume"
                                                                            style="font-size: 20px;font-weight: bolder"></i> {{ $users->dob }}
                                                </td>
                                            @else
                                                <td>{{ $users->dob }} </td>
                                            @endif
                                            <td>{{ $users->state }}</td>
                                            <td>{{ $users->local_govt }}</td>
                                            <td>{{ $users->occupation }}</td>
                                            <td>{{ $users->total_visit }}</td>
                                            <td>{{ $users->created_at }}</td>
                                            <td>
                                                <a href="" data-toggle="modal" data-target="#birthday_{{ $users->id }}"
                                                   class="btn btn-sm btn-success"
                                                   type="button"><span class="fe fe-mail"></span>Send Mail</a>
                                                <a data-toggle="modal" data-target="#modal-default_{{ $users->id }}"
                                                   href=""
                                                   class="btn btn-primary btn-sm" type="button"><span
                                                            class="fe fe-edit"></span>Edit</a>

                                                <a class="btn btn-sm btn-danger"
                                                   type="button" data-toggle="modal"
                                                   data-target="#modal-delete_{{ $users->id }}"><span
                                                            class="fe fe-trash"></span>Delete</a>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="birthday_{{ $users->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="modal-default" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                 role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modal-title-default">Edit Details
                                                            title</h2>
                                                        <a class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('biz.manage.birthday') }}">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ Session::token() }}">
                                                            <input type="hidden" value="{{ $users->name }}"
                                                                   name="name">
                                                            <input type="hidden" value="{{ $users->email }}"
                                                                   name="email">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Customer
                                                                    Email</label>
                                                                <input type="text" class="form-control" id="email"
                                                                       name="email"
                                                                       placeholder="{{ $users->email }}"
                                                                       value="{{ $users->email }}" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Email Type</label>
                                                                <select name="type" class="form-control">
                                                                    <option value="birthday">Birthday</option>
                                                                    <option value="greetings">Greetings</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="template">Email
                                                                    Template</label>
                                                                <select name="template" class="form-control">
                                                                    <option value="birthday_basic"> Birthday Basic
                                                                    </option>
                                                                    <option value="birthday_classic"> Birthday Classic
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <textarea class="form-control"
                                                                          id="message" name="message" rows="3"
                                                                          placeholder="Enter Greeting"
                                                                          value=""></textarea>
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
                                        <div class="modal fade" id="modal-default_{{ $users->id }}" tabindex="-1"
                                             role="dialog"
                                             aria-labelledby="modal-default" aria-hidden="true">
                                            <div class="modal-dialog modal- modal-dialog-centered modal-"
                                                 role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="modal-title-default">Edit Details
                                                            title</h2>
                                                        <a class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('biz.manage.update') }}">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ Session::token() }}">
                                                            <input type="hidden" value="{{ $users->id }}"
                                                                   name="user_id">
                                                            <div class="form-group">
                                                                <label class="form-label" for="name">Enter Name</label>
                                                                <input type="text" class="form-control" id="name"
                                                                       name="name"
                                                                       placeholder="{{ $users->name }}"
                                                                       value="{{ $users->name }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Enter
                                                                    Email</label>
                                                                <input type="text" class="form-control" id="email"
                                                                       name="email"
                                                                       placeholder="Enter Email"
                                                                       value="{{ $users->email }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Enter
                                                                    Phone</label>
                                                                <input type="text" class="form-control" id="phone"
                                                                       name="phone"
                                                                       placeholder="Enter Your Phone"
                                                                       value="{{ $users->phone }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="dob">Date-Of-Birth</label>
                                                                <input type="date" class="form-control" id="dob"
                                                                       name="dob"
                                                                       placeholder="Enter Your Date-Of-Birth"
                                                                       value="{{ $users->dob }}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="state">Enter
                                                                    State</label>
                                                                <select id="state" name="state" class="form-control">
                                                                    <option value="{{ $users->state }}">
                                                                        ----Change {{ $users->state }}---
                                                                    </option>
                                                                    @foreach($state as $st)
                                                                        <option value="{{ $st->state }}">{{ $st->state }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label" for="local_govt">Enter
                                                                    Local_Govt</label>
                                                                <input type="text" class="form-control" id="local_govt"
                                                                       name="local_govt"
                                                                       value="{{ $users->local_govt }}"
                                                                       placeholder="Enter Local Government">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="form-label"
                                                                       for="product">Occupation</label>
                                                                <select id="state" name="occupation"
                                                                        class="form-control">
                                                                    <option value="{{ $users->occupation }}">--
                                                                        Change {{ $users->occupation }}--
                                                                    </option>
                                                                    @foreach($occupation as $oc)
                                                                        <option value="{{ $oc->occupation }}">{{ $oc->occupation }}</option>
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
                                                        <h2 class="modal-title" id="modal-title-default">Are You
                                                            Sure</h2>
                                                        <a class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('biz.manage.delete') }}">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ Session::token() }}">
                                                            <input type="hidden" value="{{ $users->id }}"
                                                                   name="user_id">
                                                            <div class="row">
                                                                <div class="col-md-6 col-lg-offset-6">
                                                                    <input type="submit" class="btn btn-primary"
                                                                           value="Save">
                                                                    <a class="btn btn-link  ml-auto"
                                                                       data-dismiss="modal">Close
                                                                    </a>
                                                                </div>
                                                            </div>
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