@props(['crumbs', 'theme' => 'light'])

@php
    $themeClasses = match ($theme) {
        'dark' => [
            'link' => 'text-green-800 hover:text-green-600',
            'current' => 'text-green-700',
            'separator' => 'text-green-700/75',
            'icon' => 'text-green-800',
        ],
        default => [
            'link' => 'text-white hover:text-gray-300',
            'current' => 'text-white',
            'separator' => 'text-white',
            'icon' => 'text-white',
        ],
    };
@endphp

<nav class="flex" aria-label="Breadcrumb">
  <ol class="inline-flex items-center space-x-1 md:space-x-2">
    
    @foreach ($crumbs as $crumb)
      <li class="inline-flex items-center">
        
        @if (!$loop->last)
          <a href="{{ $crumb['url'] }}" class="inline-flex items-center text-sm font-medium {{ $themeClasses['link'] }}">
            @if ($loop->first)
              <svg class="w-4 h-4 mr-2.5 {{ $themeClasses['icon'] }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                  <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
              </svg>
            @endif
            {{ $crumb['name'] }}
          </a>
          <svg class="w-3 h-3 mx-1 {{ $themeClasses['separator'] }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/></svg>
        @else
          <span class="text-sm font-medium block max-w-[150px] md:max-w-none truncate {{ $themeClasses['current'] }}">{{ $crumb['name'] }}</span>
        @endif
      </li>
    @endforeach

  </ol>
</nav>
