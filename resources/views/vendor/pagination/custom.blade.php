@if ($paginator->hasPages())
<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
        <li class="disabled page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
            <a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a>
        </li>
        @else
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="far fa-long-arrow-left"></i></a>
        </li>
        @endif
        <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-left"></i></a></li>
        <li class="page-item active"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#"><i class="far fa-long-arrow-right"></i></a></li>
    </ul>
</nav>
@endif