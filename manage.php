<html>
<title>Management</title>
<head>
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="jQuery.js" src="text/css"></script>
<script src="bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(sunction()
{
	$("#aer").click(function()
	{
		var a=$("#make").val();
		alert(a);
	});
});
</script>
</head>
<body>
<br><br>
<form enctype="multipart/form-data" action="add.php" method="POST">
<label>Categories:</label>
<select name="cate" class="form-control">
    <option value="">Select Categories</option>
    <option value="Bollywood">Bollywood Songs</option>
    <option value="English">English Songs</option>
    <option value="Punjabi">Punjabi Songs</option>
    <option value="Ghazal">Ghazal Songs</option>
    <option value="Telugu">Telugu Songs</option>
    </select><br>
<label>Movie Name:</label><input type="text" name="nmovie" class="form-control" placeholder="Enter Movie name"><br>
<label>Choose Poster:</label><input type="file" name="photo"><br> 

<label>Song 1:</label><input type="file" name="mp"><br>
 <label>Song 2:</label><input type="file" name="mpq"><br> 
<label>Song 3:</label><input type="file" name="mpw"><br> 
<label>Song 4:</label><input type="file" name="mpe"><br>
<label>Song 5:</label><input type="file" name="mpr"><br>
<label>Song 6:</label><input type="file" name="mpt"><br>
Description:<br><textarea rows="5" cols="90" name="des"></textarea><br><br>
<input type="submit" value="Add" class="btn">
</form>
<?php
if(isset($_REQUEST["err"]))
{
	echo"<font color='red'>Required all field</font>";
}
else if(isset($_REQUEST["succ"]))
{
	echo "<font color='red'>The file has been uploaded into dirctory and database.</font>";
}
else if(isset($_REQUEST["invalid"]))
{
	echo "<font color='red'>Sorry, there was a problem uploading or inserting your file.</font>";
}

?>
</body>
</html>