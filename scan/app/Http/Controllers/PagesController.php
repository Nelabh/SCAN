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
		return Redirect::route('home');
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
				return Redirect::route('home')->with('message','Your Customer Code / Password combination is incorrect!')->withInput();
			}

		}

		
	}
	public function signup(){
		$data=Input::all();
		$user=new User;
		$user->email=$data['email'];
		$user->password=Hash::make($data['password']);
		$user->role=$data['role'];
		$user->save();
		$ud=new UserDetails;
		$ud->address=$data['address'];
		$ud->contact=$data['contact'];
		$us->father=$data['father'];
		$us->save();
		 return Redirect::route('home')->with('message','Successfully registered!!')

		
	}
	
	
}
