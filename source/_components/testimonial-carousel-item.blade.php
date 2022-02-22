<div class="swiper-slide">
    <div class="flex flex-col pl-10 pr-10 ml-10 mr-10 pb-10 justify-center items-center">
        <div class="author-profile text-center">
            <img src="{{$testimonial->pic}}" alt="{{$testimonial->name}}">
        </div>

        <p class="text_caption italic my-8 text-center">
            {!! strip_tags($testimonial->getContent(), ['<br><b><strong><i>']) !!}
        </p>

        <span class="caption-author text-center">
        - <b>{{$testimonial->name}}</b><br/>
        <small>{{$testimonial->position}} - {{$testimonial->company}}</small>
        </span>
    </div>
</div>