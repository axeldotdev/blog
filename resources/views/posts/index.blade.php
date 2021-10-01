<x-app-layout :title="$title" :description="$description">
    <section class="space-y-12">
        @foreach($posts as $post)
        <x-post :model="$post" />
        @endforeach
    </section>
</x-app-layout>
