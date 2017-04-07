<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
class DashboardController extends Controller
{
	public function index(){
				$action = "Dashboard";

		if(Auth::check()){
			if(Auth::user()->role < 2){
				return View::make('dashboard_student', compact('action'));
			}
			else{
				return View::make('dashboard_teacher', compact('action'));
			}
		}
	}
}
