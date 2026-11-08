@extends('layout')

@section('title', 'Список блюд')

@section('content')
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <h1 class="h3 mb-0">Список блюд</h1>

        @auth
            <a href="{{ url('/dishes/create') }}" class="btn btn-primary">
                Добавить блюдо
            </a>
        @endauth
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Название</th>
                <th scope="col">Категория</th>
                <th scope="col">Время, мин.</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($dishes as $dish)
                <tr>
                    <td>{{ $dish->id }}</td>
                    <td>
                        <a href="{{ url('/dishes/' . $dish->id) }}">
                            {{ $dish->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url('/categories/' . $dish->category->id) }}">
                            {{ $dish->category->name }}
                        </a>
                    </td>
                    <td>{{ $dish->cooking_time }}</td>
                    <td>
                        <div class="d-flex flex-wrap gap-2">
                            @can('edit-dish')
                                <a href="{{ url('/dishes/' . $dish->id . '/edit') }}"
                                   class="btn btn-sm btn-outline-primary">
                                    Редактировать
                                </a>
                            @endcan

                            @can('delete-dish')
                                <form method="POST"
                                      action="{{ url('/dishes/' . $dish->id) }}"
                                      onsubmit="return confirm('Удалить блюдо и его состав?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Удалить
                                    </button>
                                </form>
                            @endcan

                            @cannot('edit-dish')
                                @cannot('delete-dish')
                                    <span class="text-muted">—</span>
                                @endcannot
                            @endcannot
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">Блюд пока нет</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    {{ $dishes->links('vendor.pagination.default') }}
@endsection
