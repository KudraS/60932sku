<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Кулинарный справочник')</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
<nav class="navbar bg-dark" data-bs-theme="dark">
    <div class="container d-flex flex-wrap gap-3">
        <a class="navbar-brand" href="{{ url('/dishes') }}">
            Кулинарный справочник
        </a>

        <div class="d-flex flex-wrap gap-3">
            <a class="nav-link text-white" href="{{ url('/dishes') }}">Блюда</a>
            <a class="nav-link text-white" href="{{ url('/categories') }}">Категории</a>
            <a class="nav-link text-white" href="{{ url('/ingredients') }}">Ингредиенты</a>

            @auth
                <a class="nav-link text-white" href="{{ route('login') }}">Учётная запись</a>
            @else
                <a class="nav-link text-white" href="{{ route('login') }}">Войти</a>
            @endauth
        </div>
    </div>
</nav>

<main class="container py-4">
    @if (session('success'))
        <div class="alert alert-success" role="status">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</main>
</body>
</html>
