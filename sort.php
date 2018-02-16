<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="jQuery.js" src="text/css"></script>
<script src="bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	$("li").click(function()
	{
		var mn=$(this).attr("id");
		if(mn=='mj')
		{
			var h=$(this).attr("name");
			$.post("mp3list.php",{mov:h},function(data)
			{
				$("#show").html(data);	
			});
			$("#he").fadeOut(1000);
			$("#oo").fadeOut(1000);
			$("#latest").hide();
			$("#pun").hide();
			$("#eng").hide();
			$("#bolly").fadeIn(1000);
			$("#show").fadeIn(1000);
		}
	});
});
</script>

<ul class="nav nav-stacked">
		<?php
		$ch=$_REQUEST["id"];
		$na=$_REQUEST["name"];
		mysql_connect("localhost","root","");
		mysql_select_db("upload");
		$rs=mysql_query("select * from collect where categories='$na'");
		while($r=mysql_fetch_array($rs))
		{
			$st=$r[2];
			if($st[0]==$ch[1])
		echo "<li id='mj' name='$r[2]'><a href='#$r[2]'><img src='$r[1]' style='height:150px'/>&nbsp;&nbsp;&nbsp;<b>$r[2]</b></a></li>";
		
		}
		
		?>
</ul>
</div>