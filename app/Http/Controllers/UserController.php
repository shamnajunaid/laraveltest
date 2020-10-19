<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use DB;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class UserController extends Controller
{
    use AuthenticatesUsers;
	public $successStatus = 200;
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email|unique:users', 
             'surname'=> 'required',  
            'what_mob'=> 'required',
            'village'=> 'required',
            'taluk'=> 'required',
            'dist'=> 'required',
            'state'=> 'required',
            'country'=> 'required',
            'address'=> 'required',
            'pin'=> 'required|numeric',
            'adar'=> 'required',
            'telg_mob'=> 'required|numeric',
            'mob'=> 'required|numeric',
            'phone'=> 'required|numeric',
            'relation'=> 'required',
             'relative_name'=> 'required',
             'password' => 'sometimes|string|min:6|confirmed', 
        ]);
if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
$input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input);
        if($user) {
          $user->sendEmailVerificationNotification();  
        }
        $success['token'] =  $user->createToken('HGdfirtritjsjdfsd')-> accessToken; 
        $success['name'] =  $user->name;
return response()->json(['success'=>$success], $this-> successStatus); 
    }
        public function login(){ 
        
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            
            $success['token'] =  $user->createToken('HGdfirtritjsjdfsd')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
    public function country_list(){
    	$country = DB::table('countries')->get();
         return response()->json(['success' => $country], $this-> successStatus); 
    }
    public function state_list(Request $request){
       
        $states = DB::table('states')->where('country_id',request('country_id'))->get();
         return response()->json(['success' => $states], $this-> successStatus); 
    }
    public function city_list(Request $request){
      
        $cities = DB::table('cities')->where('state_id',request('state_id'))->get();
         return response()->json(['success' => $cities], $this-> successStatus); 
    }

}
