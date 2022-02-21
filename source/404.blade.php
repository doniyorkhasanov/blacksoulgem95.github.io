---
permalink: 404.html
---

@extends('_layouts.main')

@section('body')
    <div class="flex flex-col items-center text-gray-700 mt-32">
        <h1 class="text-6xl font-light leading-none mb-2">404</h1>

        <h2 class="text-3xl">They've taken this page to Isengard.</h2>

        <hr class="block w-full max-w-sm mx-auto border my-8">

        <p class="text-xl">
            Always remember, Frodo, the page is trying to get back to its master. It wants to be found.
        </p>
        <p class="text-xl">
            <button onclick="location.href = '/'" class="btn btn-pink">Go to the Shire</button>
        </p>
    </div>
@endsection
