<?php
if ($_FILES["file"]["error"] > 0)
{
    echo "错误：" . $_FILES["file"]["error"] . "<br>";
    echo "<script>alert('錯誤');history.back();</script>";

}
else
{
    echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
    echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
    echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"];
    if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 " ;
            echo "<script>alert('文件已存在!');history.back();</script>";

        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];
            echo "<script>alert('上傳成功!');history.back();</script>";

        }
}
        //連結資料庫
        $con = mysqli_connect("localhost","root","seanwang0402","sean");
            if (!$con)
                {
                die('Could not connect: ' . mysqli_error());
            }

        //定義變數，儲存檔案上傳路徑，之後將變數寫進資料庫相應欄位即可
        $file = "../upload/" . $_FILES["file"]["name"];
        $sql = "INSERT INTO picture (path)
            VALUES
            ('$file')";

        if (!mysqli_query($con,$sql)) {
            die('Error: ' . mysqli_error($con));
        }
        echo "成功新增一條記錄";//成功傳入資料後顯示成功新增一條資料
        header("Refresh:1;url=XXX.html");//成功插入資料後返回某個網頁
        ?>