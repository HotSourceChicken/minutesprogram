<html>

<head>
    <mate charset="UTF-8">
</head>

<body>
    <h1>テンプレートを選んでください</h1><br>
    *テンプレートを使用しない場合は何も選択せず、作成をクリックしてください。<br>
    メモが用意されます。
    <css>
        <style>
            .submit {
                text-align: right;
            }
        </style>

        <!-- テンプレート選択 -->
        <table border="1">
            <tr>
                <td>
                    <div>
                        <!-- テンプレート1 -->
                        <img src="\image\template1.jpg">
                    </div>
                </td>
                <td>
                    <div>
                        <!-- テンプレート2 -->
                        <img src="\image\template2.jpg">
                    </div>
                </td>
                <td>
                    <div>
                        <!-- テンプレート3 -->
                        <img src="\image\template3.jpg">
                    </div>
                </td>
                <td>
                    <div>
                        <!-- テンプレート4 -->
                        <img src="\image\template4.jpg">
                    </div>
                </td>
            </tr>

            <!-- 選択ボタン -->
            <form method="post" action="workSpace.php">
                <tr align="center">
                    <td>
                        <input type="radio" name="tmp" value="tmp1">
                    </td>
                    <td>
                        <input type="radio" name="tmp" value="tmp2">
                    </td>
                    <td>
                        <input type="radio" name="tmp" value="tmp3">
                    </td>
                    <td>
                        <input type="radio" name="tmp" value="tmp4">
                    </td>
                </tr>
                <tr>

                    <!-- 送信ボタン -->
                    <td colspan="4" class="submit">
                        <input type="submit" value="作成">
                    </td>
                </tr>
            </form>
        </table>
    </css>
</body>

</html>