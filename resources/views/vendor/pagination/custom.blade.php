
@if ($paginator->hasPages())
        <ul class="pagination pagination-primary m-b-0 d-flex justify-content-center">

        @if ($paginator->onFirstPage())
        @else
                <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev"  class="page-link" ><i class="zmdi zmdi-arrow-left"></i></a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a class="page-link" href="javascript:void(0);">{{ $page }}</a></li>
                    @else
                            <li class="page-item"><a href="{{ $url }}" class="page-link" href="javascript:void(0);">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasPages())
                <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link" href="javascript:void(0);"><i class="zmdi zmdi-arrow-right"></i></a></li>
        @else
        @endif
        </ul>

@endif