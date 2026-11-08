<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Вход в систему</title>
</head>
<body>
<h1>Вход в систему</h1>

<p><a href="/dishes">Список блюд</a></p>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

@auth
    <p>Вы вошли как {{ auth()->user()->name }}.</p>

    <form method="POST" action="{{ url('/logout') }}">
        @csrf

        <button type="submit">Выйти</button>
    </form>
@else
    <form method="POST" action="{{ url('/login') }}" novalidate>
        @csrf

        <p>
            <label for="email">Электронная почта</label><br>

            <input
                type="email"
                name="email"
                id="email"
                value="{{ old('email') }}"
                autocomplete="username"
                required
            >

            @error('email')
            <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <p>
            <label for="password">Пароль</label><br>

            <input
                type="password"
                name="password"
                id="password"
                autocomplete="current-password"
                required
            >

            @error('password')
            <br><span style="color: red">{{ $message }}</span>
            @enderror
        </p>

        <button type="submit">Войти</button>
    </form>
@endauth
</body>
</html>
