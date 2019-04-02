@extends('laraqa::laraqa')

@section('content')
<h1>All questions</h1>
<a href="/questions/create">Ask</a>
<ul>
    @foreach ($questions as $question)
        <li>{{$question->body}}</li>
    @endforeach
</ul>
    
@endsection