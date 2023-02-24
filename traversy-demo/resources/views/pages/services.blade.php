@extends('layouts.app')

@section('content')
<h1>{{ $title }}</h1>
@if(count($services) > 0)
<ul class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
    @foreach($services as $service)
            <li class="w-full px-4 py-2 border-b border-gray-200 dark:border-gray-600">{{ $service }}</li>
    @endforeach
</ul>
@endif
@endsection
