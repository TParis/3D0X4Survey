@extends('layouts.loggedin')

@section('title', 'Answer')

@section('content-in')

  <h2>Edit Answers</h2>
  <br />
  {{ Form::model($answer, ['route' => ['answers::update', $answer], 'method' => 'put']) }}
  <div class="row">
    <div class="col-2">{{ Form::label('question_id', 'Question') }}</div>
    <div class="col-10">{{ Form::select('question_id', $questions, $answer->question_id, array('class' => 'form-control', 'placeholder' => 'Question...')) }}</div>
  </div>
  <div class="row">
    <div class="col-2">{{ Form::label('answer', 'Answer') }}</div>
    <div class="col-10">{{ Form::text('answer', $answer->answer, array('class' => 'form-control')) }}</div>
  </div>
  <div class="row">
    <div class="col-2">{{ Form::label('next', 'Next Question') }}</div>
    <div class="col-10">{{ Form::select('next', $next_questions, $answer->next,  array('class' => 'form-control', 'placeholder' => '0')) }}</div>
  </div>
  <div class="row">
    <div class="col-2 offset-md-10">{{ Form::submit('Edit Answer', array('class' => 'form-control')) }}</div>
  </div>
  {{ Form::close() }}

@endsection
