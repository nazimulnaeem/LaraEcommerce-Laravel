<?php

namespace App\Http\Controllers\Backend\admin;

use App\Models\Admin;
use Auth;
use Illuminate\Http\Request;
use App\Notifications\VerifyRegistration;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.admin.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // find user by this email
        $admin = Admin :: where('email',$request->email)->first();

            if(Auth :: guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){
                // Login Now
                return redirect()->intended(route('admin.index'));
            }else{
                
                session()->flash('sticky_error', 'Invalid Login');
                return redirect()->route('login');
            }
    }

    
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('admin.login');
    }


}
