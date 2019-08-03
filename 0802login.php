
<?php
   
 $conn = mysqli_connect("localhost","root","","people_flow");

 mysqli_query($conn,"set names utf8");
 

$username = $_GET['username'];
$password = $_GET['password'];


 $sql = "SELECT*FROM account WHERE username='$username' AND password='$password'" ;
 $sql2 = $conn->query($sql);
       if(mysqli_num_rows($sql2) == "")

 {
    echo "<script>alert('login錯誤');history.go(-1);</script>";
 }
else
 {
    echo "<script>alert('login成功');parent.location.href='https://google.com/';</script>";
 
    
 }
 
  $conn->close();//close $conn
  ?>
