<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/database-interface-simulator.php';

$id = $_GET['id'];

if (!database_check_post($id)) {
	http_response_code(404);
	exit;
}

$title = 'Статья ' . $id;

require __DIR__ . '/templates/header.php';

$post_data = database_get_post_data($id);
?>

    <div class="container">
        <div class="card-body">
            <h4 class="mb-3">
                 <?php echo $post_data ['header']; ?>
            </h4>
        </div>
        <div class="card-body">
            <div class="mb-3">
                 <?php echo $post_data ['content']; ?>
            </div>
        </div>
        <div class="card-header">
            <h5 class="mb-3">
                 Комментарии:
            </h5>
        </div>
        <div class="card-body">
            <div class="mb-3">
                 <?php echo $post_data ['comments']; ?>
            </div>
        </div>

<?php if (isset($_SESSION['is_auth']) && $_SESSION['is_auth']): ?>

        <div class="card-header">
            <h5 class="mb-3">
                 Добавить комментарий:
            </h5>
        </div>
        <div class="card-body">
            <form action="includes/add_comment.php" method="post">
                 <div class="d-grid">
                     <input type="text" name="comment" placeholder="Напишите комментарий" required="required">
                 <div class="mb-3">
                 </div>
                 <div class="mb-3">
                     <button class="btn btn-primary" type="submit">Добавить</button>
                 </div>
            </form>
        </div>

<?php endif; ?>

    </div>



<?php require __DIR__ . '/templates/footer.php'; ?>