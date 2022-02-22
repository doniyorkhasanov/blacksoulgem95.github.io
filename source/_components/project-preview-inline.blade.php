<div class="flex flex-col mb-4">
    <p class="text-gray-700 font-medium my-2">
        <span>Since {{ $project->getDate()->format('F, Y') }}</span>
        @if ($project->end_date)
            <span>to {{date('F, Y', $project->end_date)}}</span>
        @endif
    </p>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $project->getUrl() }}"
            title="Read more - {{ $project->name }}"
            class="text-gray-900 font-extrabold"
        >{{ $project->name }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $project->getExcerpt(200) !!}</p>

    <a
        href="{{ $project->getUrl() }}"
        title="Read more - {{ $project->name }}"
        class="uppercase font-semibold tracking-wide mb-2"
    >Read</a>
</div>
