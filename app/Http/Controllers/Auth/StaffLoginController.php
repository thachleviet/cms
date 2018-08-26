<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Support\Facades\Validator;
use Modules\Staff\Models\StaffTable;


class StaffLoginController extends Controller
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
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm(){
        return view('auth.staff-login');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ],[
            'email.required'=>"Email bắt buộc .",
            'email.email' => "Email không đúng định dạng .",
            'password.required' => "Mật khẩu bắt buộc ."
        ]);
        if ($validator->fails()) {
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput();
        }

        if(\Auth::guard('admin')->attempt(['staff_email'=>$request->email,'password'=>trim($request->password)], $request->remember)){
            session()->flash('message_login', "Ok") ;
            return redirect()->intended(route('admin'));
        }else{
            session()->flash('message_login', "CCCCCCCCCCC") ;
        }

        return redirect()->back()->withInput($request->only('email', 'remember')) ;
    }
    public function logout()
    {

        \Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
