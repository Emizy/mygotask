<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use mygotask\BusinessDirectory;
use mygotask\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mygotask\Products;
use Session;

class AccountController extends Controller
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
    public function account()
    {
        $customer = BusinessDirectory::where('user_id',Auth::user()->id)->get();
        $total_sales = Products::where('user_id',Auth::user()->id)->get();
        return view('Biz.account')
            ->with('customer',$customer)
            ->with('total_sales',$total_sales);
    }

    public function profile(){
        return view('Biz.profile');
    }
}
