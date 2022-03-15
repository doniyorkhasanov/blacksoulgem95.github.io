<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-2">
        @if ($post->categories)
            @foreach ($post->categories as $i => $category)
                <a
                        href="{{ '/shop/collections/' . $category }}"
                        title="View articles in {{ $category }}"
                        class="inline-block bg-gray-300 hover:bg-pink-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
                >{{ $category }}</a>
            @endforeach
        @endif
    </p>

    <h2 class="text-3xl mt-0">
        {{ $post->title }}
    </h2>

    <div class="mb-4 mt-0">{!! $post->getContent() !!}</div>
</div>
