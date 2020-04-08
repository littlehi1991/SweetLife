    <html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <title>僱員資訊列表</title>
    </head>
    <?php
    //顯示所有emp表的資訊
    //1.連線資料庫
    $conn=mysql_connect('localhost','root','1234abcd') or die('連線資料庫錯誤'.mysql_error());
    //2.選擇資料庫
    mysql_select_db('empManage');
    //3.選擇字符集
    mysql_query('set names utf8');
    //4.傳送sql語句並得到結果進行處理
    //4.1分頁[分頁要發出兩個sql語句，一個是獲得$rowCount,一個是通過sql的limit獲得分頁結果。所以我們會獲得兩個結果集，在命名的時候要記得區分。
    分頁 （四個值 兩個sql語句）。]
    $pageSize=3;//每頁顯示多少條記錄
    $rowCount=0;//共有多少條記錄
    $pageNow=1;//希望顯示第幾頁
    $pageCount=0;//一共有多少頁 [分頁共有這個四個指標，缺一不可。由於$rowCount可以從伺服器獲得的，所以可以給予初始值為0；
    $pageNow希望顯示第幾頁，這裡最好是設定為0；$pageSize是每頁顯示多少條記錄，這裡根據網站需求提前制定。
    .$pageCount=ceil($rowCount/$pageSize）,既然$rowCount可以初始值為0，那麼$pageCount當然也就可以設定為0.四個指標，兩個0 ，一個1，另一個為網站需求。]
    //4.15根據分頁連結來修改$pageNow的值
    if(!empty($_GET['pageNow'])){
    $pageNow=$_GET['pageNow'];
    }[根據分頁連結來修改$pageNow的值。]
    $sql='select count(id) from emp';
    $res1=mysql_query($sql);
    //4.11取出行數
    if($row=mysql_fetch_row($res1)){
    $rowCount=$row[0];
    }//[取得$rowCount,，進了我們就知道了$pageCount這兩個指標了。]
    //4.12計算共有多少頁
    $pageCount=ceil($rowCount/$pageSize);
    $pageStart=($pageNow-1)*$pageSize;
    //4.13傳送帶有分頁的sql結果
    $sql="select * from emp limit $pageStart,$pageSize";//[根據$sql語句的limit 後面的兩個值（起始值，每頁條數），來實現分頁。以及求得這兩個值。]
    $res2=mysql_query($sql,$conn) or die('無法獲取結果集'.mysql_error());
    echo '<table border=1>';[    echo "<table border='1px' cellspacing='0px' bordercolor='red' width='600px'>";]
    "<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th><a href='#'>刪除使用者</a></th><th><a href='#'>修改使用者</a></th></tr>";    while($row=mysql_fetch_assoc($res2)){
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>刪除使用者</a></td><td><a href='#'>修改使用者</a></td></tr>";    }
    echo '</table>';
    //4.14列印出頁碼的超連結
    for($i=1;$i<=$pageCount;$i  ){
    echo "<a href='?pageNow=$i'>$i</a> ";//[列印出頁碼的超連結]
    }
    //5.釋放資源，關閉連線
    mysql_free_result($res2);
    mysql_close($conn);
    ?>
    </html>