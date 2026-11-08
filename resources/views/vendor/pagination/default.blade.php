<form method="GET" action="{{ url('/dishes') }}"
      class="d-flex flex-wrap align-items-center gap-2 my-3">
    <label for="perpage" class="form-label mb-0">Записей на странице</label>

    <select name="perpage" id="perpage" class="form-select form-select-sm w-auto">
        @foreach ([2, 5, 10, 15] as $count)
            <option value="{{ $count }}" @selected($paginator->perPage() == $count)>
                {{ $count }}
            </option>
        @endforeach
    </select>

    <button type="submit" class="btn btn-sm btn-outline-primary">Показать</button>
</form>

@if ($paginator->hasPages())
    <nav aria-label="Страницы списка блюд">
        <ul class="pagination pagination-sm flex-wrap mb-2">
            @php
                $startLinks = [
                    'Первая' => $paginator->onFirstPage() ? null : $paginator->url(1),
                    'Назад' => $paginator->previousPageUrl(),
                ];

                $endLinks = [
                    'Вперёд' => $paginator->nextPageUrl(),
                    'Последняя' => $paginator->hasMorePages()
                        ? $paginator->url($paginator->lastPage())
                        : null,
                ];
            @endphp

            @foreach ($startLinks as $label => $url)
                @if ($url)
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">{{ $label }}</span>
                    </li>
                @endif
            @endforeach

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li class="page-item disabled">
                        <span class="page-link">{{ $element }}</span>
                    </li>
                @elseif (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link">{{ $page }}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @foreach ($endLinks as $label => $url)
                @if ($url)
                    <li class="page-item">
                        <a class="page-link" href="{{ $url }}">{{ $label }}</a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link">{{ $label }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
@endif

<p class="small text-muted">
    Страница {{ $paginator->currentPage() }} из {{ $paginator->lastPage() }}.
    Всего записей: {{ $paginator->total() }}.
</p>
