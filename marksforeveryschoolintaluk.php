<?php

include 'dbconnect.php';
$taluk=$_POST["taluk"];
$result = mysql_query("select distinct schoolname from school where taluk='$taluk'")
or die(mysql_error());
$ans="";
//echo mysql_num_rows($result);
while($row=mysql_fetch_array($result))
{
	$schoolname=$row[0];//echo $schoolname;
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=s.studentid and s.presentschoolid=sc.schoolid and sc.schoolname='$schoolname'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	$ans=$ans.$schoolname."-".$percentage.",";
}

echo $ans;

?>