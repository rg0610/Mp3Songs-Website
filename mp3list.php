
<?php
	$ch=$_REQUEST["mov"];
		mysql_connect("localhost","root","");
		mysql_select_db("upload");
		$rs=mysql_query("select * from collect where id=$ch");
		if($r=mysql_fetch_array($rs))
		{
	?>

	<h4><ul class="nav nav-stacked">
		<li align="center" style=""><img src="<?=$r[2]?>" style="height:200px"/></li><br>
		<li style="color:grey;border-style: solid">
			<b>Storyline:</b>&nbsp;<?=$r[4]?> 
			</li>	
	</ul>
	</h4>
	<?php
		}
		?>
<ul class="nav nav-stacked">
		<?php
		mysql_connect("localhost","root","");
		mysql_select_db("upload");
		$rs=mysql_query("select * from songlist where id=$ch");
		while($r=mysql_fetch_array($rs))
		{		
		echo "<li id='mj' name='$ch'><a id='mj' name='$ch' href='$r[2]'><img src='images/play.png' style='height:50px'/>&nbsp;&nbsp;<b>$r[1]</b></a></li>";
				
		
		}
		
		?>
</ul>
</div>