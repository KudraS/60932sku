<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Доступ запрещён</title>
</head>
<body>
<h1>Доступ запрещён</h1>

<p style="color: red">
    {{ $exception->getMessage() ?: 'У вас недостаточно прав.' }}
</p>

<p><a href="/dishes">Вернуться к списку блюд</a></p>
<p><a href="/login">Учётная запись</a></p>
</body>
</html>
