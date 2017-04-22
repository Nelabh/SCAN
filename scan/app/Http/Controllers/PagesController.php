<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use App\User;
use App\UserDetails;
use Session;
use Hash;
class PagesController extends BaseController
{
	public function home(){
		if(Auth::check()){
			return Redirect::route('dashboard');
		}
		return View::make('home');
	}

	
	public function logout(){
		if(Auth::check()){
			Auth::logout();
			Session::forget('email');
		}
		return Redirect::route('login');
	}
	public function log(Request $request){
		$data = array('email'=>$request->get('email'),'password'=>$request->get('password'));
		//dd($data);
		$rules=array(
			'email' => 'required',
			'password' => 'required',
			);
		

		$validator = Validator::make($data, $rules);
		if($validator->fails()){
				//dd("yes;");
			return Redirect::back()->withErrors($validator->errors())->withInput();
		}
		else {

			if(Auth::attempt($data)){
				return Redirect::intended('dashboard')->with('success','Successfully Logged In');
			}
			else{
				return Redirect::route('login')->with('message','Your Customer Code / Password combination is incorrect!')->withInput();
			}

		}

		
	}
	public function register(){
		return View::make('register');
	}
	public function signup(){
		$data=Input::all();
		$user=new User;
		$user->name=$data['name'];
		$user->email=$data['email'];
		$user->password=Hash::make($data['password']);
		$user->role=$data['role'];
		$user->save();
		$ud=new UserDetails;
		$ud->address=$data['address'];
		$ud->contact=$data['contact'];
		$ud->father=$data['father'];
		$ud->user_id = $user->id;
		$ud->save();
		 return Redirect::route('dashboard')->with('message','Successfully registered!!');

		
	}
	public function profile(){
		$action="Edit Profile";
		$user=User::where('email',Auth::user()->email)->first();
		$user->father=UserDetails::where('user_id',$user->id)->first()->father;
		$user->contact=UserDetails::where('user_id',$user->id)->first()->contact;
		$user->address=UserDetails::where('user_id',$user->id)->first()->address;




		return View::make('profile',compact('user','action'));
	}
	public function editprofile(){
		$action="Edit Details";
		$data=Input::all();
		$user=User::where('email',Auth::user()->email)->first();
		$user->name=$data['name'];
		$user->email=$data['email'];
		
		
		$user->save();
		$ud=UserDetails::where('user_id',$user->id)->first();
		$ud->address=$data['address'];
		$ud->contact=$data['contact'];
		$ud->father=$data['father'];
		
		$ud->save();
		 return Redirect::route('dashboard')->with('message','Successfully Edited Profile!!');

	}
	public function studentprofile(){
		$action="Edit Profile";
		$user=User::where('email',Auth::user()->email)->first();
		$user->father=UserDetails::where('user_id',$user->id)->first()->father;
		$user->contact=UserDetails::where('user_id',$user->id)->first()->contact;
		$user->address=UserDetails::where('user_id',$user->id)->first()->address;




		return View::make('studentprofile',compact('user','action'));
	}
	
	public function editstudentprofile(){
		$action="Edit Details";
		$data=Input::all();
		$user=User::where('email',Auth::user()->email)->first();
		$user->name=$data['name'];
		$user->email=$data['email'];
		
		
		$user->save();
		$ud=UserDetails::where('user_id',$user->id)->first();
		$ud->address=$data['address'];
		$ud->contact=$data['contact'];
		$ud->father=$data['father'];
		
		$ud->save();
		 return Redirect::route('dashboard')->with('message','Successfully Edited Profile!!');

	}
	
	
}
