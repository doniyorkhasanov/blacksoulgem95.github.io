@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    <div class="flex flex-col items-center text-gray-700 mt-32">
        <h1 class="text-6xl font-light leading-none mb-2">Redirecting</h1>

        <h2 class="text-3xl">The page has moved, we're redirecting you.</h2>

        <hr class="block w-full max-w-sm mx-auto border my-8">

        <p class="text-xl">
            If the page doesn't refresh in a few seconds, click the following button.
        </p>
        <p class="text-xl">
            <button onclick="location.href = '{{$page->link}}'" class="btn btn-pink">Go</button>
        </p>
        <script>
            setTimeout(() => location.href = '{{$page->link}}', 3000)
        </script>
    </div>
@endsection
