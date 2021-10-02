<nav class="flex flex-wrap justify-center items-center max-w-7xl mx-auto px-8 py-8 lg:py-16">
    @foreach($links as $link)
    <a class="px-5 font-sans font-medium text-gray-500 hover:text-gray-900" href="{{ $link->url }}">
        {{ $link->name }}
    </a>
    @endforeach
</nav>
