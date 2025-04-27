@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Brutalism') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium cursor-default border-2 shadow-[4px_4px_0_var(--color-blue)] dark:shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white dark:border-black">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium border-2 shadow-[4px_4px_0_var(--color-blue)] dark:shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white dark:border-black">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium border-2 shadow-[4px_4px_0_var(--color-blue)] dark:shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white dark:border-black">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium border-2 shadow-[4px_4px_0_var(--color-blue)] dark:shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white dark:border-black">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-center">
            <span class="relative z-0 inline-flex rtl:flex-row-reverse">
                {{-- Previous Page Link --}}
                @if (!$paginator->onFirstPage())
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                        class="h-10 w-10 font-semibold text-sm flex items-center justify-center hover:bg-(--color-blue) hover:text-white text-sm flex items-center justify-center hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white"
                        aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif

                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span
                                        class="h-10 w-10 mx-1 font-semibold text-sm flex items-center justify-center border-2 shadow-[4px_4px_0_var(--color-blue)] dark:shadow-[4px_4px_0_var(--color-blue)] hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white dark:border-white">{{ $page }}</span>
                                </span>
                            @elseif ($page == 1 || $page == $paginator->lastPage() || $page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() - 1)
                                <a href="{{ $url }}"
                                    class="h-10 w-10 mx-1 font-semibold hover:bg-(--color-blue) hover:text-white text-sm flex items-center justify-center hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white"
                                    aria-label="{{ __('', ['page' => $page]) }}">
                                    {{ $page }}
                                </a>
                            @elseif($page == $paginator->currentPage() + 2 || $page == $paginator->currentPage() - 2)
                                <span aria-disabled="true">
                                    <span
                                        class="h-10 w-10 font-semibold text-sm flex items-center justify-center hover:bg-(--color-blue) hover:text-white text-sm flex items-center justify-center hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white">...</span>
                                </span>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                        class="h-10 w-10 font-semibold text-sm flex items-center justify-center hover:bg-(--color-blue) hover:text-white text-sm flex items-center justify-center hover:shadow-[4px_4px_0_var(--color-red)] dark:hover:shadow-[4px_4px_0_var(--color-red)] text-black dark:text-white"
                        aria-label="{{ __('pagination.next') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                @endif
            </span>
        </div>
    </nav>
@endif