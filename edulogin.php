<?php

// Define $username and $password
$username=$_GET['username'];
$password=$_GET['password'];

//$username=$_POST['username'];
//$password=$_POST['password'];


// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysql_connect("localhost", "root", "");
// Selecting Database
$db = mysql_select_db("futureeducation", $connection);
//echo $username;
//echo $password;
// SQL query to fetch information of registerd users and finds user match.
$query1 = mysql_query("select * from student where password='$password' AND email='$username'")
or die(mysql_error());
$rows1 = mysql_num_rows($query1);
$query2 = mysql_query("select * from teacher where teacherpw='$password' AND teacheremailid='$username'")
or die(mysql_error());
$rows2 = mysql_num_rows($query2);
$query3 = mysql_query("select * from company where password='$password' AND email='$username'")
or die(mysql_error());
$rows3 = mysql_num_rows($query3);
$query4 = mysql_query("select * from government where password='$password' AND email='$username'")
or die(mysql_error());
$rows4 = mysql_num_rows($query4);

$query5 = mysql_query("select * from school where password='$password' AND emailid='$username'")
or die(mysql_error());
$rows5 = mysql_num_rows($query5);

//echo sri;
if ($rows1 == 1) {
	$row=mysql_fetch_array($query1)
	or die(mysql_error());
	$studentid=$row["studentid"];
echo "student-".$studentid;
} else if($rows2 == 1){
	$row=mysql_fetch_array($query2)
	or die(mysql_error());
	$teacherid=$row["teacherid"];
echo "teacher-".$teacherid;
}
else if($rows3 == 1){
echo "company";
}
else if($rows4==1){
echo "government";
}
else if($rows5==1)
{
	echo "school";
}
else {
	{
		echo "invalid";
	}
}
mysql_close($connection); // Closing Connection

?>