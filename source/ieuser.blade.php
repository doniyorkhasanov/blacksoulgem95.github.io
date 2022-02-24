@extends('_layouts.main')

<?php
$browsers = [
    (object)[
        'name' => 'Firefox',
        'url' => 'https://www.mozilla.org/firefox/new/',
        'icon' => '/assets/img/logo/ff.png'
    ],
    (object)[
        'name' => 'Chrome',
        'url' => 'https://google.com/chrome',
        'icon' => '/assets/img/logo/chrome.png'
    ],
    (object)[
        'name' => 'Vivaldi',
        'url' => 'https://vivaldi.com/',
        'icon' => '/assets/img/logo/vivaldi.png'
    ],
    (object)[
        'name' => 'Brave',
        'url' => 'https://brave.com/?ref=italianprogrammer.pizza',
        'icon' => '/assets/img/logo/brave.png'
    ],
]
?>

@section('body')
    <div class="flex flex-col items-center text-gray-700 mt-32">
        <h1 class="text-6xl font-light leading-none mb-2">IE is not OK</h1>

        <h2 class="text-3xl">Please upgrade to a decent browser.</h2>

        <hr class="block w-full max-w-sm mx-auto border my-8">

        <p class="text-xl">
            You have all the choice!
        </p>
        <p class="text-xl">
            @foreach($browsers as $b)
                <a target="_blank" href="{{$b->url}}" class="mr-3 flex-row">
                    <img src="{{$b->icon}}" class="w-10 h-10 inline-block"/>
                    &nbsp;<span class="btn btn-pink inline-block">{{$b->name}}</span>
                </a>
            @endforeach
        </p>
    </div>
@endsection
