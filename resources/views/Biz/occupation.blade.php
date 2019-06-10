@extends('layouts.biz_dash')
@section('title')
    <title>{{ Auth::user()->business }} || Customer Occupations </title>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">

            <div class="card shadow">
                @if(Auth::user()->account_status == 'COMPLETED')
                    <div class="card-header">
                        <h2 class="mb-0">
                            <a href="" class="btn btn-success" data-toggle="modal" data-target="#modal-default"
                               style="margin-left: 50%"><i class="fe fe-plus-circle"></i> ADD CUSTOMERS OCCUPATION</a>
                        </h2>
                    </div>
                    <div class="modal fade" id="modal-default" tabindex="-1"
                         role="dialog"
                         aria-labelledby="modal-default" aria-hidden="true">
                        <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h2 class="modal-title" id="modal-title-default"><i class="fe fe-plus-circle"></i>
                                        ADD
                                        OCCUPATION
                                    </h2>
                                    <a class="close" data-dismiss="modal"
                                       aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    <form method="post"
                                          action="{{ route('biz.manage.occupation.save') }}">
                                        <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        <div class="form-group">
                                            <label class="form-label" for="occupation">Enter Occupation</label>
                                            <input type="text" class="form-control" id="occupation"
                                                   name="occupation"
                                                   placeholder="Enter the occupation">
                                        </div>
                                        <input type="submit" class="btn btn-primary" value="Save">
                                        <button type="button" class="btn btn-link  ml-auto"
                                                data-dismiss="modal">Close
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(Session::has('occ_success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="fe fe-bell"></i></span>
                                <span class="alert-inner--text"><strong>Info!</strong> {{ Session::get('occ_success') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        @if(isset($user))
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered w-100 text-nowrap">
                                    <thead>
                                    <tr>
                                        <th class="wd-15p">Occupation</th>
                                        <th class="wd-25p"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user as $users)
                                        <tr>
                                            <td>{{ $users->occupation }}</td>
                                            <td>
                                                <a data-toggle="modal" data-target="#modal-default_{{ $users->id }}"
                                                   href=""
                                                   class="btn btn-primary btn-sm" type="button"><span
                                                            class="fe fe-edit"></span>Edit</a>
                                                <a href="/manage/delete/{{ $users->id }}" class="btn btn-danger btn-sm"
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
                                                        <h2 class="modal-title" id="modal-title-default">Edit Occupation
                                                        </h2>
                                                        <a class="close" data-dismiss="modal"
                                                           aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </a>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="post"
                                                              action="{{ route('biz.manage.occupation.update') }}">
                                                            <input type="hidden" name="_token"
                                                                   value="{{ Session::token() }}">
                                                            <input type="hidden" name="id" value="{{ $users->id }}">
                                                            <div class="form-group">
                                                                <label class="form-label" for="occupation">Enter
                                                                    Occupation</label>
                                                                <input type="text" class="form-control" id="occupation"
                                                                       name="occupation"
                                                                       placeholder="Enter the occupation"
                                                                       value="{{ $users->occupation }}">
                                                            </div>
                                                            <input type="submit" class="btn btn-primary" value="Save">
                                                            <button type="button" class="btn btn-link  ml-auto"
                                                                    data-dismiss="modal">Close
                                                            </button>
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
                    </div>

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
@endsection