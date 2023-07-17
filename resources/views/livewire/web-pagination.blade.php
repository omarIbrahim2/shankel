<ul>
    @if ($paginator->hasPages())

        @if ($paginator->onFirstPage())
            <li>{{ trans('pagination.previous') }}</li>
        @else
            <li style="cursor: pointer" wire:click="previousPage">
                {{ trans('pagination.previous') }}
            </li>
        @endif

        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" class="m-3" style="cursor: pointer"
                            wire:click="gotoPage({{ $page }})">{{ $page }}</li>
                    @else
                        <li style="cursor: pointer" class="m-3" wire:click="gotoPage({{ $page }})">
                            {{ $page }}</li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li style="cursor: pointer" wire:click="nextPage ">
                {{ trans('pagination.next') }}
            </li>
        @else
            <li>
                {{ trans('pagination.next') }}
            </li>
        @endif

    @endif
</ul>
