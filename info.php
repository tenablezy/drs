<html>
	<?php require ("func.php"); ?>
<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>系統資訊</title>
</head>

<body>

<p><font face="標楷體" size="6">系統資訊</font></p>
<hr>
<table border="1" width="100%" id="table1" cellspacing="0" cellpadding="0">
	<tr>
		<td width="116"><font face="Arial Unicode MS"><b>Version</b></font></td>
		<td width="124"><b><font face="Arial Unicode MS">Date</font></b></td>
		<td width="456"><b><font face="Arial Unicode MS">Information</font></b></td>
	</tr>
	<?php 
		$i = 0;
		while( $infover[$i]["ver"] != "") {
			echo '<tr>
					<td width="116"><font face="Arial Unicode MS">'.$infover[$i]["ver"].'</font></td>
					<td width="124"><font face="Arial Unicode MS">'.$infover[$i]["date"].'</font></td>
					<td width="456"><font face="Arial Unicode MS">'.$infover[$i]["info"].'</font></td>
				</tr>';
			$i++;
		}
	?>
</table>

<?php echo phpinfo();?>
</body>

</html>
