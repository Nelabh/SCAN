<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use App\User;
use App\UserDetails;
class DashboardController extends Controller
{
	public function index(){
				$action = "Dashboard";

		if(Auth::check()){
			if(Auth::user()->role < 2){
				return View::make('dashboard_student', compact('action'));
			}
			else{
				$students = User::where('role','1')->get();
				foreach ($students as $stu) {
					$student_detail = UserDetails::where('user_id',$stu->id)->first();
					$stu->father = $student_detail->father;
					$stu->address = $student_detail->address;
					$stu->contact = $student_detail->contact;
				}
				return View::make('dashboard_teacher', compact('action','students'));
			}
		}
	}
}
