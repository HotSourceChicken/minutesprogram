<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/meeting_info_style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>VOIMIN|議事録作成-会議情報入力</title>
    </head>
    <?php include "main_menu.html" ?>
    <body>
    <div class="margin_menu"></div>
    <div class="class_center">
        <div class="meeting_border">
            <form action="#" method="GET">
                <h1>会議情報入力フォーム</h1>
                <label for="meeting_name">会議名を入力：</label>
                <p><input type="text" name="meeting_name" size="40" maxlength="20" placeholder="" autofocus></p>
                <p>
                    <label for="meeting_date">日付：</label><input type="date" name="meeting_date" id="meeting_date" value="<?php echo date('Y-m-d'); ?>">
                    <label for="start_time">開始時刻：</label><input type="time" name="start_time" id="start_time">
                    <label for="end_time">終了時刻：</label><input type="time" name="end_time" id="end_time">
                </p>
                <label for="recorder">記録者：</label>
                <p><input type="text" name="recorder" id="recorder" size="40" maxlength="20" placeholder=""></p>
                <label for="participant">参加者：</label>
                <p><input type="text" name="participant" id="participant" size="80" maxlength="40" placeholder=""></p>
                <label for="place">会議室名：</label>
                <p><input type="text" name="place" id="place" size="40" maxlength="20" placeholder=""></p>
            </form>
        </div>
    </div>
    </body>
</html>