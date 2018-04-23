<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;

class AnswerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index() {

      $answers = Answer::all();

      return view('answers.index', compact('answers'));

    }

    public function add() {

        $answer = new Answer;
        $questions = Question::where('type', 'Select')->get();
        $next_questions = Question::all();

        $questions->each(function($value) {
          $value->question = str_limit($value->question, 100);
        });
        $next_questions->each(function($value) {
          $value->question = str_limit($value->question, 100);
        });

        $questions = $questions->pluck('question', 'id');
        $next_questions = $next_questions->pluck('question', 'id');

        return view('answers.add', compact('answer', 'questions', 'next_questions'));

    }

    public function create(Request $request) {

        $answer = new Answer($request->all());

        $answer->save();

        return redirect()->route('answers::index');

    }

    public function edit(Answer $answer) {

        $questions = Question::where('type', 'Select')->get();
        $next_questions = Question::all();

        $questions->each(function($value) {
          $value->question = str_limit($value->question, 100);
        });
        $next_questions->each(function($value) {
          $value->question = str_limit($value->question, 100);
        });

        $questions = $questions->pluck('question', 'id');
        $next_questions = $next_questions->pluck('question', 'id');

      return view('answers.edit', compact('answer', 'questions', 'next_questions'));

    }

    public function update(Request $request, Answer $answer) {

      $answer->question_id = $request->question_id;
      $answer->answer = $request->answer;
      $answer->next = $request->next;
      $answer->save();

      return redirect()->route('answers::index');

    }
}
