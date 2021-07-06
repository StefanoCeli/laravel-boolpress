@extends('layouts.app')
@section('content')

<div class="container">
    <h1>Nuovo Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.posts.store')}}" method="post">
        @csrf
        @method('POST')
    
        <div class="form-group">
            <label for="title">Titolo</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Contenuto</label>
            <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="6">{{ old('content') }}</textarea>
            @error('content')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="category_id">Categoria</label>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                <option value="">Selezionare una categoria</option>
                @foreach ($categories as $category)
                    <option 
                    @if (old('category_id') == $category->id) selected @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
          
    </form>
</div>

@endsection