<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $ingredient->name }}</title>
</head>
<body>
    <h1>Ингредиент: {{ $ingredient->name }}</h1>

    <p><a href="/ingredients">Все ингредиенты</a></p>
    <p>Единица измерения: {{ $ingredient->unit }}</p>

    <h2>Используется в блюдах</h2>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID блюда</th>
            <th>Название</th>
            <th>Количество ингредиента</th>
        </tr>

        @forelse ($ingredient->dishes as $dish)
            <tr>
                <td>{{ $dish->id }}</td>
                <td>
                    <a href="{{ url('/dishes/' . $dish->id) }}">
                        {{ $dish->name }}
                    </a>
                </td>
                <td>
                    {{ $dish->pivot->quantity }} {{ $ingredient->unit }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Ингредиент пока не используется</td>
            </tr>
        @endforelse
    </table>
</body>
</html>
