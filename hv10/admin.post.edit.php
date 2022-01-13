<?php

session_start();

require_once __DIR__ . '/includes/errors.php';
require_once __DIR__ . '/includes/database-interface-simulator.php';

$id;
$title;
$type;
$post_data;

if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$type = 1;
	if (!database_check_post($id)) {
		$id = database_get_count_posts() + 1;
		$type = 2;
	}
} else {
	$id = database_get_count_posts() + 1;
	$type = 2;
}

if (1 === $type) {
	$title = 'Редактирование статьи ' . $id;
	$start = 'Редактировать ';
	$post_data = database_get_post_data($id);
} else {
	$title = 'Создание статьи ' . $id;
	$start = 'Создать ';
}


require __DIR__ . '/templates/header.php';


?>

    <div class="container">
        <div class="card-header">
            <h5 class="mb-3">
                 <?php echo $start . ' '; ?>заголовок статьи<?php echo ' '  . $id; ?> :
            </h5>
        </div>
        <div class="card-body">
            <form action="includes/add_post.php" method="post">
                 <div class="d-grid">
                     <input type="text" name="header" <?php if (1 === $type) { echo 'placeholder="' . $post_data ['header'] .'"';} ?> required="required">
                 <div class="mb-3">
                 </div>
                 <div class="mb-3">
                     <button class="btn btn-primary" type="submit"><?php echo $start; ?></button>
                 </div>
            </form>
        </div>

        <div class="card-header">
            <h5 class="mb-3">
                 <?php echo $start . ' '; ?>текст статьи<?php echo ' '  . $id; ?> :
            </h5>
        </div>
        <div class="card-body">
            <form action="includes/add_post.php" method="post">
                 <div class="d-grid">
                     <input type="text" name="header" <?php if (1 === $type) { echo 'placeholder="' . $post_data ['content'] .'"';} ?> required="required">
                 <div class="mb-3">
                 </div>
                 <div class="mb-3">
                     <button class="btn btn-primary" type="submit"><?php echo $start; ?></button>
                 </div>
            </form>
        </div>

<?php if (1 === $type): ?>

        <div class="card-header">
            <h5 class="mb-3">
                 <?php echo $start . ' '; ?>комментарии к  статье<?php echo ' '  . $id; ?> :
            </h5>
        </div>
        <div class="card-body">
            <form action="includes/add_post.php" method="post">
                 <div class="d-grid">
                     <input type="text" name="header" <?php echo 'placeholder="' . $post_data ['comments'] .'"'; ?> required="required">
                 <div class="mb-3">
                 </div>
                 <div class="mb-3">
                     <button class="btn btn-primary" type="submit"><?php echo $start; ?></button>
                 </div>
            </form>
        </div>

<?php endif; ?>


    </div>



<?php require __DIR__ . '/templates/footer.php'; ?>