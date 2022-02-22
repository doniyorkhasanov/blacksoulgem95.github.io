<div class="swiper-slide">
    <div class="w-full mb-6 p-16">
        @if ($featuredPost->cover_image)
            <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
        @endif

        <p class="text-gray-700 font-medium my-2">
            {{ $featuredPost->getDate()->format('F j, Y') }}
        </p>

        <h2 class="text-3xl mt-0">
            <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}"
               class="text-gray-900 font-extrabold">
                {{ $featuredPost->title }}
            </a>
        </h2>

        <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

        <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}"
           class="uppercase tracking-wide mb-4">
            Read
        </a>
    </div>
</div>