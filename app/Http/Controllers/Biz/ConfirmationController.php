<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use Session;
use mygotask\User;

class ConfirmationController extends Controller
{
    public function confirm($email, $code)
    {

        Session::put('description', 'Confirmation,Email');
        $confirm = User::where('email', $email)
            ->where('activate_token', $code)->first();
        $confirm2 = User::where('email', $email)
            ->where('activate_token', $code)->get();

        if (count($confirm2) == 1) {
            if ($confirm->email_confirmation == 'NO') {
                $confirm->email_confirmation = 'YES';
                $confirm->save();
                Session::flash('confirm_1', 'Congratulation!!!,Email confirmation
                    sucessfull');
                return view('Biz.emailconfirmation');
            } else {
                Session::flash('confirm', 'Oops,Email Already Confirmed');
                Session::flash('img', 'think.png');
                return view('Biz.emailconfirmation');
            }
        } else {
            Session::flash('confirm', 'Whattt!!!!!,What are you looking for');
            Session::flash('img', 'sad.png');
            return view('Biz.emailconfirmation');
        }


    }
}
