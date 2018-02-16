<?php
	if(isset($_REQUEST["cate"]))
	{
		$ch=$_REQUEST["cate"];
	}
?>
<html>
<title>MP3SONGS</title>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="bootstrap.min.css">
<script type="text/javascript" src="jQuery.js" src="text/css"></script>
<script src="bootstrap.min.js"></script>
<style>
#w
{
	display: block;
		color: darkblue;
		text-align:left;
	text-decoration: none;
}
#w li a:hover 
{
	background-color: #111;
}
	#bolly,#ae1,#oo,#he,#serg,#lol
	{
		display:none;
	}
	#gm
	{
		display:none;
	}
	#x
	{
		display: block;
		color: darkblue;
		text-align: center;
	}
	ul
	{
		overflow: hidden;
	}
	li a:hover 
	{
		background-color: #111;
	}
</style>
<script type="text/javascript">
$(document).ready(function()
{
	$("#search").click(function()
	{
		var v=$("#tx").val();
		$.post("searchsong.php",{c:v},function(data)
			{
				$("#serg").html(data);
			});
			$("#serg").show();
			$("#lol").show();
			$("#a").hide();
			$("#hl").hide();
			$("#latest").hide();
	});
	$(".b1").click(function()
	{
		var v =$(this).attr("id");
		$.post("loadmore.php",{lt:v},function(data)
		{
			$("#lm").append(data);
			//document.getElementById("msg").innerHTML += v;
		});
		$(this).attr("id",parseInt(v)+1);
	});
});
</script>
</head>
<body style="background-image:url(admin/images/back.jpg);background-size:1560px 800px">
<div class="container-fluid">
<div class="col-sm-12">
	<div class="navbar-header" style="float:left">
      <a class="navbar-brand" style="color:lightgreen;background-color:none;font-size:50px;font-family:AR BERKLEY" href="index.php"><b>MP3SONGS</b></a>
    </div>
</div>
</div><br><br>
<div class="container">
<table align="center">
	<tr>	
	<td>
	<input id="tx" type="text" class="form-control" placeholder="Search a Song" style="width:500px;font-size:20px">	
	</td>
	<td>&nbsp;&nbsp;&nbsp;</td>
	<td>	
	<button id="search" class="btn btn-success" style="font-size:15px;width:100px"><b>Search</b></button>
	</td>
	</tr>
</table>
</div><br>
<div class="container-label" style="background-color:#131140">
<?php
	$i=1;
	mysql_connect("localhost","root","");
	mysql_select_db("upload");
	$rs=mysql_query("select * from collect where categories='Bollywood'");
	while($r=mysql_fetch_array($rs))
	{
		if($i<=7)
		{
			$i=$i+1;
			echo "<li style='display:inline'><a href='index.php?mp3list=$r[0]&cate=Bollywood&mov=$r[3]'><img src='$r[2]' class='img img-thumbnail' style='height:200px;width:209px'/></a>&nbsp;</li>";
		}
		else
			break;
	}
?>
</div>
<br><br>
<div class="col-sm-3 container-fluid">
	<div class="panel panel-info" style="height:600px;">
    <div class="panel-heading" style="background-color:black;color:white;text-align:center;"><b><h4>Select Categories</h4></b></div>
	<div class="panel-body">
	<ul class="nav nav-stacked">
	<?php
	$rs1=mysql_query("select * from addcategory");
	while($r1=mysql_fetch_array($rs1))
	{
		echo "<li id='x'><a href='index.php?cate=$r1[1]'><b>$r1[1]&nbsp;Songs</b></a></li>";
	}
	?>
        
	</ul>
	</div>
	</div>
</div>
<div class="container-fluid">
	<div class="col-sm-9">
	<div class="panel panel-info" style="overflow-y:scroll;height:600px;">
	<div class="panel-heading" style="background-color:black;color:white;text-align:center;"><h4>
	<?php
	if(isset($_REQUEST["cate"]))
	{
?>
	<b id="a"><?=$ch?>&nbsp;Songs</b>
	<b id="lol">Search Result</b>
	</h4></div>	
	<div class="panel-body" id="<?=$ch?>">
	<div id="hl">
	<h4><ul class="nav nav-stacked">
	<?php
	for($j='A';$j<='Z';$j++)
	{
		if($j=='Z')
		{
			echo "<a href='index.php?sort=$j&cate=$ch'>$j</a>";
			break;
		}
		echo "<a href='index.php?sort=$j&cate=$ch'>$j</a>&nbsp;&nbsp;&nbsp;&nbsp;";
	}
	?>
	</b>
	<ul class="nav nav-stacked">
		<?php
		if(isset($_REQUEST["mp3list"]) && isset($_REQUEST["mov"]))
		{
			$ide=$_REQUEST["mp3list"];
			$m=$_REQUEST["mov"];
			mysql_connect("localhost","root","");
			mysql_select_db("upload");
			$rs=mysql_query("select * from collect where id=$ide AND mname='$m'");
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
			$rs=mysql_query("select * from songlist where id=$ide");
			while($r=mysql_fetch_array($rs))
			{		
				echo "<li><a href='$r[2]'><img src='admin/images/play.png' style='height:50px'/>&nbsp;&nbsp;<b>$r[1]</b></a></li>";

			}
		}
		else
		{
		if(isset($_REQUEST["sort"]))
		{
			$y=$_REQUEST["sort"];
			$rs=mysql_query("select * from collect where categories='$ch'");
			while($r=mysql_fetch_array($rs))
			{
				$f=$r[3];
				if($f[0]==$y)
			echo "<li name='$r[0]'><a href='index.php?mp3list=$r[0]&cate=$ch&mov=$r[3]'><img src='$r[2]' style='height:150px'/>&nbsp;&nbsp;&nbsp;<b>$r[3]</b></a></li>";
			}
		}
		else
		{
		$rs=mysql_query("select * from collect where categories='$ch'");
		while($r=mysql_fetch_array($rs))
		{
		echo "<li name='$r[0]'><a href='index.php?mp3list=$r[0]&cate=$ch&mov=$r[3]'><img src='$r[2]' style='height:150px'/>&nbsp;&nbsp;&nbsp;<b>$r[3]</b></a></li>";
		}
		}
		}
		?>
	</ul>
	</h4>
	</div>
	<div id="serg"></div>
	</div>
	
	<?php
	}
	else
	{
		?>
	<b id="a">Latest Songs</b>
	<b id="lol">Search Result</b>
	</h4></div>	
	<div class="panel-body" id="latest">
	<h4><ul class="nav nav-stacked">
	<?php
		$lt=7;
		$rs2=mysql_query("select * from songlist limit 0,$lt");
		while($r2=mysql_fetch_array($rs2))
		{
	?>
    <li ><a href="<?=$r2[2]?>"><img src="admin/images/play.png" style="height:50px"/>&nbsp;&nbsp;<b><?=$r2[1]?></b></a></li>
	<?php
		}
	?>
	<div id="lm"></div>
	<button class="b1" class="btn btn-link" id="1" style="margin-left:450px">Load more..</button>
	</ul>
	</h4>
	</div>
	<?php
	}
	?>
	<div id="serg"></div>
	</div>
	</div>
	</div>
<div>	

<div class="col-sm-12" style="background-image:url(bg4.jpg);height:300px">
<div class="col-sm-4" style="color:white;margin-top:44px">
<span>
<b style="margin-left:130px;font-size:40px">Categories</b><br>
<?php
$rs1=mysql_query("select * from addcategory");
while($r1=mysql_fetch_array($rs1))
{
	echo "<li id='x'><a href='index.php?cate=$r1[1]'><font color='darkgrey'><b>$r1[1]&nbsp;Songs</b></font></a></li>";
}
?>
</span>
</div>
<div class="col-sm-4" style="color:white;margin-top:50px">
<span>
<b style="font-size:40px">Contact Info</b><br>
<b style="font-size:20px;color:darkgrey">Address : </b><font color="skyblue" style="font-size:20px"><i>501 Silverside Road,<br>
Suite 105,Wilmington,<br>Delaware 19809 <br>USA</i></font><br>
<b style="font-size:20px;color:darkgrey">Email-ID : </b><font color="skyblue" style="font-size:20px"><i>rohan.gupta78@gmail.com</i></font><br>
<b style="font-size:20px;color:darkgrey">Mobile : </b><font color="skyblue" style="font-size:20px"><i>+91 1875986858</i></font>
</span>
</div>
<div class="col-sm-4" style="color:white;margin-top:50px">
<span>
<a href="#"><img src="Facebooklogo.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#"><img src="logo.png"></a><br>
<b>Facebook&nbsp;&nbsp;&nbsp;Instagram</b><br><br>
<a href="#"><img src="twitter.png"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="#"><img src="gplus.png"></a><br>
<b>Twitter&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Google+</b><br><br>
<a href="#"><img src="google.png"></a>
</span>
</div>
</div>
<?php
/*
<table align="center" style="background-color:grey">
	<tr><td><img src="google.png"></td>
	<td><img src="social.png"></td>
	</tr>
</table>	
*/
?>
<div class="col-sm-12" style="height:30px ; background-color:black ;color:white">
<span style="color:white;margin-left:600px">Design & Developed By : Rohan Gupta</span>
</div>
</body>

</html>