<nav class="flex justify-center items-center max-w-7xl mx-auto px-8 py-24 md:space-x-10">
    @foreach($links as $link)
    <a class="font-sans font-medium text-gray-500 hover:text-gray-900" href="{{ $link->url }}">
        {{ $link->name }}
    </a>
    @endforeach
</nav>
