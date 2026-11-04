<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Категории блюд</title>
</head>
<body>
    <h1>Категории блюд</h1>

    <p>
        <a href="/dishes">Блюда</a> |
        <a href="/ingredients">Ингредиенты</a>
    </p>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Наименование</th>
        </tr>

        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>
                    <a href="{{ url('/categories/' . $category->id) }}">
                        {{ $category->name }}
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Категорий пока нет</td>
            </tr>
        @endforelse
    </table>
</body>
</html>