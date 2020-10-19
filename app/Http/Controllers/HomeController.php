<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;  
use Illuminate\Support\Facades\Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    { 
         $user = Auth::user();
         $countries = DB::table('countries')->get();
         $states = DB::table('states')->where('country_id',$user->country)->get();
          $cities = DB::table('cities')->where('state_id',$user->state)->get();
        return view('edit',compact('user','countries','states','cities'));
    }
        public function update(Request $request){
              $id=Auth::user()->id;
            if(empty($request['password'])){
                unset($request['password']);
            }
            else{
                $this->validate($request, [
                  
                    'password' => [ 'sometimes','string', 'min:8'],
                ]);
                $request['password'] = Hash::make($request['password']);
            }
            $user =  $request->all();
           if($user['email']!=Auth::user()->email){
                $this->validate($request, [
                  
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id]
                ]);
            }
            User::find($id)->update($user);
                return redirect()->back();
    }
}
