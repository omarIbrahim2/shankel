
@if ($paginator->hasPages())

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a href="#" class="btn disabled pagination-back pull-left">{{ trans('pagination.previous') }}</a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">{{ trans('pagination.previous') }}</a>
            @endif

            <ul class="pages">

                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li style="cursor: pointer" class="disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li style="cursor: pointer" class="active">{{ $page }}</li>
                            @else
                              
                                <li style="cursor: pointer"><a href="{{$url}}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </ul>


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next pull-right">{{ trans('pagination.next') }}</a>
            @else
                <a href="#" class="btn disabled pagination-next pull-right">{{ trans('pagination.next') }}</a>
            @endif

@endif
