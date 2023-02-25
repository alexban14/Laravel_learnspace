@extends('layouts.app')

@section('content')
    <div class="my-6">
        <h1 class="text-3xl py-2">{{ $post->title }}</h1>
        <div class="mb-6">
            {{ $post->body }}
        </div>
        <hr>
        <small>Writen on {{ $post->created_at }}</small>
        <hr>
    </div>
    <div class="flex">
        <a href="/posts" class="p-2 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</a>
        <a class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900" href="/posts/{{ $post->id }}/edit">Edit</a>
        <form action="/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Delete</button>
        </form>
    </div>
@endsection
