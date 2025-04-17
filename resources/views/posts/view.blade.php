<x-app-layout>
    {{-- <x-layout.app> --}}
    <x-slot:title>{{$post->title}}</x-slot>
    @include('components.html.posts.view-post')
{{-- </x-layout.app> --}}
</x-app-layout>
