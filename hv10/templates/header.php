<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- 
        Переменная $title Должна быть определена в файле, который
        использует данный шаблон.
     -->
    <title><?php echo $title; ?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">PHP CourseWork</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './index.php'; ?>">Главная</a>
                </li>
            </ul>

	<?php if (isset($_SESSION['is_auth']) && !$_SESSION['is_auth']): ?>

            <!-- 
                Блок ниже должен отображаться только в том случае, если пользователь не прошел аутентификацию.
                В противном случае, нужно отобразить кнопку "Выход".
            -->
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './login.php'; ?>">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './register.php'; ?>">Зарегистрироваться</a>
                </li>
            </ul>

	<?php else: ?>

		<?php if (2 == $_SESSION['is_auth']): ?>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './admin.posts.php'; ?>">Администрирование</a>
                </li>
            </ul>

		<?php endif; ?>

            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo './logout-controller.php'; ?>">Выход</a>
                </li>
            </ul>

	<?php endif; ?>

        </div>
    </div>
</nav>