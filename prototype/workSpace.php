<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- ハンバーガーメニュー -->
    <?php //include "hamberger.html"
    ?>
</head>

<body id="body">
    <?php
    //どのテンプレートを選んだのか判断
    $FilePath = "";
    //issetは中身が入っているかどうかの判断
    if (!isset($_POST['tmp'])) {
        $FilePath = "memo.html";
    } else {
        if ($_POST['tmp'] === "tmp1") {
            //$post = "";
            $FilePath = "template1.html";
        } elseif ($_POST['tmp'] === "tmp2") {
            $FilePath = "template2.html";
        } elseif ($_POST['tmp'] === "tmp3") {
            $FilePath = "template3.html";
        } elseif ($_POST['tmp'] === "tmp4") {
            $FilePath = "template4.html";
        }
    }
    ?>
    <!-- 各種設定 -->
    <div class="interface_wrapper">
        <label for="lang" id="lang">認識言語:</label>
        <select id="select_language" class="selector" onchange="updateCountry()">
            <option value="0">日本語</option>
            <option value="1">English</option>
            <option value="2">한국어</option>
            <option value="3">中文</option>
        </select>
        <select id="select_dialect" class="selector" onchange="updateLanguage()"></select>
        <span id="checkbox_hiragana_wrapper" class="selector">
    </div>
    <div id="log" class="log_wrapper">
        <div class="log_control_wrapper help_text">
            <div class="log_input_wrapper">
                <label for="checkbox_timestamp" id="time">時刻の記録:</label> <input type="checkbox" id="checkbox_timestamp" name="checkbox_timestamp" value="timestamp">
            </div>
            <div class="control_selector_wrapper">
                <span id="checkbox_realtime_wrapper" class="selector"></span>
                <label for="checkbox_realtime" id="realtime">リアルタイム認識:</label></a>
                <input type="checkbox" id="checkbox_realtime" name="checkbox_realtime" value="realtime" inputdisplay="none">
            </div>
        </div>

        <div>
            <input type="button" onClick="vr_function();" value="認識開始">
            <!-- これはなくていいかも　<input type="button" onClick="stop();" value="終了"> -->
            <input type="button" onclick="smaller()" value="-"></button>
            <input type="button" onclick="larger()" value="+"></button>
            <input type="button" onclick="dark()" value="ダークモード"></button>
            <input type="button" onclick="reset()" value="デフォルトカラー"></button>
        </div>

        <!-- result_logの内容をword形式で保存 -->
        <div style="text-align: left;">
            <input type="button" value="作成" onclick="downloadLogFile(this)">
        </div>

        <table border="1" id="table">
            <css>
                <tbody>
                    <tr>
                        <td valign="top">
                            <!-- 音声認識した内容 -->
                            <textarea id="result_log" class="result_log_area" style="width: 650px; height: 300px;"></textarea>
                            <!-- リアルタイム -->
                            <textarea id="result_text" cols="70" rows="10" style="width: 650px; height: 100px;"></textarea>
                            <br>
                            <!-- 待機中、認識中などを表示 -->
                            <textarea id="status" cols="70" rows="1" style="width: 650px;"></textarea>
                            <br>
                        </td>
                        <td valign="top">
                            <div>
                                <!-- ここにchoseTemplate.phpで選んだテンプレートが表示される -->
                                <iframe label for="テンプレート" src=<?php echo $FilePath; ?> style="width: 650px; height: 720px; align-items: right;"></iframe>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </css>
        </table>
        <!-- メインの動き（音声認識その他諸々） -->
        <script type="text/javascript" src="main.js"></script>
</body>

</html>