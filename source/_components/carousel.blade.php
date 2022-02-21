<section class="wrapper_carousel flex flex-col justify-center w-full" role="region" aria-label="testimonial carousel">

    <div class="carousel-data relative overflow-hidden flex items-center justify-center w-full mt-8 mb-8">
        @foreach($testimonials as $testimonial)
            @include('_components.carousel-item')
        @endforeach
    </div>

    <div class="carousel-indicators flex items-center">

    </div>

    <div class="carousel-controls flex justify-end mt-auto" aria-label="carousel controls">
        <button type="button" class="button_carousel-prev" aria-label="previous"><i class="fa-solid fa-caret-left"></i></button>
        <button type="button" class="button_carousel-next ml-1" aria-label="next"><i class="fa-solid fa-caret-right"></i></button>
    </div>

</section>