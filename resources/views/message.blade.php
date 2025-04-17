<x-app-layout>
{{-- <x-layout.app> --}}
@php
    $status = $status ?? 'failed';
@endphp
<x-slot:title>{{$status}}</x-slot>
@include('components.html.msg')
{{-- </x-layout.app> --}}
</x-app-layout>
