<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use App\Admin;
use App\Dealer;
use Session;
class ScanController extends Controller
{
	public function initiate(){
		//$result = shell_exec("python " . app_path(). "\http\controllers\scan\pcal.py ");
		//dd($result);
	}
	public function question(){
		//session()->forget('question_id');
		$action="Questions";
		$last = Question::max('id');
		if(session('question_id')){
			$id = session('question_id');
			if($id == $last){
				return Redirect::route('result');
			}
			$que = Question::find($id);
			$question_id = Question::where('id','>',$que->id)->min('id');
			$question = Question::find($question_id);
			//dd($question);
			session(['question_id'=>$question_id]);
		}
		else{
			$question = Question::first();
			session(['question_id'=>$question->id]);
		}
		return View::make('question',compact('action','question'));
	}
	public function result(){
		session()->forget('question_id');
		$action="Questions";
		return View::make('result',compact('action'));
	}
}
