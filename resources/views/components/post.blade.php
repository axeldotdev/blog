<article class="max-w-5xl mx-auto px-24">
    <div class="px-24 py-12 bg-white rounded-lg shadow">
        <div class="prose prose-lg prose-blue font-sans">
            @if ($model instanceof \App\Models\Post)
            <p class="flex items-center text-gray-500">
                <span class="">
                    {{ \Carbon\Carbon::parse($model->published_at)->format('F, j Y') }}
                </span>
            </p>
            @endif
            <x-markdown>{!! $model->content !!}</x-markdown>
        </div>
    </div>
</article>
