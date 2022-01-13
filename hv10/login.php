<?php

session_start();

require_once __DIR__ . '/includes/errors.php';

if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']) {
	header('Location: index.php');
}

$title = 'Автозирация';

require __DIR__ . '/templates/header.php';

?>

    <div class="container">
        <div class="row my-5 justify-content-center">
            <div class="col col-lg-4">
                <div class="card">
                    <header class="card-header">
                        <h4 class="mb-0 text-center">
                            Войдите в систему
                        </h4>
                    </header>
                    <main class="card-body">
                        <?php
                        if (has_error_message()):
                            show_error_message();
                        endif;
                        ?>
                        <form action="auth-controller.php" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Пароль</label>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary" type="submit">Войти</button>
                            </div>
                        </form>
                    </main>
                </div>
            </div>
        </div>
    </div>

<?php require __DIR__ . '/templates/footer.php'; ?>