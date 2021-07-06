@extends('layouts.app')
@section('content')

    <div class="container">
        <h1>I miei Post</h1>
        @if (session('deleted'))

        <span class="alert alert-danger">
            <strong>{{session('deleted')}}</strong> eliminato correttamente!
        </span>
            
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CATEGORIES</th>
                    <th>CONTENT</th>
                    <th colspan="3">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td>{{ $post->content }}</td>
                        <td><a class="btn btn-primary" href="{{ route('admin.posts.show',$post) }}">Show</a></td>
                        <td><a class="btn btn-secondary" href="{{ route('admin.posts.edit',$post) }}">Edit</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @foreach ($categories as $category )
            <h3>{{$category->name}}</h3>
            <ul>
                @forelse ($category->posts as $post_category )
                    <li>{{ $post_category->title }}</li>
                @empty
                    <li>nessun post presente</li>
                @endforelse
            </ul>
        @endforeach

    </div>

@endsection