<?php

include 'dbconnect.php';
$studentid=$_GET["studentid"];
$result = mysql_query("select distinct subjectid from exam where studentid='$studentid'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$subjectid=$row[0];
	$resultsubjectname=mysql_query("select subjectname from subject where subjectid='$subjectid'")
	or die(mysql_error());
	$row2=mysql_fetch_array($resultsubjectname);
	$subjectname=$row2[0];
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam where studentid='$studentid' and subjectid='$subjectid'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	//echo $ronewscore[1]."-".$ronewscore[0];
	$ans=$ans.$subjectname."-".$percentage.",";
}

echo $ans;

?>