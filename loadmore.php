<?php
if(isset($_REQUEST["lt"]))
{
	mysql_connect("localhost","root","");
	mysql_select_db("upload");
	$lt=$_REQUEST["lt"];
	$num=7*$lt;
	$rs=mysql_query("select * from songlist limit $num,7");
	echo "<ul class='nav nav-stacked'>";
	while($r2=mysql_fetch_array($rs))
	{
	
		echo "<li ><a href='$r2[2]'><img src='admin/images/play.png' style='height:50px'/>&nbsp;&nbsp;<b>$r2[1]</b></a></li>";

	}
		echo "</ul>";
}
?>