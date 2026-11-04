<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $dish->name }}</title>
</head>
<body>
    <h1>{{ $dish->name }}</h1>

    <p><a href="/dishes">Все блюда</a></p>

    <p>
        Категория:
        <a href="{{ url('/categories/' . $dish->category->id) }}">
            {{ $dish->category->name }}
        </a>
    </p>

    <p>Время приготовления: {{ $dish->cooking_time }} мин.</p>

    <h2>Способ приготовления</h2>
    <p>{{ $dish->cooking_method }}</p>

    <h2>Ингредиенты</h2>

    <table border="1" cellpadding="5">
        <tr>
            <th>Название</th>
            <th>Количество</th>
            <th>Единица измерения</th>
        </tr>

        @forelse ($dish->ingredients as $ingredient)
            <tr>
                <td>
                    <a href="{{ url('/ingredients/' . $ingredient->id) }}">
                        {{ $ingredient->name }}
                    </a>
                </td>
                <td>{{ $ingredient->pivot->quantity }}</td>
                <td>{{ $ingredient->unit }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Ингредиенты пока не добавлены</td>
            </tr>
        @endforelse
    </table>
</body>
</html>