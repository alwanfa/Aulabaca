@extends('DashboardAnonymous.layouts.main')
@section('container')
<main class="pb-0 p-0 lg:p-8">
    <embed class="pd " src="{{ asset('dokumen/' . $post->dokumen)}}" align="top" height="860px" width="100%" frameborder="0" scrolling="auto"><embed>
</main>

@endsection