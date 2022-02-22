@extends('_layouts.main')

@section('head')
    @include("_components.hero")
@endsection

@section('body')

    <div class="block mb-6">
        @include('_components.featured-carousel')
    </div>
    <hr class="block w-full border-b mt-6 mb-6">

    {{--    @include('_components.newsletter-signup')--}}

    @foreach ($posts->where('featured', false)->take(6)->chunk(2) as $row)
        <div class="flex flex-col md:flex-row md:-mx-6">
            @foreach ($row as $post)
                <div class="w-full md:w-1/2 md:mx-6">
                    @include('_components.post-preview-inline')
                </div>

                @if (! $loop->last)
                    <hr class="block md:hidden w-full border-b mt-2 mb-6">
                @endif
            @endforeach
        </div>

        @if (! $loop->last)
            <hr class="w-full border-b mt-2 mb-6">
        @endif
    @endforeach
@stop
