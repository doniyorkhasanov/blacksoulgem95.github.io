@extends('_layouts.main')

@section('body')
    <h1><a class="font-extrabold" href="/shop">Shop</a> <i class="fa-solid fa-chevron-right"></i> {{ $page->title }}</h1>

    <div class="text-2xl border-b border-pink-200 mb-6 pb-10">
        @yield('content')
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        @foreach ($page->products($products) as $post)
        <div class="flex flex-col justify-start items-start border-b my-6">
                @include('_components.product-preview-inline')
        </div>
        @endforeach
    </div>

    @include('_components.reso')
@stop
