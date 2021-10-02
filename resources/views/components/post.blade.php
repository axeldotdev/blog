<article class="max-w-5xl mx-auto lg:px-24">
    <div class="p-8 lg:px-24 lg:py-12 bg-white dark:bg-gray-700 lg:rounded-lg shadow">
        <div class="prose prose-lg dark:prose-light font-sans">
            @if ($model instanceof \App\Models\Post)
            <p class="flex items-center text-gray-400">
                <span class="">
                    {{ \Carbon\Carbon::parse($model->published_at)->format('F, j Y') }}
                </span>
            </p>
            @endif
            <x-markdown>{!! $model->content !!}</x-markdown>
        </div>
    </div>
</article>
