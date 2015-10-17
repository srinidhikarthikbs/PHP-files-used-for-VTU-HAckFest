<?php

include 'dbconnect.php';
$district=$_POST["district"];
$result = mysql_query("select distinct taluk from school where district='$district'")
or die(mysql_error());
$ans="";
while($row=mysql_fetch_array($result))
{
	$taluk=$row[0];
	$resultscore=mysql_query("select sum(maxmarks),sum(marksscored) from exam e,student s,school sc where e.studentid=s.studentid and s.presentschoolid=sc.schoolid and sc.taluk='$taluk'")
	or die(mysql_error());
	$ronewscore=mysql_fetch_array($resultscore);
	$percentage=$ronewscore[1]/$ronewscore[0]*100;
	$ans=$ans.$taluk."-".$percentage.",";
}

echo $ans;

?>