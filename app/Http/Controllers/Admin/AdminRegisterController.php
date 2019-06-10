<?php

namespace mygotask\Http\Controllers\Admin;

use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showRegForm(Request $request)
    {
        return view('Admin.register');
    }
}
