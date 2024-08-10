<?php
require_once 'config/datebase.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/styles.css">
		<link rel="icon" type="imges/png" sizes="256x256" href="img/icon/icon_logo.png">
    <title>Главная страница</title>
</head>
<body>

		<h1>Последнии новости</h1>

		<div class="news_container">
		<?php
		$news_query = mysqli_query($connect, "SELECT * FROM `news` ORDER BY `id` DESC LIMIT 3");
		if (!$news_query) {
			die("Ошибка выполнения запроса: " . mysqli_error($connect));
		}

		while ($news_item = mysqli_fetch_assoc($news_query)) {
		$first_sentence = explode('.', $news_item['description'])[0] . '.';
		?>
				<div class="news_card">
					<img src="<?= $news_item['image'] ?>" alt="<?= $news_item['name'] ?>" class="news_image">
						<div class="news_content">
							<h3><?= $news_item['name'] ?></h3>
							<p><?= $first_sentence ?></p>
							<p class="news_date">Дата публикации: <?= $news_item['date'] ?></p>
						</div>
				</div>
			<?php
		}
	?>
	</div>


		<div class="links">
			<a href="news.php" class="btn">Все новости</a>
			<a href="feedback.php" class="btn">Обратная связь</a>
		</div>

</body>
</html>
