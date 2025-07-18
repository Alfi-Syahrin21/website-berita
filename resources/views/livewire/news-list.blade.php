<div>
    <div class="grid grid-cols-1 md:grid-cols-3 md:gap-x-8">
        <div class="md:col-span-2 flex flex-col">

            {{-- Filter Bar --}}
            <div class="p-4 rounded-lg mb-8 flex flex-col sm:flex-row justify-between items-center gap-4">
                <div class="hidden sm:flex items-center gap-2">
                    <label for="tahun" class="text-sm font-medium text-gray-700 whitespace-nowrap">Tahun Rilis</label>
                    <select id="tahun" wire:model.live="selectedYear" class="appearance-none block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md bg-green-100 text-green-900 font-semibold">
                        <option value="">Semua Tahun</option>
                        @foreach($years as $year)
                            <option value="{{ $year }}">{{ $year }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full sm:w-auto flex items-center gap-2">
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" /></svg>
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search" class="block w-full rounded-md border-gray-300 pl-10 placeholder:text-right focus:ring-green-500 focus:border-green-500" placeholder="CARI DISINI">
                    </div>
                </div>
            </div>

            {{-- Area Konten --}}
            <div class="flex-grow">
                <div class="space-y-8">
                    @forelse ($news as $item)
                    <article class="bg-slate-100 p-4 flex items-start gap-4 group hover:bg-[#0B6839] transition-colors duration-300 rounded-lg">
                        <a href="{{ route('news.show', $item->slug) }}" class="w-24 h-24 sm:w-32 sm:h-32 md:w-48 flex-shrink-0 block">
                            <img class="w-full h-full object-cover rounded-md" src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}">
                        </a>
                        <div class="flex-1 flex flex-col">
                            <div class="mb-2 flex flex-wrap gap-2">
                                @foreach($item->sdgs->take(2) as $sdg)
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-[#0B6839] text-white">
                                    {{ $sdg->code }}<span class="hidden md:inline">&nbsp;{{ $sdg->name }}</span>
                                </span>
                                @endforeach
                            </div>
                            <h2 class="text-sm sm:text-base md:text-lg lg:text-xl font-bold leading-tight">
                                <a href="{{ route('news.show', $item->slug) }}" class="text-gray-900 group-hover:text-white transition-colors">
                                    {{ $item->title }}
                                </a>
                            </h2>
                            <p class="hidden md:block mt-2 text-gray-600 text-sm md:line-clamp-1 lg:line-clamp-3 group-hover:text-white transition-colors">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->content), 50) }}
                            </p>
                            <div class="flex-grow flex items-end">
                                <p class="mt-3 text-xs sm:text-sm text-gray-500 group-hover:text-white transition-colors">
                                    {{ $item->published_at->format('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </article>
                    @empty
                    <div class="p-6 rounded-lg text-center">
                        <p class="text-gray-500">Tidak ada berita yang ditemukan.</p>
                    </div>
                    @endforelse
                </div>
            </div>

            {{-- Area pagination --}}
            <div class="pt-8 flex justify-center">
                {{ $news->links('vendor.pagination.custom') }}
            </div>
        </div>

        {{-- Sidebar Kategori --}}
        <aside class="hidden md:block mt-12 md:mt-0">
            <div class="p-6">
                <h3 class="text-lg font-bold text-gray-900 mb-4 flex justify-between items-center">
                    <span>Kategori</span>
                </h3>
                <div class="space-y-4">
                    @foreach ($sdgs as $sdg)
                    <div class="flex items-center">
                        <input id="kategori-{{ $sdg->id }}" type="checkbox" wire:model.live="selectedSdgs" value="{{ $sdg->id }}" class="h-4 w-4 rounded border-gray-300 text-green-600 focus:ring-green-500">
                        <label for="kategori-{{ $sdg->id }}" class="ml-3 text-sm text-gray-600">{{ $sdg->code }} {{ $sdg->name }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        </aside>

    </div>
</div>
