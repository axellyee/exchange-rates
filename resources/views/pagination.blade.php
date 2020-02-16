@if ($paginator->hasPages())
    <nav class="mt-4 bg-blue-800 rounded flex justify-center overflow-hidden">
        <ul class="inline-flex leading-loose h-8">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="px-4 text-blue-200 text-black flex items-center text-sm" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="flex">
                    <a href="{{ $paginator->previousPageUrl() }}" class="border-r border-blue-600 px-4 text-blue-200 text-black flex items-center text-sm bg-blue-700 hover:bg-blue-600" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="flex" aria-disabled="true"><span class="px-4 bg-blue-700 hover:bg-blue-600 border-blue-600 flex items-center text-sm font-bold">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="flex"><span aria-current="page" class="px-4 bg-white text-black border-blue-600 flex items-center text-sm font-bold">{{ $page }}</span></li>
                        @else
                            <li class="flex"><a href="{{ $url }}" class="border-r border-blue-600 px-4 bg-blue-700 hover:bg-blue-600 border-blue-600 flex items-center text-sm font-bold">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="flex">
                    <a href="{{ $paginator->nextPageUrl() }}" class="px-4 text-blue-200 text-black flex items-center text-sm bg-blue-700 hover:bg-blue-600" rel="prev" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="flex px-4 text-blue-200 text-black flex items-center text-sm" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
