<div class="cards">
      @foreach($posts as $post)
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
    <div>{{$posts->links()}}</div>
