<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>�|���޲z�t��</title>
<base target="_self">
</head>

<body>
<div id="progress" style="width:500px;border:1px solid #ccc;"></div> <div id="information" style="width"></div>

<?php
	require ("func.php");
		
	
	$size = 500;
	if (empty($start)) $start = 0;
	//$classuc = QueryResStartMember($classuclist, $start, $size, 31, 1);
	//$classuc = QueryResStartMember($classuclist, -1, $size, 31 * (1.5), 1);
	$classuc = QueryResClassMember($classuclist, -1, $size, 2, 1);
	
	for ($i=0 ; $i < $classuc ; $i++ ) {
		for ($j = $i+1 ; $j < $classuc ; $j++ ) {
			if ( (30*$classuclist[$j]["max_class_mon"] + $classuclist[$j]["max_class_day"] ) >  
					(30*$classuclist[$i]["max_class_mon"] + $classuclist[$i]["max_class_day"] ) ) {
						$tmp = $classuclist[$i];
						$classuclist[$i] = $classuclist[$j];
						$classuclist[$j] = $tmp;
			}
		}
	}                                                  
?>

<p>�Ұ�~~<font size="5">��</font>~~���!! �@ <?php echo $classuc;?> ��, 
  <?php
    echo "<a href=\"?start=0\">����</a>, ";
    if ($classuc != 0 ) {
      echo "<a href=\"?start=". ($start+$size)."\">�U�@��</a> ";
    }    
  ?>
</p>
<table border="1" width="45%" id="table1">
	<tr>
		<td width="15%">�|���s��</td>
		<td width="15%">�m�W</td>
		<td width="15%">�Ѿl�I��</td>
	</tr>
	<?php 
		$now = getNow();
		for ($i=0 ; $i < $classuc ; $i++) {

			if ($i %2==0 ) $cc = "#22FF99";
			else $cc = "#FFFF99";
      
      //if (($classuclist[$i]["max_mstart_mon"] + $classuclist[$i]["max_mstart_day"]) <= 0 )
      //  continue;
	?>
	<tr>
		<td width="15%" bgcolor="<?php echo $cc;?>"><a href="mview.php?mid=<?php echo $classuclist[$i]["mid"];?>">
			<?php echo $classuclist[$i]["mid"];?></a></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $classuclist[$i]["name"];?></td>
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $classuclist[$i]["max_class_mon"];?>��
		<?php echo $classuclist[$i]["max_class_day"];?>��</td>
	</tr>
	<?php } //mysql_close($link);	 
	?>
</table>
</body>

</html>
