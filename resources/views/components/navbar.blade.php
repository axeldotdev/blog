<nav class="flex flex-wrap justify-center items-center max-w-7xl mx-auto px-8 pt-4 lg:pt-8 pb-8 lg:pb-16">
    @foreach($links as $link)
    <a class="px-5 font-sans font-medium text-gray-500 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-50"
        href="{{ $link->url }}">
        {{ $link->name }}
    </a>
    @endforeach
</nav>
