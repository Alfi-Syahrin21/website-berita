@extends('layouts.app')

@section('content')

<div class="bg-white">
    {{-- HERO SECTION --}}
<div class="w-full h-56 md:h-64 xl:h-72 relative overflow-hidden mb-8">
    
    <div class="gradient-mask-to-left absolute top-0 right-0 h-full w-2/5 md:w-1/2 lg:w-3/5">
        <img src="{{ asset('storage/image/hero-section.png') }}" alt="Kegiatan SDGs" class="w-full h-full object-cover">
    </div>

    <div class="absolute inset-0 bg-gradient-to-r from-[#0B6839] via-[#39A935] to-transparent"></div>

    <div class="relative h-full">
        
        <div class="absolute top-6 left-4 sm:top-8 sm:left-6 lg:left-12">
            @include('components.breadcrumbs', ['crumbs' => [
                ['name' => 'Activities', 'url' => '/'],
                ['name' => 'News', 'url' => null]
            ]])
        </div>

        <div class="absolute top-1/2 -translate-y-1/2 left-4 sm:left-6 lg:left-12">
            <h1 class="font-extrabold tracking-tight text-white text-2xl sm:text-4xl md:text-5xl lg:text-6xl">Berita SDGs</h1>
        </div>
    </div>

</div>


{{-- CONTENT SECTION --}}
<div class="px-4 sm:px-6 lg:px-12">
    @livewire('news-list')
</div>
</div>


@endsection
