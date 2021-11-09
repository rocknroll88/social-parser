<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>парсер групп</title>
</head>
<body>
<form method="get" action="core/parse.php">
    <p>Категория: <input name="cat" type="text" value="80"></p>
    <p>Подписчиков от: <input name="min" type="text" value="500"></p>
    <p>Подписчиков до: <input name="max" type="text" value="12000000"></p>
    <p>Сколько парсить: <input name="count" type="text" value="200"></p>

    <label for="period">Период</label>
    <p><input name="period" type="radio" value="day">День</p>
    <p><input name="period" type="radio" value="week">Неделя</p>
    <p><input name="period" type="radio" value="month">Месяц</p>

    <label for="type">Тип</label>
    <p><input name="type" type="radio" value="1">Паблики</p>
    <p><input name="type" type="radio" value="2">Группы</p>
    <p><input name="type" type="radio" value="3">Все</p>

    <label for="status">Статус</label>
    <p><input name="status" type="radio" value="-1">Все группы</p>
    <p><input name="status" type="radio" value="1">Открытые</p>
    <p><input name="status" type="radio" value="2">Закрытые</p>

    <p><input name="verified" type="checkbox" value="2">Только официальные</p>

    <button>Парсить</button>
</form>
</body>
</html>