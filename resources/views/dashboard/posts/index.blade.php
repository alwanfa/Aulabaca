@extends('dashboard.layouts.main')
@section('container')
<div class="kata d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1 class="h2">My Posts </h1>
</div>
@if(session()-> has('success'))
<div class="alert coba alert-success col-lg-10" role="alert">
  {{session('success')}}
</div>
@endif
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<a href="/dashboard/posts/create" class="btn create btn-primary mb-3">Create new post</a>
<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="main-box clearfix">
        <div class="table-responsive">
          <table class="table user-list">
            <thead>
              <tr>
                <th><span>No</span></th>
                <th><span>Tittle</span></th>
                <th><span>Category</span></th>
                <th class="text-center"><span>Created</span></th>
                <th><span>Author</span></th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $key=> $post)
              <tr>
                <td>
                  {{$posts->firstitem()+$key}}
                </td>
                <td>
                  @if($post->image)
                  <img src="{{ asset('storage/' .$post->image)}}" alt="book cover">
                  @else
                  <img src="{{ asset('images/books/mountain.jpg')}}" alt="book cover">
                  @endif
                  {{$post->tittle}}
                </td>
                <td>
                  {{$post->category->name}}
                </td>
                <td class="text-center">
                  <span class="label label-default">{{ $post->created_at->format('d/m/Y')}}</span>
                </td>
                <td>
                  <a href="#">{{$post->author}}</a>
                </td>
                <td style="width: 20%;">
                  <div class="ikon">
                    <a href="/dashboard/posts/{{$post->slug}}" class="table-link">
                      <span class="fa-stack">
                        <i class="fa fa-square fa-stack-2x"></i>
                        <i class="fa fa-search-plus fa-stack-1x fa-inverse"></i>
                      </span>
                    </a>
                    <a href="/dashboard/posts/{{ $post->slug }}/edit" class="table-link ">
                      <span class="fa-stack ">
                        <i class="fa fa-square fa-stack-2x "></i>
                        <i class="fa fa-pencil fa-stack-1x fa-inverse "></i>
                      </span>
                    </a>
                    <a href="/dashboard/posts/{{$post->slug}}" class="table-link danger">
                      <span class="fa-stack">
                        <form action="/dashboard/posts/{{$post->slug}}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button class=" trash bg-danger border-0" onclick="return confirm('Are you sure?')">
                            <i class="fa fa-trash-o fa-inverse"></i></button>
                        </form>
                      </span>
                    </a>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div >{{$posts->links()}}</div>

</div>

@endsection