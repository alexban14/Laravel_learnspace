<div class="content" data-page-name="{{ $pageName }}">
<p>Here's why you should sign up for our app: <strong>It's Great.</strong></p>

<!-- if we’re in a view and want to pull in another view -->
    @include('sign-up-button', ['text' => 'See just how great it is'])

</div>
<!-- resources/views/sign-up-button.blade.php -->
<a class="button button--callout" data-page-name="{{ $pageName }}">
<i class="exclamation-icon"></i> {{ $text }}
</a>

<!-- Conditionally including views
{{-- Include a view if it exists --}}
    @includeIf('sidebars.admin', ['some' => 'data'])

{{-- Include a view if a passed variable is truth-y --}}
    @includeWhen($user->isAdmin(), 'sidebars.admin', ['some' => 'data'])

{{-- Include the first view that exists from a given array of views --}}
    @includeFirst(['customs.header', 'header'], ['some' => 'data']) -->
