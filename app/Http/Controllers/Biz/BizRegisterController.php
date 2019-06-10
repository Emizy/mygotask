<?php

namespace mygotask\Http\Controllers\Biz;

use Keygen;
use mygotask\User;
use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use mygotask\Mail\activate;
use Mail;
use Session;

class BizRegisterController extends Controller
{
    private $mail;

    /**
     * Create a constructor for the guard
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');


    }

    protected function generateCode()
    {
        return Keygen::bytes()->generate(
            function ($key) {
                // Generate a random numeric key
                $random = Keygen::numeric()->generate();

                // Manipulate the random bytes with the numeric key
                return substr(md5($key . $random . strrev($key)), mt_rand(0, 8), 20);
            },
//            function ($key) {
//                // Add a (-) after every fourth character in the key
//                return join('-', str_split($key, 4));
//            },
            'strtlower'
        );
    }

    public function showRegForm()
    {
        Session::put('description', 'Register,Sign-up,Registration,Customer,Management,business');

        return view('Biz.register');
    }

    public function register(Request $request)
    {

        Session::put('description', 'Register,Sign-up,Registration,Customer,Management,business');

        $validate = $this->validate($request, [
            'business' => 'required|unique:users|min:5',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:4'
        ]);

        if ($validate == false) {
            Session::flash('error', 'All  fields are required');
            return redirect()->back();
        }
        $count = User::where('business', $request['business'])->count();
        if ($count == 1) {
            dd('ddfg');
            Session::flash('error', 'Business Name Already Exist');
            return redirect()->back();
        }

        //Binding data to table name
        $user = new User();
        $user->business = $request['business'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->con_password = $request['password'];
        $code = $this->generateCode();
        $user->activate_token = $code;
        if ($user->save()) {
            $content = [
                'code' => $code,
                'name' => $request['name'],
                'email' => $request['email'],
            ];
            try {
                $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                $beautymail->send('emails.activateaccount', ['content' => $content], function ($message) use ($content) {

                    $message
                        ->from('nevogold.official@gmail.com')
                        ->to($content['email'])
                        ->subject('Account Activation');
                });

                Session::flash('success', 'Registration
                        successfull,Account Confirmation link has been sent to your Mail,You can check your Spam if not
                        inside Inbox!');
                return redirect()->back();
            } catch (\Exception $e) {
                Session::flash('success', 'Registration
                        successfull,Account Confirmation link has been sent to your Mail,You can check your Spam if not
                        inside Inbox!');
                return redirect()->back();
            }

        } else {
            Session::flash('error', 'Email and Password does not match any data,Kindly re-enter your details');
            return redirect()->back();
        }
    }
}
