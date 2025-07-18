<nav class="bg-white shadow-md sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="/">
                    <img class="h-10 w-auto" src="{{ asset('storage/image/logo-univ.png') }}" alt="Logo Universitas">
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden sm:block">
                <div class="ml-10 flex items-baseline space-x-4">
                    <a href="/" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Home</a>
                    <a href="{{ route('news.index') }}" class="text-gray-600 hover:bg-gray-100 hover:text-gray-900 px-3 py-2 rounded-md text-sm font-medium">Berita</a>
                </div>
            </div>
        </div>
    </div>
</nav>
