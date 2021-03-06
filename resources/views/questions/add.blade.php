@extends('layouts.loggedin')

@section('title', 'Questions')

@section('content-in')

  <h2>Add Question</h2>
  <br />
  {{ Form::model($question, ['route' => ['questions::create', $question]]) }}
  <div class="row">
    <div class="col-2">{{ Form::label('question', 'Question') }}</div>
    <div class="col-10">{{ Form::text('question', $question->question,  array('class' => 'form-control', 'placeholder' => 'What...')) }}</div>
  </div>
  <div class="row">
    <div class="col-2">{{ Form::label('type', 'Question Type') }}</div>
    <div class="col-10">{{ Form::select('type', ['Text' => 'Text', 'Select' => 'Select', 'Number' => 'Number', 'Date' => 'Date'], null, array('class' => 'form-control')) }}</div>
  </div>
  <div class="row">
    <div class="col-2">{{ Form::label('next', 'Next Question') }}</div>
    <div class="col-10">{{ Form::text('next', $question->next,  array('class' => 'form-control', 'placeholder' => '0')) }}</div>
  </div>
  <div class="row">
    <div class="col-2 offset-md-10">{{ Form::submit('Add Question', array('class' => 'form-control')) }}</div>
  </div>
  {{ Form::close() }}

@endsection
