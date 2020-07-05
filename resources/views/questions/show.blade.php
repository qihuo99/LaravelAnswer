@extends('template')

@section('content')
    <div class="container">
        <h1>{{ $question->title }}</h1>
        <p class="lead">
            {{ $question->description }}
        </p> 
        <hr />

        @if ($question->answers->count() > 0) 
            @foreach ($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel panel-body">
                        <p>
                            {{ $answer->content }} 
                        </p>
                    </div>
                </div>
            @endforeach
        @else
            <p>
             There are no answers for this question yet.  Please consider submitting one below!
            </p>
        @endif 

        
        <form action="{{ route('answers.store') }}" method="POST">
            {{ csrf_field() }} 
            <h4>Submit Your Own Answer:</h4>
            <textarea class="form-control" name="content" rows="4"></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id" />
            <button class="btn">Submit Answer</button>
        </form>
    </div>
@endsection