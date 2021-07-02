@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Nuovo Post</h1>
    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf
        @method('POST')
    
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="6"></textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
          
    </form>
</div>

@endsection