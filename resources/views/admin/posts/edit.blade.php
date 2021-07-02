@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Modifica: <a href="{{route('admin.posts.show',$post)}}">{{$post->title}}</a></h1>
    <form action="{{route('admin.posts.update',$post)}}" method="post">
        @csrf
        @method('PATCH')
    
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control" name="content" id="content" rows="6">{{ $post->content }}</textarea>
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
          
    </form>
</div>

@endsection