<?php

session_start();

$title = 'Главная страница';

require_once __DIR__ . '/includes/database-interface-simulator.php';
require __DIR__ . '/templates/header.php';

$posts = database_get_posts_list();

foreach ($posts as $id => $post):

?>

    <div class="container">
        <header class="card-header">
            <h4 class="mb-0 text-left">
                 <?php echo $post['header']; ?>
            </h4>
        </header>
        <main class="card-body">
            <div class="mb-3">
                 <?php echo $post['annotation']; ?>
            </div>
            <form action="posts.php?id=<?php echo $id; ?>" method="post">
                <button class="btn btn-primary" type="submit">Читать</button>
            </form>
        </main>
    </div>

<!-- Здесь будет смесь HTML-кода и PHP -->

<?php
endforeach;

require __DIR__ .'/templates/footer.php';