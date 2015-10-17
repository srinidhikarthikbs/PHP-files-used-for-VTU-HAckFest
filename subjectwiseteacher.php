<?php

include 'dbconnect.php';
$teacherid=$_GET["teacherid"];
$result = mysql_query("select distinct subjectid from exam where teacherid='$teacherid'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$subjectid=$row[0];
	$resultsubjectname=mysql_query("select subjectname from subject where subjectid='$subjectid'")
	or die(mysql_error());
	$row2=mysql_fetch_array($resultsubjectname);
	$subjectname=$row2[0];
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam where teacherid='$teacherid' and subjectid='$subjectid'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	$ans=$ans.$subjectname."-".$percentage.",";
}

echo $ans;

?>