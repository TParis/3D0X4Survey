<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;

class QuestionController extends Controller
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

      $questions = Question::all();

      return view('questions.index', compact('questions'));

    }

    public function add() {

        $question = new Question;

        return view('questions.add', compact('question'));

    }

    public function create(Request $request) {

        $question = new Question($request->all());

        $question->save();

        return redirect()->route('questions::index');

    }

    public function edit(Question $question) {

      return view('questions.edit', compact('question'));

    }

    public function update(Request $request, Question $question) {

      $question->question = $request->question;
      $question->type = $request->type;
      $question->next = $request->next;
      $question->save();

      return redirect()->route('questions::index');

    }
}
