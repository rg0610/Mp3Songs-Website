<?php
if(empty($_REQUEST["cate"]) || empty($_REQUEST["nmovie"]) || empty($_REQUEST["des"]))
{
	header("location:manage.php?err=1");
}
else
{
	$des=$_REQUEST["des"];
	$category=$_REQUEST["cate"];
	$mname=$_REQUEST["nmovie"];
	$target = "images/"; 
	$target = $target.basename( $_FILES['photo']['name']);  // images/1.jpg
	$dir = "mp3/";
	$sg1 = $dir.basename( $_FILES['mp']['name']);  // songs/1.mp3
	$sg2 = $dir.basename( $_FILES['mpq']['name']);
	$sg3 = $dir.basename( $_FILES['mpw']['name']);
	$sg4 = $dir.basename( $_FILES['mpe']['name']);
	$sg5 = $dir.basename( $_FILES['mpr']['name']);
	$sg6 = $dir.basename( $_FILES['mpt']['name']);
	$pic=basename( $_FILES['photo']['name']);
	$n1=basename( $_FILES['mp']['name']); 
	$n2=basename( $_FILES['mpq']['name']);
	$n3=basename( $_FILES['mpw']['name']);
	$n4=basename( $_FILES['mpe']['name']);
	$n5=basename( $_FILES['mpr']['name']);
	$n6=basename( $_FILES['mpt']['name']);
	mysql_connect("localhost","root","");
	mysql_select_db("upload");
	if(move_uploaded_file($_FILES['photo']['tmp_name'], $target) && move_uploaded_file($_FILES['mp']['tmp_name'], $sg1)
		&& move_uploaded_file($_FILES['mpq']['tmp_name'], $sg2) && move_uploaded_file($_FILES['mpw']['tmp_name'], $sg3) 
		&& move_uploaded_file($_FILES['mpe']['tmp_name'], $sg4) && move_uploaded_file($_FILES['mpr']['tmp_name'], $sg5)
		&& move_uploaded_file($_FILES['mpt']['tmp_name'], $sg6))
	{ 
		$rs=mysql_query("insert into collect(categories,mpic,mname,songs,songs2,songs3,songs4,songs5,songs6,description) values('$category','$target','$mname','$sg1','$sg2','$sg3','$sg4','$sg5','$sg6','$des')");
		header("location:manage.php?succ=1"); 
	} 
	else 
	{ 
	header("location:manage.php?invalid=1");
	} 
	
}
?> 