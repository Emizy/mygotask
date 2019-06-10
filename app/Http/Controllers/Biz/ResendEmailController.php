<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use mygotask\Http\Controllers\Controller;
use mygotask\Mail\Resendlink;
use mygotask\User;
use Illuminate\Support\Facades\Auth;
use Mail;

class ResendEmailController extends Controller
{
    /**
     * Create a constructor for the guard
     * @return void
     */
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show dashboard after successfull login
     *
     * @return \Illuminate\Http\Response
     */
    //code for emailresend
    public function ResendEmail()
    {
        $result = User::where('id', Auth::user()->id)->first();

        $content = [
            'email' => $result->email,
            'code' => $result->activate_token
        ];
        Mail::to($result->email)->send(new Resendlink($content));
        Session::flash('email_sent', 'Email Confirmation Link Sent');
        return redirect()->back();
    }
}
