<?php

namespace mygotask\Http\Controllers\Admin;

use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use Auth;
use Route;
class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('Admin.login');
    }

    public function login(Request $request)
    {

    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
}
