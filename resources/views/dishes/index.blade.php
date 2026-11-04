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

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Время приготовления, мин.</th>
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
            </tr>
        @empty
            <tr>
                <td colspan="4">Блюд пока нет</td>
            </tr>
        @endforelse
    </table>
</body>
</html>