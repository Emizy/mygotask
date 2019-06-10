<?php

namespace mygotask\Http\Controllers;

use Illuminate\Http\Request;
use mygotask\Contactus;
use Session;

class SendEmailController extends Controller
{
    public function sendmail(Request $request)
    {
        $email = $request->email;
        $subject = $request->subject;
        $name = $request->name;
        $message = $request->message;

        $content = [
            'email' => $email,
            'subject' => $subject,
            'name' => $name,
            'message' => $message,
        ];
        $variable = "Contact Us";
        try{
            Mail::to('adenitiree@gmail.com')->send(new Contact($content, $variable));
            $save = new ContactUs();
            $save->email = $email;
            $save->subject = $subject;
            $save->message = $message;
            $save->save();
            Session::flash('contact_success','Success');
            return redirect()->back();
        }
        catch(\Exception $e){
            Session::flash('contact_error','Error');
            return redirect()->back();
        }


    }

    public function BirthdayMail(Request $request)
    {

        $content = [
            'name' => $request['name'],
            'message' => $request['message'],
            'image' => public_path() . '/uploads/birthday_1.jpg',
        ];
        try {
            Mail::to($request['email'])->send(new Birthday($content));
            Session::flash('email_success', 'Email Send Successfully');
            return redirect()->route('biz.manage');
        } catch (\Exception $e) {
            Session::flash('email_success', 'Email Not Sent Successfully');
            return redirect()->route('biz.manage');
        }
    }
}
