<?php
	if(isset($_REQUEST["again"]) && isset($_REQUEST["mv"]))
	{
		$id=$_REQUEST["again"];
		$mn=$_REQUEST["mv"];
	}
	else
	{
		$id=$_REQUEST["succ"];
		$mn=$_REQUEST["mo"];
	}
	
?>
<label>Movie Name:</label><?=$mn?><br>
<form enctype="multipart/form-data" action="addsong.php?fg=<?=$id?>&mo=<?=$mn?>" method="post">
		<label>Song Title:</label><input type="text" class="form-control"><br>
		<label>Song:</label><input type="file" name="mp"><br><br>
		<input type="submit" value="Add" class="btn">
		</form>