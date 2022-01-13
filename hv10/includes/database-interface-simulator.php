<?php

function database_get_admins(): array {
	$admins = [
                   ['email' => 'admin@info',
                    'password' => '81dc9bdb52d04dc20036dbd8313ed055']  // 1234
	];
	return $admins;
}

function database_get_users(): array {
	$users = [
                   ['email' => 'user1@info',
                    'password' => '81dc9bdb52d04dc20036dbd8313ed055'], // 1234
                   ['email' => 'user2@info',
                    'password' => '81dc9bdb52d04dc20036dbd8313ed055']  // 1234
	];
	return $users;
}

function database_check_post(int $id): bool {
	if ($id > 0 && $id <= database_get_count_posts()) {
		return true;
	}
	return false;
}

function database_get_posts_list(): array {
	$elems = get_post_elems();
	$count = database_get_count_posts();
	for ($i = 1; $i <= $count; $i++) {
		$result[$i] = database_get_post_data($i);
	}
	return $result;
}

function database_get_post_data(int $id): array {
	$elems = get_post_elems();
	foreach ($elems as $key => $elem) {
		$result[$key] = $elem . $id . PHP_EOL;
	}
	return $result;
}

function get_post_elems(): array {
	$elems = ['header' => 'Заголовок статьи ',
                  'annotation' => 'Здесь будет краткое содержание статьи ',
		  'content' => 'Здесь будет текст статьи ',
		  'comments' => 'Здесь будут комментарии к статье '];
	return $elems;
}

function database_get_count_posts(): int {
	return 10;
}
?>