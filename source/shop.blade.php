---
title: Shop
description: The list of items I am selling
pagination:
    collection: products
    perPage: 9
---
@extends('_layouts.main')

@section('body')
    <h1>Shop</h1>

    <hr class="border-b my-6">


    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
    @foreach ($pagination->items as $post)
    <div class="flex flex-col justify-start items-start border-b my-6">
            @include('_components.product-preview-inline')
    </div>
    @endforeach
    </div>

    @if ($pagination->pages->count() > 1)
        <nav class="flex text-base my-8">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-pink-600' : 'text-pink-700' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif

    @include('_components.reso')
@stop
