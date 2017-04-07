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

	public function dashboard(){
		if(Auth::check()){
			if(Auth::user()->level==1){
				return StudentController::student();
			}
			
		}
		else{
			return Redirect::route('home');
		}
		
	}


	
}
