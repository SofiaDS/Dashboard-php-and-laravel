@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" >
        <div>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span aria-hidden="true">
                                <img src='{{asset('img/rewind.png')}}'class='floatL shadow'>
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="{{ __('pagination.previous') }}">
                            <img src='{{asset('img/rewind.png')}}'class='floatL shadow'>
                        </a>
                    @endif
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="{{ __('pagination.next') }}">
                        <img src='{{asset('img/rewind2.png')}}' class='floatR shadow'>
                    </a>
                    @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span aria-hidden="true">
                            <img src='{{asset('img/rewind2.png')}}'class='floatR shadow'>
                        </span>
                    </span>
                    @endif
        </div>
</div>
</div>
</nav>
@endif
