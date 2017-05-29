<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Domain;
use App\Admin;
use App\Dealer;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use Session;
class ScanController extends Controller
{
	public function initiate(){
		$result = shell_exec("python " . app_path(). "\http\controllers\scan\probability.py");
		dd($result);
	}
	public function startState(){
		return 'b';
	}
	public function evaluate(Request $request){
		$id = session('question_id');
		$domain_id = session('domain_id');
		$attempts = session('attempts')+1;
		$answer = $request->get('ans');
		$question = Question::where('id',session('question_id'))->first();
		if(!strcmp($answer,$question->correct)){
			$domain_id += 1;
			if($domain_id == 6){
				session(['domain_id'=>$domain_id]);
				return Redirect::route('result');
			}
			if($attempts >= 6){
				session(['domain_id'=>$domain_id]);
				return Redirect::route('result');
			}	
		}
		else{
			$domain_id -= 1;
		}
		$question = Question::where('domain_id',$domain_id)->where('active',0)->first();
		if(!$question){
			$ques = Question::where('domain_id',$domain_id)->get();
			foreach ($ques as $q) {
				$q->active = 0;
				$q->save();
			}
			$question = $ques[0];
		}
		session(['question_id'=>$question->id]);
		session(['domain_id'=>$domain_id]);
		session(['attempts'=>$attempts]);
		if($domain_id == 6){
				session(['domain_id'=>$domain_id]);
				return Redirect::route('result');
			}
			if($attempts >= 6){
				session(['domain_id'=>$domain_id]);
				return Redirect::route('result');
			}	
		return Redirect::route('question');
	}

	public function question(){
		//session()->forget('question_id');
		//$attempts = session('attempts')+1;
		$action="Questions";
		if(session('question_id')){
			$id = session('question_id');
			$domain_id = session('domain_id');
			$question = Question::find($id);
			session(['question_id'=>$question->id]);
			session(['domain_id'=>$domain_id]);
			//session(['attempts'=>$attempts+1]);
		}
		else{
			$attempts = 0;
			$start_state = self::startState();
			$domain_id = Domain::where('domain',$start_state)->first()->id;
			$question = Question::where('domain_id',$domain_id)->where('active',0)->first();
			if(!$question){
				$ques = Question::where('domain_id',$domain_id)->get();
				foreach ($ques as $q) {
					$q->active = 0;
					$q->save();
				}
				$question = $ques[0];
			}
			session(['attempts'=>$attempts]);
			session(['question_id'=>$question->id]);
			session(['domain_id'=>$domain_id]);
		}
		$question->active = 1;
		$question->save();
		return View::make('question',compact('action','question'));
	}
	public function result(){
		$domain_id = session('domain_id');
		session()->forget('question_id');
		session()->forget('domain_id');
		session()->forget('attempts');
		$action="Result";
		$domain = Domain::all();
		return View::make('result',compact('action','domain','domain_id'));
	}
}
