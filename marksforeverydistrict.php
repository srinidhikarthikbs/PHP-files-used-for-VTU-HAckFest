<?php

include 'dbconnect.php';
$state=$_POST["state"];
$result = mysql_query("select distinct district from school where state='$state'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$district=$row[0];
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=s.studentid and s.presentschoolid=sc.schoolid and sc.district='$district'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	$ans=$ans.$district."-".$percentage.",";
}

echo $ans;

?>