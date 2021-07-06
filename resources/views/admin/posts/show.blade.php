@extends('layouts.app')
@section('content')

<div class="container">
    
    <a class="btn btn-secondary" href="{{ route('admin.posts.edit',$post) }}">Edit</a>
    <h1 class="mt-3">{{ $post->title }}</h1> 
    <h3>Categoria: {{ $post->category->name }}</h3>
    <div>
        @forelse ($post->tags as $tag)
            <span class="badge badge-primary">{{ $tag->name }}</span>
        @empty
           <h4> nessuna categoria</h4>
        @endforelse 
            
    </div>
    <p>{{ $post->content }}</p>

</div>

@endsection