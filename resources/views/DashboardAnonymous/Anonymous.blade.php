@extends('DashboardAnonymous.layouts.main')
@section('container')

<div class="content">
    <!-- Hero carousel -->
    <div id="carouselExampleIndicators" class="carousel slide relative" data-bs-ride="carousel">
        <div class="carousel-indicators carou  absolute right-0 bottom-0 left-0 flex justify-center p-0 mb-4">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="car carousel-inner h-96 relative w-full overflow-hidden">
            <div class="car carousel-item active float-left w-full">
                <img src="{{asset('images/hero/hero-1.svg')}}" class="block w-full" alt="Wild Landscape" />
            </div>
            <div class=" car carousel-item float-left w-full">
                <img src="{{asset('images/hero/hero-2.svg')}}" class="block w-full" alt="Camera" />
            </div>
            <div class="car carousel-item float-left w-full">
                <img src="{{asset('images/hero/hero-3.svg')}}" class="block w-full" alt="Exotic Fruits" />
            </div>
        </div>
        <button class="carousel-control-prev absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline left-0" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next absolute top-0 bottom-0 flex items-center justify-center p-0 text-center border-0 hover:outline-none hover:no-underline focus:outline-none focus:no-underline right-0" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon inline-block bg-no-repeat" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!-- end -->
    <!-- Buku terpopuler -->
    <div data-aos="fade-up" data-aos-duration="3000">

        <section>
            <h1 class="mt-10">Buku terpopuler bulan ini</h1>

            <div class="cards" id="tampil">
                @foreach($postPilihan as $post)
                <a href="/{{$post->slug}}">
                    <div class="card buku">
                        @if($post->image)
                        <img src="{{ asset('storage/' .$post->image)}}" alt="book cover">
                        @else
                        <img src="{{ asset('images/books/mountain.jpg')}}" alt="book cover">
                        @endif
                        <div class="txt-content">
                            <h2>{{ Str::limit($post->tittle, 17) }}</h2>
                            <p>{{$post->author}}</p>
                            <p>{{$post->view}}x dibaca</p>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
    </div>
    </section>

    <!-- Buku pilihan -->
    <section>
        <h1>Buku Lainnya</h1>
        <div class="cards">
            @foreach($postlike as $post)
            <a href="/{{$post->slug}}">
                <div class="card buku">
                @if($post->image)
                        <img src="{{ asset('storage/' .$post->image)}}" alt="book cover">
                        @else
                        <img src="{{ asset('images/books/mountain.jpg')}}" alt="book cover">
                        @endif
                    <div class="txt-content">
                        <h2>{{ Str::limit($post->tittle, 17) }}</h2>
                        <p>{{$post->author}}</p>
                        <p>{{$post->view}}x dibaca</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>


</div>
@endsection