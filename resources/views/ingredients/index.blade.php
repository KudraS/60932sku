<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ингредиенты</title>
</head>
<body>
    <h1>Список ингредиентов</h1>

    <p>
        <a href="/categories">Категории</a> |
        <a href="/dishes">Блюда</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Наименование</th>
            <th>Единица измерения</th>
        </tr>

        @forelse ($ingredients as $ingredient)
            <tr>
                <td>{{ $ingredient->id }}</td>
                <td>
                    <a href="{{ url('/ingredients/' . $ingredient->id) }}">
                        {{ $ingredient->name }}
                    </a>
                </td>
                <td>{{ $ingredient->unit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Ингредиентов пока нет</td>
            </tr>
        @endforelse
    </table>
</body>
</html>