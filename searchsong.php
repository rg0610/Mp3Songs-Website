<?php
if(isset($_REQUEST["c"]))
{
	$s=$_REQUEST["c"];
	$a=explode(" ",$s);
	mysql_connect("localhost","root","");
	mysql_select_db("upload");
	echo "<h4><ul class='nav nav-stacked'>";
	$sql="select * from songlist where title like '$s%'";
	for($j=0;$j<sizeof($a);$j++)
	{
		$sql=$sql."OR title like '$a[$j]%'";
	}
	$rs2=mysql_query("$sql");
	while($r2=mysql_fetch_array($rs2))
	{	
		echo "<li ><a href='$r2[2]'><img src='admin/images/play.png' style='height:50px'/>&nbsp;&nbsp;<b>$r2[1]</b></a></li>";
	}
	echo "</ul>";
	echo "</h4>";

}
?>