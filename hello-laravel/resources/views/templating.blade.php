<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
    </head>
    <body class="antialiased">
        <h1>{{ $group->title }}</h1>
        {!! $group->heroImageHtml() !!}
        @forelse ($users as $user)
            • {{ $user->first_name }} {{ $user->last_name }}<br>
        @empty
            No users in this group.
        @endforelse

        @if (count($talks) === 1)
            There is one talk at this time period.
        @elseif (count($talks) === 0)
            There are no talks at this time period.
        @else
            There are {{ count($talks) }} talks at this time period.
        @endif

        @unless ($user->hasPaid())
            You can complete your payment by switching to the payment tab.
        @endunless

        @for ($i = 0; $i < $talk->slotsCount(); $i++)
            The number is {{ $i }}<br>
        @endfor

        @foreach ($talks as $talk)
            • {{ $talk->title }} ({{ $talk->length }} minutes)<br>
        @endforeach

        @while ($item = array_pop($items))
            {{ $item->orSomething() }}<br>
        @endwhile

        @forelse ($talks as $talk)
            • {{ $talk->title }} ({{ $talk->length }} minutes)<br>
        @empty
            No talks this day.
        @endforelse

        <!-- $loop variable -->
        <ul>
        @foreach ($pages as $page)
        <li>{{ $loop->iteration }}: {{ $page->title }}
        @if ($page->hasChildren())
        <ul>
        @foreach ($page->children() as $child)
        <li>{{ $loop->parent->iteration }}
        .{{ $loop->iteration }}:
        {{ $child->title }}</li>
        @endforeach
        </ul>
        @endif
        </li>
        @endforeach
        </ul>
    </body>
</html>
