@extends('DashboardAnonymous.layouts.main')
@section('container')
<select name="category" id="category" class=" dropdown btn w-30 h-10 pl-4 mb-3 mt-3">
  <option value="semua">Semua</option>
  @foreach($categorys as $category)
  <option value="{{$category->id}}">{{$category->name}}</option>
  @endforeach
</select>
<h1 class="lib ">Library</h1>
<p class="kata2">Ilmu itu ada di mana-mana, pengetahuan di mana-mana tersebar,<br> kalau kita bersedia membaca, dan bersedia mendengar.</p>
<div data-aos="fade-up" data-aos-duration="3000">
  <!-- Light mode -->

  <!-- <button class="
  relative 
  flex jutify-center items-center 
  bg-white 
  text-gray-600 rounded 
  focus:outline-none focus:ring ring-gray-200
  border shadow group
">
  <p class="px-4">Category</p>
  <span class="border-l p-2 hover:bg-gray-100">
    <svg 
      class="w-5 h-5" 
      fill="none" 
      stroke="currentColor" 
      viewBox="0 0 24 24" 
      xmlns="http://www.w3.org/2000/svg">
        <path 
          stroke-linecap="round" 
          stroke-linejoin="round" 
          stroke-width="2" 
          d="M19 9l-7 7-7-7"
        ></path>
    </svg>
  </span>
  <div class="
    absolute top-full
    hidden group-focus:block 
    min-w-full w-max 
    bg-white 
    shadow-md mt-1 rounded
  ">
    <ul class="text-left border rounded">
      @foreach($categorys as $category)
      <li class="px-4 py-1 hover:bg-gray-100 border-b">
        {{$category->name}}
      </li>
      @endforeach
    </ul>
  </div>
</button> -->


  <section id="library">
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
            <h2>{{Str::limit($post->tittle, 17) }}</h2>
            <p>{{$post->author}}</p>
            <p>{{$post->view}}x dibaca</p>
          </div>
        </div>
      </a>
      @endforeach
    </div>
    <div>{{$posts->links()}}</div>
</section>

</div>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    
    $("#category").change(function(){
      var strcari=$("#category").val();
      if(strcari != ""){
        $.ajax({
          type: "get",
          url : "{{url('/category')}}",
          data: "keyword=" + strcari,
          success:function(data){
            $("#library").html(data);
          }
        })
      }else{
        $("#library").html("");
        
      }
    });
  });
  </script>
@endsection