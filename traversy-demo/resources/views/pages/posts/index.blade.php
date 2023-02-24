@extends('layouts.app')

@section('content')
    <h1 class="text-3xl">Posts</h1>
    @if(count($posts) > 0)
        @foreach ($posts as $post)
            <div>
                <h3><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></h3>
                <small>Written on {{ $post->created_at }}</small>
            </div>
        @endforeach
        {{ $posts->onEachSide(1)->links() }}
    @else
        <h1 class="text-3xl">No posts found</h1>
    @endif
@endsection
