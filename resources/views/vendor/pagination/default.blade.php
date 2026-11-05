<form method="GET" action="{{ url('/dishes') }}" style="margin-top: 20px">
    <label for="perpage">Записей на странице:</label>

    <select name="perpage" id="perpage">
        @foreach ([2, 5, 10, 15] as $count)
            <option
                value="{{ $count }}"
                @selected($paginator->perPage() == $count)
            >
                {{ $count }}
            </option>
        @endforeach
    </select>

    <button type="submit">Показать</button>
</form>

@if ($paginator->hasPages())
    <nav style="margin-top: 20px">
        @if ($paginator->onFirstPage())
            <span>Первая | Назад</span>
        @else
            <a href="{{ $paginator->url(1) }}">Первая</a> |
            <a href="{{ $paginator->previousPageUrl() }}">Назад</a>
        @endif

        |

        @foreach ($elements as $element)
            @if (is_string($element))
                <span>{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <strong style="margin: 0 5px">{{ $page }}</strong>
                    @else
                        <a href="{{ $url }}" style="margin: 0 5px">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        |

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}">Вперёд</a> |
            <a href="{{ $paginator->url($paginator->lastPage()) }}">
                Последняя
            </a>
        @else
            <span>Вперёд | Последняя</span>
        @endif
    </nav>
@endif

<p>
    Страница {{ $paginator->currentPage() }}
    из {{ $paginator->lastPage() }}.
    Всего записей: {{ $paginator->total() }}.
</p>
