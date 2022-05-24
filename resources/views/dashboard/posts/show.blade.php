@extends('dashboard.layouts.main')
@section('container')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/stylepost.css') }}" rel="stylesheet" type="text/css">
    <title>Aulabaca | Read</title>
</head>

<div class="content buku1">
    <!-- About the book -->
    <section class="about-book flex flex-row gap-6 mb-8 p-6 rounded-xl bg-primary-white dark:bg-background-component-2" style="box-shadow: 0px 2px 16px rgba(64, 75, 105, 0.08);">
        <div class="book-cover">
            @if($post->image)
            <img src="{{ asset('storage/' .$post->image)}}" alt="book cover" class="w-52 rounded-md object-cover">
            @else
            <img src="{{ asset('images/books/mountain.jpg')}}" alt="book cover" class="w-52 rounded-md object-cover">
            @endif

        </div>
        <div class="book-info flex flex-col justify-between p-4">
            <div class="txt-info text-subtext">
                <h1 class="text-5xl mb-2">{{$post->tittle}}</h1>
                <p class="mb-2">Oleh <a href="./author.html" class="font-semibold hover:underline">{{$post->author}}</a></p>
                <p class="mb-2">Buku - {{$post->category->name}}</p>
                <p class="mb-2">Diterbitkan pada {{ $post->created_at->format('d/m/Y')}}</p>
                <p class="mb-2">{{$post->view}}x dibaca</p>
            </div>
            <div class="backto">
                <a href="/dashboard/posts" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Bact to all my posts</a>
                <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><i class="fa-solid fa-pen"></i> Edit</a>
                <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class=" btn bg-danger border-0" onclick="return confirm('Are you sure?')"><i class="fa-regular fa-x"> Delete</i></button>
                </form>

            </div>
        </div>
    </section>

    <!-- Description of the book -->
    <section class="mb-8 p-6 rounded-xl bg-primary-white dark:bg-background-component-2" style="box-shadow: 0px 2px 16px rgba(64, 75, 105, 0.08);">
        <div class="description-book">

            <div class="txt-content text-primary-black dark:text-primary-white">
                <p>
                    {!!$post->body !!}
                </p>
            </div>
        </div>
    </section>

</div>
</main>
@endsection