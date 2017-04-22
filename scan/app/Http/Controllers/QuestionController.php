<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use View;
use App\Question;
use App\Domain;

use Redirect;   
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()&&Auth::user()->role >=2){
            $action = 'Questions';
            $questions = Question::all();
            $domain = Domain::all();
            return View::make('questions',compact('action','questions','domain'));
        }
        else{
                return Redirect::route('dashboard')->with('failure',"Access Denied");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $question = new Question;
        $question->question = $data['question'];
        $question->a = $data['a'];
        $question->b = $data['b'];
        $question->c = $data['c'];
        $question->d = $data['d'];
        $question->correct = $data['correct'];
        $question->domain_id = $data['domain_id'];
        $question->added_by =Auth::user()->id;

        if($question->save()){
            return Redirect::route('questions.index')->with('success',"Question Successfully Added");
        }
        else{
            return Redirect::route('questions.index')->with('failure',"Unable To Add Question. Please Try Again Later");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function delete_questions($id){
        $question = Question::find($id);
        if($question->delete()){
            return Redirect::route('questions.index')->with('success','Question Successfully Deleted');
        }
        else{
            return Redirect::route('questions.index')->with('success','Unable To Delete Question. Please Try Again');
        }
    }
}
