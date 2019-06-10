<?php

namespace mygotask\Http\Controllers\Biz;

use mygotask\Refferal;
use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mygotask\SocialMedia;
use mygotask\State;
use mygotask\User;
use Intervention\Image\Facades\Image;
use Session;
class ProfileController extends Controller
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

    public function profile()
    {

        Session::put('description','Profile,Account,Customer,Management,business');
        $social = SocialMedia::where('user_id', Auth::user()->id)->get();
        $referral = Refferal::where('user_id', Auth::user()->id)->get();
        $state = State::all();
        return view('Biz.profile')
            ->with('social', $social)
            ->with('referral', $referral)
            ->with('state', $state);
    }

    public function Update(Request $request)
    {
        $validate = $this->validate($request, [
            'image' => 'required|image|max:2048'
        ]);
        if ($validate == false) {
            $image = "Image field is required and Maximum upload should be 2MB";
            return redirect()->route('biz.profile')
                ->with('image', $image);
        }
        if ($request->hasFile('image')) {
            $originalImage = $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $originalPath = public_path() . '/uploads/';
//            $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
            $thumbnailImage->resize(150, 150);
            $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
            $name = $request['name'];
            $email = $request['email'];
            $business = $request['business'];
            $business_type = $request['business_type'];
            $phone = $request['phone'];
            $state = $request['state'];
            $local_govt = $request['local_govt'];
            $address = $request['address'];
            $dob = $request['dob'];
            $user = User::find(Auth::user()->id);
            $user->name = $name;
            $user->email = $email;
            $user->business = $business;
            $user->business_type = $business_type;
            $user->phone = $phone;
            $user->state = $state;
            $user->local_govt = $local_govt;
            $user->address = $address;
            $user->dob = $dob;
            $user->image = time() . $originalImage->getClientOriginalName();
            if ($user->save()) {
                $prof_success = "Profile Updated Successfully";
                return redirect()->back()->with('prof_success', $prof_success);
            } else {
                $prof_error = "Profile Updated Not Successfully";
                return redirect()->back()->with('prof_error', $prof_error);

            }
        } else {
            $image = "Image field is required and Maximum upload should be 2MB";
            return redirect()->route('biz.profile')
                ->with('image', $image);
        }


    }

    public function social_update(Request $request)
    {
        $social = SocialMedia::where('user_id', Auth::user()->id)->first();
        if (count($social) > 0) {
            $social->facebook = $request['facebook'];
            $social->instagram = $request['instagram'];
            $social->twitter = $request['twitter'];
            $social->linkedin = $request['linkedin'];
            if ($social->save()) {
                $social_success = "Profile Updated Successfully";
                return redirect()->back()->with('social_success', $social_success);
            } else {
                $social_error = "Profile Updated Not Successfully";
                return redirect()->back()->with('social_erro', $social_error);
            }
        } else {
            $social_2 = new SocialMedia();
            $social_2->facebook = $request['facebook'];
            $social_2->instagram = $request['instagram'];
            $social_2->twitter = $request['twitter'];
            $social_2->linkedin = $request['linkedin'];
            $social_2->user_id = Auth::user()->id;
            if ($social_2->save()) {
                $social_success = "Profile Updated Successfully";
                return redirect()->back()->with('social_success', $social_success);
            } else {
                $social_error = "Profile Updated Not Successfully";
                return redirect()->back()->with('social_erro', $social_error);
            }
        }
    }

    public function about_update(Request $request)
    {


            $about = User::find(Auth::user()->id);
            $about->about_us = $request['about_us'];
            if ($about->save()) {
                $about_success = "About Us Successfully Updated";
                return redirect()->back()->with('about_success', $about_success);
            } else {
                $about_error = "About Us not Successfully Updated";
                return redirect()->back()->with('about_error', $about_error);
            }


    }

}
