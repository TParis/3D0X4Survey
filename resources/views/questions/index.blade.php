@extends('layouts.loggedin')

@section('title', 'Questions')

@section('content-in')

  <h2>Questions</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Type</th>
        <th>Question</th>
        <th>Next</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($questions as $question)
        <tr>
          <td><a href="{{ route('questions::edit', $question->id) }}" class="btn btn-primary">Edit (ID: {{ $question->id }})</a></td>
          <td>{{ $question->type }}</td>
          <td>{{ str_limit($question->question, 50) }}</td>
          <td>
            @isset($question->next)
              {{ $question->next }}
            @endisset
            @empty($question->next)
              None
            @endisset
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3">No questions</td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td>
          <a href="{{ route('questions::add') }}" class="btn btn-success">Add Question</a>
        </td>
      </tr>
    </tfoot>
  </table>

@endsection
