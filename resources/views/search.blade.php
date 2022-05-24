<div class="pencarian">
@if($condition === true)
    @foreach($posts as $post)
                <a href="/{{$post->slug}}">
                <div class="search-display flex">
                @if($post->image)
                        <img class="gambar"src="{{ asset('storage/' .$post->image)}}" alt="book cover">
                        @else
                        <img class="gambar" src="{{ asset('images/books/mountain.jpg')}}" alt="book cover">
                        @endif
                    <div class='data-buku block'>
                        <h6 class='search-title'>{{$post->tittle}}</h6>
                        <h8 class='search-author'>{{$post->author}}</h8>
                    </div>
                </div>
</a>
    @endforeach
@else
    <p class="kosong">Data Tidak Ditemukan</p>
@endif
</div>