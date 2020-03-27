<html>
    <head>
        <title>測試表單</title>
    </head>
    <body>
        <h2>新增文章</h2>
        <form method="POST" action="../controller/save_article.php">
            請選擇上架日期：
            <input name="date" type="date" >
            <br/>
            文章標題：<input type="text" name="articletitle" style="width: 300px;"><br>
            文章類別：
            <select name="category"style="height:30px; font-size: 14px;"/>
                <option value="">請選擇</option>
                <option value="1">健康</option>
                <option value="2">活動</option>
                <option value="3">食譜</option>
            </select><br>

            作者：
            <!----資料庫取出作者名稱資訊---->
            <?php ;
            include "../controller/db.php";
            $sql = "SELECT  *  FROM author ";
            $val = $conn->query($sql)->fetch_all(1);
            ?>

            <select name="author" style="height:30px; font-size: 14px;"/>
            <?php
            //迴圈取出陣列中指定資料庫欄位塞入想顯示的地方
                foreach ($val as $value ){

                    echo "<option value=". $value['author_id'].">". $value['a_name']."</option>";
            }
            ?>
            </select><br>

            文章首圖：:<input type="file" name="file" id="file" style="font-size: 16px;"><br />
            文章內容：<br/>
            <textarea  name="article" style="width:500px;height:300px;"></textarea>
            <br/>
            <br/>
            <input type="submit" value="送出文章" style="font-size: 100px;"/>
        </form>
    </body>
</html>