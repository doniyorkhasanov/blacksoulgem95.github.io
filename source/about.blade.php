---
title: About
description: A little bit about the site
---
@extends('_layouts.main')

@section('body')
    <h1>About</h1>

    <img src="/assets/img/about.jpeg"
        alt="Sofia Vicedomini"
        class="flex rounded-full h-64 w-64 bg-contain mx-auto md:float-right my-6 md:ml-10">
    <p class="mb-6">My name is Sofia, I grew up with the influence of my Dad's teachings of AutoCAD and my Uncle's copies of Diablo, Prince of Persia, Starcraft and more games.</p>


    <p class="mb-6">I grew up in the Rome's suburbs and surrounding areas, where I've learnt the Art of "Arrangiarsi" (Art of "make to"), and to take the life with a bit of weightlessness, since we're not robots, but humans with needs and passions.</p>


    <p class="mb-6">And the last sentence was the reason I've started studying Computer Science: I used to be to videogames as bees are to honey; dedicated with intense passion, my IT skills started to develop a bit later, when I started to try fixing my computer by myself when my Dad was unavailable and I had to finish that level, no matter what!</p>


    <p class="mb-6">I was 13 when I've started writing my first lines of code, customising game-modes for GTA SA:MP, and writing exercises in Pascal; then, going to the Istituto Tecnico Industriale (the Italian equivalent of the Scottish Advanced Highers), I've started studying CompSci more in-depth, studying Intel 8086 ASM, Procedural C and a bit of PHP, XHTML and CSS.</p>

    <p class="mb-6 flex justify-around"><a target="_blank" href="//go.italianprogrammer.pizza/linkedin" class="btn btn-blue">Check out my LinkedIn</a> <a target="_blank" href="//rxresu.me/r/h0so9v" class="btn btn-blue">Check out my Resume</a> </p>

    <h2 class="mt-6 mb-6">Testimonials</h2>

    <div class="mb-6">
        @include("_components.carousel")
    </div>
@endsection
