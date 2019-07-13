<?php
$con = mysqli_connect("localhost","root","seanwang0402","sean");
if (!$con)
  {
  die('Could not connect: ' . mysqli_error());
  }

$sql="INSERT INTO Persons (FirstName, LastName, Age)
VALUES
('$_POST[firstname]','$_POST[lastname]','$_POST[age]')";

if (!mysqli_query($con,$sql))
  {
  die('Error: ' . mysqli_error($con));
  }
echo "1 record added";

mysqli_close($con)
?>