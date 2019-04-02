@extends('laraqa::laraqa')

@section('content')
    <h1 class="text-center">Ask Question</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/questions">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="body">Question</label>
            <textarea class="form-control" name="body" id="body" cols="30" rows="10"></textarea>
        </div>
        
        <input type="submit" class="btn btn-primary" value="Submit">
    </form>
@endsection
