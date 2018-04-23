<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Question;
use App\Answer;
use App\Response;

class SurveyController extends Controller
{
    public function index() {

      return view('welcome');
    }

    public function get_question(Question $question = null) {

      $question = !isset($question) ? Question::find(1) : $question;

      $answers = [];

      if ($question->type == "select") {

        $answers = Answer::where('question_id', $question->id)->get()->pluck('answer', 'id');

      }

      $json = [
      	'action'          => 'next_question',
       	'result'          => '',
       	'save'            => '',
       	'id'              => $question->id,
       	'question'        => $question->question,
       	'type'            => $question->type,
       	'answers'         => $answers,
      ];

      return response()->json($json);

    }

    public function get_saved_response(Request $request) {

    }

    public function save_answer(Request $request) {

    }

    public function update_answer(Request $request, Response $response) {

    }

}

//
// {
// 	'action': 'submit_answer',
// 	'question_id': 5,
// 	'value': 'This is a test',
// }
//
//
// {
// 	'action': 'next_question',
// 	'result': 'success',
// 	'save': 'a76ad8b1',
// 	'id': 6,
// 	'question': 'This is the question',
// 	'type': 'select',
// 	'answers': ['Yes', 'No'],
// }
//
// {
// 	'action': 'update_answeer',
// 	'question_id': 5,
// 	'save_id': 5,
// 	'value': 'This is an update'
// }
//
// $question_ids = {
// 	'5': 5,
// 	'6': null,
// }
