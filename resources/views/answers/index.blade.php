@extends('layouts.loggedin')

@section('title', 'Answers')

@section('content-in')

  <h2>Questions</h2>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Question</th>
        <th>Answer</th>
        <th>Next</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($answers as $answer)
        <tr>
          <td><a href="{{ route('answers::edit', $answer->id) }}" class="btn btn-primary">Edit (ID: {{ $answer->id }})</a></td>
          <td>{{ $answer->question_id }}</td>
          <td>{{ str_limit($answer->answer, 50) }}</td>
          <td>
            @isset($answer->next)
              {{ $answer->next }}
            @endisset
            @empty($answer->next)
              None
            @endisset
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="3">No answers</td>
        </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <td>
          <a href="{{ route('answers::add') }}" class="btn btn-success">Add Answer</a>
        </td>
      </tr>
    </tfoot>
  </table>

@endsection
