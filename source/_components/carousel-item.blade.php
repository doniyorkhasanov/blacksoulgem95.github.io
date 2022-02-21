<div class="carousel-item" role="group" aria-label="slide 5 of 5">

    <div class="author-profile">
        <img src="{{$testimonial->pic}}">
    </div>

    <p class="text_caption italic my-8">
        {!! strip_tags($testimonial->getContent(), ['<br><b><strong><i>']) !!}
    </p>

    <span class="caption-author">
        - <b>{{$testimonial->name}}</b><br/>
        <small>{{$testimonial->position}} - {{$testimonial->company}}</small>
    </span>

</div>