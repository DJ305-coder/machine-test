<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;
use App\Models\User;
use App\Http\Requests\UserStoreRequest;
use Auth;
use Session;
use App\Mail\WelcomeMail;
class UserController extends Controller
{
    //

    public function index(){
        return view('auth.login');
    }

    public function create(){
        $countries = Country::get(["name", "id"]);
        return view('auth.register', compact('countries'));
    }

    public function getState(Request $request){
        $data['states'] = State::where("country_id", $request->country_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function getCity(Request $request){
        $data['cities'] = City::where("state_id", $request->state_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function email_exists(Request $request){
        if ($request->ajax()) {
            return User::where('email', $request->email)->first() ? 'false' : 'true';
        }
    }

    public function store(UserStoreRequest $request){
        $validated = $request->validated();
        $user = User::create($validated);       
        $data = ([
            'first_name' => $request->first_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        \Mail::to($user->email)->send(new WelcomeMail($data));
        return redirect('/')->with('message','User Register Successfully');
    }
    
    public function user_login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $user = User::where(['email' => $request->email, 'password' => md5($request->password)])->with(['country','state','city'])->first();
        if(!empty($user)){
            Session::put('user', $user->id);
            return redirect('dashboard')->with('message','User Login Successfully');
        }
        return back()->with('error','Credentials do not match our records.');
    }

    
    public function user_dashboard(Request $request){
        $id = $request->session()->get('user');
        $user = User::find($id)->with(['country','state','city'])->first();
        return view('dashboard', compact('user'));
    }
  
    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect('/')->with('success', 'Logout Successfully!');
    }

}
