<?php

include 'dbconnect.php';
$studentid=$_GET["studentid"];
$result = mysql_query("select credits from student where studentid='$studentid'")
or die(mysql_error());
$row=mysql_fetch_array($result);
echo $row[0];

//echo $ans;

?>