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

<title>�|���޲z�t��</title>
<base target="_self">
</head>

<body>

<p><font size="7" face="�з���">�w��z���[�J!!</font></p>
<p>�ثe�t�� �@�n��&nbsp; �k�� <b><font color="#0000FF" size="5"><?php echo $malecount; ?> </font></b>�W, �k�� <b>
<font color="#FF00FF" size="5"><?php echo $femalecount; ?></font></b> �W</p>
<p>�s�|��&nbsp; �]���ų��W<b><font color="#0000FF" size="5"><?php echo $yesCount; ?> </font></b>�W, �D���ų��W <b>
<font color="#FF00FF" size="5"><?php echo $noCount; ?></font></b> �W</p>
<p>�·|�� <?php echo $oldCount;?> �W</p>
<!--
<p>���z�ͤ�ּ֭�!!</p>
<table border="1" width="45%" id="table1">
	<tr>
		<td width="15%">�|���s��</td>
		<td width="15%">�m�W</td>
		<td width="15%">�ͤ�</td>
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

<p>�Эn�[�R���!! �@ <font color="#0000FF" size="5"><a href="main2.php"><?php echo $quc;?></a> </font>��</p>
-->
<p><a href="query5.php" target="_new">���ͳ���</a></p>
<br>
<p><a href="main3.php">�|���֨���C��!</a></p>
<!-- <p><a href="main3.php?special=1">�|���֨���C��(�Э@�ߵ���)!!</a></p>-->
<!-- <p><a href="main4.php">�Ұ�֨���C��(�Э@�ߵ���)!!</a></p>-->
<!-- <p><a href="query.php">��@�Ӥ�Ұ�έp��!!</a></p>-->
<!-- <p><a href="query2.php">��K�έp��!!</a></p>-->
<!-- <p><a href="query3.php">�Ұ�έp��!!</a></p>-->
<p><a href="query4.php">�Ѯv�Ұ�έp��!!</a></p>
<!-- <p><a href="book_mngr.php">�ק�W�� �ҵ{</a></p> -->
</body>

</html>
