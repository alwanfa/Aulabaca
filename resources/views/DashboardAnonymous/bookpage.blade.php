@extends('DashboardAnonymous.layouts.main')
@section('container')
<main>
    <div class=" buku1 content">
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
                <div class="btn flex items-center">
                    <a href="/read/{{$post->slug}}" class="read-now px-6 py-3 bg-component rounded-full text-primary-white hover:bg-hover-component">
                        Baca Sekarang
                    </a>
                </div>
            </div>
        </section>
        <!-- Description of the book -->
        <section class="mb-8 p-6 rounded-xl bg-primary-white dark:bg-background-component-2" style="box-shadow: 0px 2px 16px rgba(64, 75, 105, 0.08);">
            <div class="description-book">
                <h1>Sinopsis</h1>
                <div class="txt-content text-primary-black dark:text-primary-white">
                    <p>{!! $post->body!!}
                    </p>
                </div>
            </div>
        </section>
    </div>
</main>
@endsection