<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/setting_environmental_style.css">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/setting_environmental.js"></script>
        <title>VOIMIN|議事録作成-設定</title>
    </head>
    <?php include "main_menu.html" ?>
    <body> 
    <div class="margin_menu"></div>
        <div class="left">
            <div>
                <div class="main">
                    <div id="center"><h1>環境設定</h1></div>
                    <form action="#" method="GET">
                        <p>▹音声言語（会議で話す言語）
                            <span id="right-text"><select name="language" id="language">
                                <option value="jp" selected>日本語</option>
                                <option value="en">英語</option>
                                <option value="ch">中国語</option>
                                <option value="ko">韓国語</option>
                            </select></span>
                        </p>

                        <p>▹音声テキストの翻訳言語
                            <span id="right-text"><select name="translate" id="translate">
                                <option value="jp" selected>日本語</option>
                                <option value="en">英語</option>
                                <option value="ch">中国語</option>
                                <option value="ko">韓国語</option>
                            </select></span>
                        </p>

                        <p>▹テキストの背景色
                            <span id="right-text"><select name="bg-color" id="bg-color">
                                <option value="white">ホワイト</option>
                                <option value="black">ブラック</option>
                            </select></span>
                        </p>

                        <p>▹テキストサイズ
                            <span id="right-text"><select name="text-size" id="text-size">
                                <option value="10px">10px</option>
                                <option value="20px">20px</option>
                            </select></span>
                        </p>

                        <p>▹行番号を表示する<span id="right-text"><input type="checkbox" name="line_num" value="line_num"></span></p>
                        <div id="button"><input type="reset" name="reset" value="リセット" /><button type="submit" name="submit" value="設定を保存">設定を保存</button></div>
                    </form>
                </div>

                <div class="main">
                    <div id="center"><h1>音声データ設定</h1></div>
                    <form action="#" method="GET">
                        <p>▹録音した音声データを保存する<span id="right-text"><input type="checkbox" name="voice_text" value="voice_text" checked></span></p>

                        <p>▹テキストデータを保存する<span id="right-text"><input type="checkbox" name="text_data" value="text_data" checked></span></p>

                        <p>▹データの保存期間の設定
                            <span id="right-text"><select name="save-time" id="save-time">
                                <option value="1hour">1時間</option>
                                <option value="2hour">2時間</option>
                                <option value="3hour">3時間</option>
                                <option value="5hour">5時間</option>
                                <option value="12hour">12時間</option>
                                <option value="24hour">24時間</option>
                            </select></span>
                        </p>

                        <div id="button"><input type="reset" name="reset" value="リセット" /><button type="submit" name="submit" value="設定を保存">設定を保存</button></div>
                    </form>
                </div>
            </div>
            <div class="main2">
                <div id="center"><h1>文字カラー詳細設定設定(最大30人)</h1></div>
                <table id="color_table">
                    <?php 
                    $color_num = 1;
                    for($i=0;$i<$color_num;$i++){    //設定する人数をiへ
                        $j = $i + 1;
                        print '<tr><th>'.$j.'人目</th>';
                        print '<th><input type="color" value="#000" name="clr'. $i.'"/></th>'; //colorピッカー表示
                        
                    } ?>
                    <tr>
                    <th>設定人数</th>
                    <th>
                        <span id="button_min"><button type="submit" name="min" value="-" id="btnDown">ー</button></span>
                        <?php $color_num = '<span id="counter">'. $color_num. '</span>'?><?php print $color_num ?>
                        <span id="button_plus"><button type="submit" name="plus" value="+" id="btnAdd">＋</button></span>
                    </th>
                    </tr>
                </table>
            </div>
        </div>
        
    </body>
</html>