<?php

session_start();

$title = 'Администрирование';

require_once __DIR__ . '/includes/database-interface-simulator.php';
require __DIR__ . '/templates/header.php';

$posts = database_get_posts_list();

?>

    <div class="container">
        <header class="card-header">
            <h4 class="mb-0 text-left">
		Список статей:                 
            </h4>
        </header>
        <main class="card-body">

<?php foreach ($posts as $id => $post): ?>

            <div class="mb-3">

            <form action="admin.post.edit.php?id=<?php echo $id; ?>" method="post">
                 <?php echo $post['header']; ?>
                <button class="btn btn-primary" type="submit">Редактировать</button>
            </form>
            </div>

<?php endforeach;  ?>

        <div class="card-header">

            <form action="admin.post.edit.php" method="post">
            	<h4 class="mb-0 text-left">
			Добавить новую статью:
                	<button class="btn btn-primary" type="submit">Добавить</button>
		</h4>
            </form>


        </div>
        </main>
    </div>


<?php require __DIR__ .'/templates/footer.php';