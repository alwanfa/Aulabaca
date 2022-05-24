@extends('dashboard.layouts.main')
@section('container')
<div class=" kata d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-6 border-bottom">
    <h1 class="h2">Create New Post </h1>
</div>

<div class="col-lg-8">
    <form method="post" action="/dashboard/posts" class="mb-5 mt-4" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tittle" class="form-label">Tittle</label>
            <input type="text" class="form-control  @error('tittle') is-invalid @enderror" id="tittle" name="tittle" required autofocus value="{{old('tittle')}}">
            @error('tittle')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{old('slug')}}">
            @error('slug')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control  @error('author') is-invalid @enderror" id="author" name="author" value="{{old('author')}}">
            @error('author')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Category</label>
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                @if(old('category_id')== $category->id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input class="form-control" @error('image') is-invalid @enderror type="file" id="image" name="image">
            @error('image')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="dokumen" class="form-label">Upload Book</label>
            @error('dokumen')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input class="form-control" @error('dokumen') is-invalid @enderror type="file" id="dokumen" name="dokumen">
            @error('dokumen')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Sinopsis</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{old('body')}}">
            <trix-editor input="body"></trix-editor>
        </div>
        <button type="submit" class="btn bg-blue-500 hover:bg-blue-300">Create post</button>
    </form>
</div>
<script>
    const tittle = document.querySelector('#tittle');
    const slug = document.querySelector('#slug');

    tittle.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?tittle=' + tittle.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
    });
</script>
@endsection