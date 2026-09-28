@if ($paginator->hasPages())
  <nav role="navigation" aria-label="Pagination Navigation" class="admin-pagination-wrapper">
    <div class="admin-pagination-info">
      Showing <strong>{{ $paginator->firstItem() }}</strong> to <strong>{{ $paginator->lastItem() }}</strong> of <strong>{{ $paginator->total() }}</strong> results
    </div>

    <ul class="admin-pagination-links">
      {{-- Previous Page Link --}}
      @if ($paginator->onFirstPage())
        <li class="admin-page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
          <span class="admin-page-link disabled" aria-hidden="true">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right: 3px;">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Prev
          </span>
        </li>
      @else
        <li class="admin-page-item">
          <a class="admin-page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right: 3px;">
              <polyline points="15 18 9 12 15 6"></polyline>
            </svg>
            Prev
          </a>
        </li>
      @endif

      {{-- Pagination Elements --}}
      @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
          <li class="admin-page-item" aria-disabled="true"><span class="admin-page-link disabled">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
          @foreach ($element as $page => $url)
            @if ($page == $paginator->currentPage())
              <li class="admin-page-item" aria-current="page"><span class="admin-page-link active">{{ $page }}</span></li>
            @else
              <li class="admin-page-item"><a class="admin-page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach

      {{-- Next Page Link --}}
      @if ($paginator->hasMorePages())
        <li class="admin-page-item">
          <a class="admin-page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
            Next
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left: 3px;">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </a>
        </li>
      @else
        <li class="admin-page-item" aria-disabled="true" aria-label="@lang('pagination.next')">
          <span class="admin-page-link disabled" aria-hidden="true">
            Next
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-left: 3px;">
              <polyline points="9 18 15 12 9 6"></polyline>
            </svg>
          </span>
        </li>
      @endif
    </ul>
  </nav>
@endif
