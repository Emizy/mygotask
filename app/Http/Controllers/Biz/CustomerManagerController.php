<?php

namespace mygotask\Http\Controllers\Biz;

use Illuminate\Http\Request;
use mygotask\BusinessDirectory;
use mygotask\CustomerOccupation;
use mygotask\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use mygotask\Products;
use mygotask\State;
use mygotask\User;
use phpDocumentor\Reflection\Types\Array_;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CustomerManagerController extends Controller
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
//start of code for customer page
    public function customer()
    {
        $user = BusinessDirectory::where('user_id', Auth::user()->id)
            ->where('deletion_status', 'NO')->get();
        $count = Carbon::today();
        $birthday = Str::substr($count, 5, 5);
        $occupation = CustomerOccupation::where('user_id', Auth::user()->id)->get();
        $state = State::all();
        if (count($user) > 0) {
            return view('Biz.customermanager')
                ->with('user', $user)
                ->with('occupation', $occupation)
                ->with('state', $state)
                ->with('birthday', $birthday);
        } else {
            $error_msg = "Customer Records Empty";
            $occupation = CustomerOccupation::where('user_id', Auth::user()->id)->get();
            $state = State::all();
            return view('Biz.customermanager')
                ->with('error_msg', $error_msg)
                ->with('occupation', $occupation)
                ->with('state', $state);
        }
    }

    public function ShowCustomerForm()
    {
        $state = State::all();
        $occupation = CustomerOccupation::where('user_id', Auth::user()->id)->get();
        return view('Biz.showcustomerform')
            ->with('state', $state)
            ->with('occupation', $occupation);
    }

//start of code for business directory
    public function SaveCustomer(Request $request)
    {
        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'state' => 'required',
            'local_govt' => 'required',
            'occupation' => 'required'
        ]);
        if ($validate == false) {
            Session::flash('form_error', 'Customer Successfully Added');
            return redirect()->back();
        }
        $availability = BusinessDirectory::where('user_id', Auth::user()->id)
            ->where('email', $request['email'])
            ->where('phone', $request['phone'])->get();
        if (count($availability) == 0) {
            $customer = new BusinessDirectory();
            $customer->name = $request['name'];
            $customer->email = $request['email'];
            $customer->phone = $request['phone'];
            $customer->state = $request['state'];
            $customer->local_govt = $request['local_govt'];
            $customer->dob = $request['dob'];
            $customer->total_visit = 1;
            $customer->occupation = $request['occupation'];
            $customer->deletion_status = "NO";
            $customer->user_id = Auth::user()->id;
            $customer->save();
            Session::flash('form_success', 'Customer Successfully Added');
            return redirect()->route('biz.manage.customer');
        }
    }

    public function UpdateCustomer(Request $request)
    {
        $show = BusinessDirectory::where('id', $request['user_id'])
            ->where('user_id', Auth::user()->id)->first();
        $validate = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'dob' => 'required',
            'state' => 'required',
            'local_govt' => 'required',
            'occupation' => 'required',
        ]);
        if ($validate == false) {
            Session::flash('add_error', 'All fields are Required or Enter validate Email');
            return redirect()->back();
        }
        $show->name = $request['name'];
        $show->email = $request['email'];
        $show->phone = $request['phone'];
        $show->state = $request['state'];
        $show->local_govt = $request['local_govt'];
        $show->dob = $request['dob'];
        $show->occupation = $request['occupation'];
        $show->save();
        Session::flash('add_success', 'Record Successfully Updated');
        return redirect()->back();

    }

    public function DeleteCustomer(Request $request)
    {
        $del = BusinessDirectory::where('id', $request['user_id'])
            ->where('user_id', Auth::user()->id)->first();
        $del->deletion_status = 'YES';
        $del->save();
        Session::flash('Deletion_status', 'Customer Successfully deleted');
        return redirect()->back();
    }

    //start of code for occupation
    public function ShowForm()
    {
        if (count(CustomerOccupation::where('user_id', Auth::user()->id)->get()) > 0) {
            $user = CustomerOccupation::where('user_id', Auth::user()->id)->get();
            return view('Biz.occupation')
                ->with('user', $user);
        } else {
            return view('Biz.occupation');
        }


    }

    public function UpdateForm(Request $request)
    {
        $oc = CustomerOccupation::where('user_id', Auth::user()->id)
            ->where('id', $request['id'])->first();
        $oc->occupation = $request['occupation'];
        $oc->save();
        Session::flash('occ_success', 'Record Successfuly Updated');
        return redirect()->back();
    }

    public function SaveForm(Request $request)
    {
        if (count(CustomerOccupation::where('user_id', Auth::user()->id)
                ->where('occupation', $request['occupation'])->get()) == 0) {
            $oc = new CustomerOccupation();
            $oc->occupation = $request['occupation'];
            $oc->user_id = Auth::user()->id;
            $oc->save();
            Session::flash('occ_success', 'Record Successfuly Added');
            return redirect()->back();
        } else {
            Session::flash('occ_success', 'Record Already Exists');
            return redirect()->back();
        }

    }
    //end of code for occupation

    //code for daily entries
    public function ShowEntries()
    {
        $user = Products::where('user_id', Auth::user()->id)
            ->where('deletion_status', 'NO')->
            whereDate('created_at', Carbon::today())->get();
        $customer = BusinessDirectory::where('user_id', Auth::user()->id)->get();
        return view('Biz.dailyentries')
            ->with('user', $user)
            ->with('customer', $customer);
    }

    public function SaveEntries(Request $request)
    {
        $prod = new Products();
        $prod->name = $request['name'];
        $prod->price = $request['price'];
        $prod->quantity = $request['quantity'];
        $prod->user_id = Auth::user()->id;
        $prod->businessdirectory_id = $request['customer_id'];
        $total = BusinessDirectory::where('id', $request['customer_id'])
            ->first();
        $total->total_visit = $total->total_visit + 1;
        $total->save();
        $prod->save();
        Session::flash('success', 'Customers Successfully Added');
        return redirect()->back();
    }

    public function SaveUpdate(Request $request)
    {
        $total = BusinessDirectory::where('id', $request['cust_id'])
            ->first();
        $total->total_visit = $total->total_visit - 1;
        $total->save();
        $prod = Products::where('user_id', Auth::user()->id)
            ->where('id', $request['id'])
            ->first();
        $prod->name = $request['name'];
        $prod->price = $request['price'];
        $prod->quantity = $request['quantity'];
        $prod->user_id = Auth::user()->id;
        $prod->businessdirectory_id = $request['customer_id'];
        $total_2 = BusinessDirectory::where('id', $request['customer_id'])
            ->first();
        $total_2->total_visit = $total_2->total_visit + 1;
        $total_2->save();
        $prod->save();
        Session::flash('success', 'Customers Successfully Updated');
        return redirect()->back();
    }

    public function DeleteUpdate(Request $request)
    {
        $del = Products::where('id', $request['id'])
            ->where('businessdirectory_id', $request['cust_id'])
            ->where('user_id', Auth::user()->id)->first();
        $del->deletion_status = 'YES';

        $del->save();
        Session::flash('Deletion_status', 'Products Successfully deleted');
        return redirect()->back();
    }



}
