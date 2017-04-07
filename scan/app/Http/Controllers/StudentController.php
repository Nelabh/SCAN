
<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use App\User;
use App\UserDetails;
use Session;
class StudentController extends BaseController
{
	public function student(){
		if(Auth::user() -> level == 5){
			$action = "Student";
			
			//dd($dealers);
			return View::make('student', compact('action','student'));
		}
		else{
			return Redirect::route('dashboard');
		}
	}


	
}
