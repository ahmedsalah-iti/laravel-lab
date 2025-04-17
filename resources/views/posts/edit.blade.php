<x-app-layout>
    {{-- <x-layout.app> --}}
    <x-slot:title>Edit {{$post->title}}</x-slot>
    @include('components.html.posts.edit-form')
{{-- </x-layout.app> --}}
</x-app-layout>
