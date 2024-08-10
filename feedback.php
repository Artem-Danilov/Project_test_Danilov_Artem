<?php
require_once 'config/datebase.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обратная связь</title>
    <link rel="stylesheet" href="css/styles_feedback.css">
    <link rel="icon" type="imges/png" sizes="256x256" href="img/icon/icon_logo.png">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.7/jquery.inputmask.min.js"></script>
</head>
<body>
    <a href="index.php" class="back_button">Назад</a>
    <div class="wrapper">
        <div class="container">
            <form id="contactForm" action="vender/submit_form.php" method="post">
                <h2>Обратная связь</h2>
                <div class="form_group">
                    <label for="name">ФИО:</label>
                    <input type="text" id="name" name="name" required placeholder="ФИО">
                </div>
                <div class="form_group">
                    <label for="address">Адрес:</label>
                    <input type="text" id="address" name="address" required placeholder="Адрес">
                </div>
                <div class="form_group">
                    <label for="phone">Телефон:</label>
                    <input type="text" id="phone" name="phone" required placeholder="+7 (999) 999 - 99 - 99">
                </div>
                <div class="form_group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required placeholder="Email">
                </div>
                <button type="submit">Отправить</button>
            </form>
        </div>

        <div class="table_container">
            <table id="feedbackTable" style="display: none;">
                <tr>
                    <th>ID</th>
                    <th>ФИО</th>
                    <th>Адрес</th>
                    <th>Телефон</th>
                    <th>E-mail</th>
                </tr>

                <?php 
                $records = mysqli_query($connect, "SELECT * FROM `feedback`");
                $records = mysqli_fetch_all($records);
                foreach ($records as $record) {
                ?>
                <tr>
                    <td><?= $record[0] ?></td>
                    <td><input type="text" name="name[]" value="<?= $record[1] ?>" readonly></td>
                    <td><input type="text" name="address[]" value="<?= $record[2] ?>" readonly></td>
                    <td><input type="text" name="phone[]" value="<?= $record[3] ?>" readonly></td>
                    <td><input type="text" name="email[]" value="<?= $record[4] ?>" readonly></td>
                </tr>
                <?php
                }
                ?>
            </table>
            <div class="button_container">
                <button id="hideTableButton" style="display:none;">Скрыть таблицу</button>
                <button id="showTableButton">Показать таблицу</button>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>
</body>
</html>
