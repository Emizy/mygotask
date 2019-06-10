<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mygotask\User;
use Session;

class BizLoginController extends Controller
{
    /**
     * Create a constructor for the guard
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Biz.login');
    }

    public function login(Request $request)
    {
        $validate = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if ($validate == false) {
            Session::flash('error', 'All fields are required');
            return redirect()->back();
        }

        $email = $request['email'];
        $password = $request['password'];
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt(array('email' => $email, 'password' => $password), $remember_me)) {
            //if successfull then redirect to the intended view
            Session::put('email', $request['email']);
            $user = User::where('email', $email)->first();
            $id = $user->id;
            return redirect()->route('biz.index')->with('id', $id);
        } else {
            Session::flash('error', 'Email and Password does not match any data,Kindly re-enter your details');
            return redirect()->back();
        }
    }



    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('biz.login');
    }
}
