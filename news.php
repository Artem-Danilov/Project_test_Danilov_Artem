<?php
require_once 'config/datebase.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style_news.css">
    <link rel="icon" type="image/png" sizes="256x256" href="img/icon/icon_logo.png">
    <title>Новости</title>
</head>
<body>
		<div class="container">
			<a href="index.php" class="back_button">Назад</a>

			<h1 class="title">Новости</h1>

			<div class="news_layout">
					<?php 
					$news = mysqli_query($connect, "SELECT * FROM `news`");
						if (!$news) {
							die("Ошибка выполнения запроса: " . mysqli_error($connect));
						}
						while ($new = mysqli_fetch_assoc($news)) {
						?>
								<div class="news_card" style="background-image: url('<?= $new['image'] ?>');">
									<div class="news_content">
										<h2><?= $new['name'] ?></h2>
										<p><?= $new['description'] ?></p>
										<span class="date"><?= $new['date'] ?></span>
									</div>
  							</div>
					<?php
						}
					?>
				</div>
		</div>
</body>
</html>
