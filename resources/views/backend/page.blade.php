@if ($paginator->hasPages())
    <div class="layui-box layui-laypage layui-laypage-default">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="layui-laypage-prev layui-disabled" href="javascript:;">上一页</a>
        @else
            <a class="layui-laypage-prev" href="{{ $paginator->previousPageUrl() }}">上一页</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="layui-laypage-curr">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="layui-laypage-curr">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="layui-laypage-prev" href="{{ $paginator->nextPageUrl() }}">下一页</a>
        @else
            <a class="layui-laypage-prev layui-disabled" href="javascript:;">下一页</a>
        @endif
    </div>
@endif