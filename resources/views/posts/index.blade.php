<app-layout :title="$title" :description="$description">
    @foreach($posts as $post)
    <x-post :content="$post" />
    @endforeach
</app-layout>
