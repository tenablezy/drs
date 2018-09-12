<html>
<?php
	require ("func.php");
	
		$link = openmysql();
		
		$query = "SELECT `sex`, COUNT(*) FROM `user` GROUP BY `sex`";
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$malecount = $row["COUNT(*)"];
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$femalecount = $row["COUNT(*)"];
		
		mysqli_free_result($result);
		mysqli_close($link);
		
		$brc = getBrithday(8*24*60*60, $brlist);
		
	$quc = QueryResQuotaMember($qulist);

?>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>會員管理系統</title>
<base target="_self">
</head>

<body>


<p>請要加買堂數!!</p>
<table border="1" width="45%" id="table1">
	<tr>
		<td width="15%">會員編號</td>
		<td width="15%">姓名</td>
		<td width="15%">剩餘點數</td>
	</tr>
	<?php 
		$now = getNow();
		for ($i=0 ; $i < $quc ; $i++) {

			if ($i %2==0 ) $cc = "#22FF99";
			else $cc = "#22FF99";		
	?>
	<tr>
		<td width="15%" bgcolor="<?php echo $cc;?>"><a href="mview.php?mid=<?php echo $qulist[$i]["mid"];?>">
			<?php echo $qulist[$i]["mid"];?></a></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $qulist[$i]["name"];?></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $qulist[$i]["quota"];?></td>
	</tr>
	<?php } //mysqli_close($link);	 
	?>
</table>
</body>

</html>
