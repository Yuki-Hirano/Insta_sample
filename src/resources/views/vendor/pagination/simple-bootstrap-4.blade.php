@if ($paginator->hasPages())
    <ul class="uk-pagination uk-flex-center" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <div class="page-item disabled" aria-disabled="true">
                <span class="page-link"></span>
            </div>
        @else
            <div class="page-item">
                <a class="page-link uk-button uk-button-default" href="{{ $paginator->previousPageUrl() }}" rel="prev"><< 前へ</a>
            </div>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <div class="page-item">
                <a class="page-link uk-button uk-button-default" href="{{ $paginator->nextPageUrl() }}" rel="next">次へ >></a>
            </div>
        @else
            <div class="page-item disabled" aria-disabled="true">
                <span class="page-link"></span>
            </div>
        @endif
    </ul>
@endif
