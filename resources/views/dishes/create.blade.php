<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление блюда</title>
</head>
<body>
    <h1>Добавление блюда</h1>

    <p><a href="/dishes">Все блюда</a></p>

    <form method="POST" action="/dishes" novalidate>
        @csrf

        <p>
            <label for="name">Название блюда</label><br>
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
            >
            @error('name')
                <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="category_id">Категория</label><br>
            <select id="category_id" name="category_id">
                <option value="">Выберите категорию</option>

                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        @selected(old('category_id') == $category->id)
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="cooking_method">Способ приготовления</label><br>
            <textarea
                id="cooking_method"
                name="cooking_method"
                rows="5"
                cols="50"
            >{{ old('cooking_method') }}</textarea>
            @error('cooking_method')
                <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="cooking_time">Время приготовления, мин.</label><br>
            <input
                id="cooking_time"
                type="number"
                name="cooking_time"
                value="{{ old('cooking_time') }}"
            >
            @error('cooking_time')
                <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Добавить блюдо</button>
    </form>
</body>
</html>