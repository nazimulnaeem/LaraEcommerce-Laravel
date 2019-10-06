<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Auth;
use App\Models\Division;
use App\Models\District;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard(){
        $user = Auth::user();
        return view('frontend.pages.users.dashboard',compact('user'));
    }

    public function profile(){

        $divisions = Division::orderBy('priority','asc')->get();
        $districts = District::orderBy('name','asc')->get();

        $user = Auth::user();
        return view('frontend.pages.users.profile',compact('user','divisions','districts'));
    }

    public function profileUpdate(Request $request){

        $user = Auth::user();
        $this->validate($request,[
            'first_name' => 'required|string|max:40',
            'last_name' => 'required|string|max:20',
            'division_id' => 'required|numeric',
            'district_id' => 'required|numeric',
            'phone' => 'required|max:15',
            'street_address' => 'required|max:100',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->street_address = $request->street_address;
        $user->shipping_address = $request->shipping_address;
        if($request->password !=NULL || $request->password != ''){
            $request->password = Hash::make($request->password);
        }
        $user->ip_address = $request->ip();
        $user->save();

        session()->flash('success','Profile update successfully !!');
        return redirect()->back();
    }

}
