<?php

include 'dbconnect.php';

$result = mysql_query("select distinct state from school")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$state=$row[0];
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=s.studentid and s.presentschoolid=sc.schoolid and sc.state='$state'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	$ans=$ans.$state."-".$percentage.",";
}

echo $ans;

?>