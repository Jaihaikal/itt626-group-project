@if ($paginator->hasPages())
    <div class=" py-3 px-3 d-flex align-items-center">
        {{-- <p class="font-weight-semibold mb-0 text-dark text-sm">
            Page {{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}
        </p> --}}
        <div class="ms-auto d-flex align-items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <button class="btn btn-sm btn-white mb-0 me-2" disabled>Previous</button>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="btn btn-sm btn-primary mb-0 me-2">Previous</a>
            @endif

            {{-- Pagination Elements --}}
            <div class="d-flex align-items-center">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span class="btn btn-sm btn-white mb-0 me-2">{{ $element }}</span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="btn btn-sm btn-primary mb-0 me-2">{{ $page }}</span>
                            @else
                                <a href="{{ $url }}" class="btn btn-sm btn-white mb-0 me-2">{{ $page }}</a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="btn btn-sm btn-primary mb-0 ms-2">Next</a>
            @else
                <button class="btn btn-sm btn-white mb-0 ms-2" disabled>Next</button>
            @endif
        </div>
    </div>
@endif
