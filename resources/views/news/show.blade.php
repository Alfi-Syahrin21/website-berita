@extends('layouts.app')

@section('title', $news->title . ' | Berita Universitas Sumatera Utara')
@section('content')
<div class="pt-8 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- BREADCRUMBS --}}
        <div class="mb-6">
            @include('components.breadcrumbs', [
                'crumbs' => [
                    ['name' => 'Activities', 'url' => '#'],
                    ['name' => 'News', 'url' => route('news.index')],
                    ['name' => $news->title, 'url' => null]
                ],
                'theme' => 'dark'
            ])
        </div>

        {{-- HERO SECTION --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 md:gap-12 items-center mb-12">
            <div class="flex flex-col justify-center">
                <h1 class="text-2xl md:text-3xl font-extrabold text-green-800">
                    {{ $news->title }}
                </h1>
                <div class="mt-6 pt-6 flex items-center gap-8">
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Dipublish Pada</p>
                        <p class="text-sm font-medium text-gray-800">{{ $news->published_at->format('d F Y') }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-semibold text-gray-500">Dipublish Oleh</p>
                        <p class="text-sm font-medium text-gray-800">{{ $news->publisher_name }}</p>
                    </div>
                </div>
            </div>

            <figure>
                <img class="w-full h-auto rounded-lg shadow-lg" src="{{ asset('storage/' . $news->thumbnail) }}" alt="{{ $news->title }}">
                @if($news->thumbnail_caption)
                    <figcaption class="mt-2 text-left text-xs text-gray-500 italic">
                        {{ $news->thumbnail_caption }}
                    </figcaption>
                @endif
            </figure>
        </div>
    </div>

    {{-- MAIN CONTENT --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="md:hidden flex justify-center items-center space-x-6 mb-8 py-4 border-y border-gray-200">
            <a href="#" class="block text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12s-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path></svg>
            </a>
            <a href="#" class="block text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
            </a>
            <a href="#" class="block text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.9V7a5 5 0 00-5-5H8a5 5 0 00-5 5v10a5 5 0 005 5h6"></path></svg>
            </a>
            <a href="#" class="block text-gray-500 hover:text-gray-800">
                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0014.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.196h3.312z"></path></svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-8 gap-8">
            <aside class="hidden md:flex flex-col items-end md:col-span-1">
                <div class="sticky top-24 space-y-4">
                    <a href="#" class="block text-gray-500 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12s-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"></path></svg>
                    </a>
                    <a href="#" class="block text-gray-500 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                    </a>
                    <a href="#" class="block text-gray-500 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12.9V7a5 5 0 00-5-5H8a5 5 0 00-5 5v10a5 5 0 005 5h6"></path></svg>
                    </a>
                    <a href="#" class="block text-gray-500 hover:text-gray-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M13.397 20.997v-8.196h2.765l.411-3.209h-3.176V7.548c0-.926.258-1.56 1.587-1.56h1.684V3.127A22.336 22.336 0 0014.201 3c-2.444 0-4.122 1.492-4.122 4.231v2.355H7.332v3.209h2.753v8.196h3.312z"></path></svg>
                    </a>
                </div>
            </aside>

            <article class="md:col-span-6">
                @if ($news->quote)
                    <p class="text-lg md:text-xl italic font-semibold text-green-700 leading-relaxed mb-8">
                        {{ $news->quote }}
                    </p>
                @endif
                <div class="prose prose-base md:prose-lg max-w-none text-gray-800 prose-p:text-justify">
                    {!! $news->content !!}
                </div>
                @if($news->photos->isNotEmpty())
                <div class="mt-12">
                    <h3 class="text-2xl font-bold mb-4">Galeri Foto</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($news->photos as $photo)
                        <a href="{{ asset('storage/' . $photo->path) }}" data-fancybox="gallery" data-caption="{{ $photo->caption }}">
                            <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->caption ?? 'Foto Galeri' }}" class="rounded-lg object-cover w-full h-40">
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
                <div class="pt-8">
                    <div class="flex flex-wrap gap-3">
                        @foreach($news->sdgs as $sdg)
                            <span class="inline-flex items-center px-4 py-2 rounded-lg text-sm font-medium bg-green-100 text-green-800">
                                {{ $sdg->code }} {{ $sdg->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
            </article>
            <aside class="hidden md:block md:col-span-1"></aside>
        </div>
    </div>

    <div class="mt-16 bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-sm font-semibold tracking-wider uppercase text-gray-500 mb-8">
                Find Other News
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($otherNews as $other)
                    <a href="{{ route('news.show', $other->slug) }}" class="group block p-6  hover:bg-[#0B6839] transition-colors duration-300">
                        <p class="text-sm font-medium text-green-700 group-hover:text-white">
                            Internasional
                        </p>
                        <h3 class="mt-2 text-lg font-bold text-gray-900 group-hover:text-white">
                            {{ $other->title }}
                        </h3>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
