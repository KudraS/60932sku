<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $category->name }}</title>
</head>
<body>
    <h1>Категория: {{ $category->name }}</h1>

    <p><a href="/categories">Все категории</a></p>

    <h2>Блюда категории</h2>

    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Время приготовления, мин.</th>
        </tr>

        @forelse ($category->dishes as $dish)
            <tr>
                <td>{{ $dish->id }}</td>
                <td>
                    <a href="{{ url('/dishes/' . $dish->id) }}">
                        {{ $dish->name }}
                    </a>
                </td>
                <td>{{ $dish->cooking_time }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3">В этой категории пока нет блюд</td>
            </tr>
        @endforelse
    </table>
</body>
</html>