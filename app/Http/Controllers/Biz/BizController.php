<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use mygotask\Http\Controllers\Controller;
use Session;
class BizController extends Controller
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
    public function index(Request $request){
        Session::put('description','I love diz auz so much');
        return view('Biz.home');
    }
}
