<html>
<?php
	require ("func.php");
	
		$link = openmysql();
		
		$query = "SELECT `sex`, COUNT(*) FROM `user` GROUP BY `sex`";
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$malecount = $row["COUNT(*)"];
		
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$femalecount = $row["COUNT(*)"];
		
		$query = "SELECT `prop`, COUNT(*) FROM `user` GROUP BY `prop`";
		$result = mysqli_statment($link,$query);
		
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$yesCount = $row["COUNT(*)"]-1;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$noCount = $row["COUNT(*)"]-1;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$oldCount = $row["COUNT(*)"]+2;
		
		mysqli_free_result($result);
		mysqli_close($link);
		
?>

<head>
<!-- <meta http-equiv="Content-Type" content="text/html; charset=big5"> -->
<?php header('Content-type: text/html; charset=big5'); ?>

<title>會員管理系統</title>
<base target="_self">
</head>

<body>

<p><font size="7" face="標楷體">歡迎您的加入!!</font></p>
<p>目前系統 共登錄&nbsp; 男生 <b><font color="#0000FF" size="5"><?php echo $malecount; ?> </font></b>名, 女生 <b>
<font color="#FF00FF" size="5"><?php echo $femalecount; ?></font></b> 名</p>
<p>新會員&nbsp; 因網宣報名<b><font color="#0000FF" size="5"><?php echo $yesCount; ?> </font></b>名, 非網宣報名 <b>
<font color="#FF00FF" size="5"><?php echo $noCount; ?></font></b> 名</p>
<p>舊會員 <?php echo $oldCount;?> 名</p>
<!--
<p>祝您生日快樂唷!!</p>
<table border="1" width="45%" id="table1">
	<tr>
		<td width="15%">會員編號</td>
		<td width="15%">姓名</td>
		<td width="15%">生日</td>
	</tr>
	<?php 
		$now = getNow();
		for ($i=0 ; $i < $brc ; $i++) {

			if ($brlist[$i]["pas"] >0 ) $cc = "#CCFF99";
			else $cc = "#FFFF99";		
	?>
	<tr>
		<td width="15%" bgcolor="<?php echo $cc;?>"><a href="mview.php?mid=<?php echo $brlist[$i]["mid"];?>">
			<?php echo $brlist[$i]["mid"];?></a></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $brlist[$i]["name"];?></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo gmdate("m/d (D)", intval($now - $brlist[$i]["pas"]));?>
			<?php  
				//echo $brlist[$i]["pas"];
				if ($brlist[$i]["pas"] == 0) {
			?>
			<img border="0" src="cake.jpg" width="40" ></td>
			<?php } ?>
	</tr>
	<?php } //mysqli_close($link);	 
	?>
</table>

<p>請要加買堂數!! 共 <font color="#0000FF" size="5"><a href="main2.php"><?php echo $quc;?></a> </font>位</p>
-->
<p><a href="query5.php" target="_new">產生報表</a></p>
<br>
<p><a href="main3.php">會員快到期列表(請耐心等待)!!</a>   (<a href="special1.html">裝潢區間列表</a>)</p>
<!--
<p><a href="main3.php?special=1">會員快到期列表(請耐心等待)!!</a></p>
<p><a href="main4.php">課堂快到期列表(請耐心等待)!!</a></p>
<p><a href="query.php">近一個月課堂統計表!!</a></p>
<p><a href="query2.php">精密統計表!!</a></p>
<p><a href="query3.php">課堂統計表!!</a></p>
<p><a href="query4.php">老師課堂統計表!!</a></p>
<p><a href="book_mngr.php">修改上課 課程</a></p>
-->
</body>

</html>
