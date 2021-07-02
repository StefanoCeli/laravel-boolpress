@extends('layouts.app')
@section('content')

<div class="container">
    
    <a class="btn btn-secondary" href="{{ route('admin.posts.edit',$post) }}">Edit</a>
    <h1 class="mt-3">{{ $post->title }}</h1> 
    <p>{{ $post->content }}</p>

</div>

@endsection