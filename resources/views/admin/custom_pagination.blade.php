@if ($paginator->hasPages())
<div class="pagination-responsive "> 
    <ul class="pagination justify-content-end mt-3">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <span class="page-link border border-dark fw-bold text-dark" aria-hidden="true">&laquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link text-dark border border-dark" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous">previous</a>
            </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item ">
                <a class="page-link text-dark border border-dark" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next">next</a>
            </li>
        @else
            <li class="page-item disabled">
                <span class="page-link text-dark border border-dark  fw-bold" aria-hidden="true">&raquo;</span>
            </li>
        @endif
    </ul>
</div>

@endif
