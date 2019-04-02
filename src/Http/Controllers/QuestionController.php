<?php


namespace Devfaysal\Laraqa\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use Devfaysal\Laraqa\Models\Question;


class QuestionController 
{

    public function index()
    {

        $questions = Question::all();

        return view('laraqa::questions.index', [

            'questions' => $questions

        ]);

    }


    public function create()
    {

        return view('laraqa::questions.create');

    }


    public function store(Request $request)
    {

        $attributes = request()->validate([

            'name' => 'required|string',

            'email' => 'required|email',

            'body' => 'required'

        ]);

        Question::create($attributes);

        Session::flash('message', 'Question Asked Successfully!!'); 

        Session::flash('alert-class', 'alert-success');

        return redirect('/questions');

    }

}
