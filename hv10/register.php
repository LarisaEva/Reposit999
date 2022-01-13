<?php

session_start();

require_once __DIR__ . '/includes/errors.php';

if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) {
	header('Location: index.php');
}

$title = 'Регистрация';

require __DIR__ . '/templates/header.php';

?>

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col col-lg-4">
                <div class="card">
                    <header class="card-header">
                        <h4 class="mb-0 text-center">
                            Регистрация
                        </h4>
                    </header>
                    <main class="card-body">
                        <?php
                        if (has_error_message()):
                            show_error_message();
                        endif;
                        ?>
                        <form action="includes/reg-controller.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">
                                    E-mail
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">
                                    Пароль
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">
                                    Имя
                                </label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-success" type="submit">Зарегистрироваться</button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/templates/footer.php'; ?>