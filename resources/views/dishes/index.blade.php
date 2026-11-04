<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Блюда</title>
</head>
<body>
    <h1>Список блюд</h1>

    <p>
        <a href="/categories">Категории</a> |
        <a href="/ingredients">Ингредиенты</a>
    </p>

    <p><a href="/dishes/create">Добавить блюдо</a></p>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Время приготовления, мин.</th>
            <th>Действия</th>
        </tr>

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
                    <a href="{{ url('/dishes/' . $dish->id . '/edit') }}">
                        Редактировать
                    </a>

                    <form
                        method="POST"
                        action="{{ url('/dishes/' . $dish->id) }}"
                        style="display: inline"
                        onsubmit="return confirm('Удалить блюдо и его состав?')"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit">Удалить</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Блюд пока нет</td>
            </tr>
        @endforelse
    </table>
</body>
</html>