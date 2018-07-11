<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>會員管理系統</title>
<base target="_self">
</head>

<?php
	require ("func.php");
	$now = getNow();

  $days= _get("qdays");
  $special= _get("special");

  if ($special == 1) {
    $filter = "`mstart` >= '1456761600' AND `mstart` <= '1477929600'";
    $days = 999999;

  } else {

    //if (empty($days)) $days = 30;

		//$classuc = QueryResClassMember($classuclist);
		//$size = 500;
		//if (empty($start)) $start = 0;


		//$classuc = QueryResStartMember($classuclist, $start, $size, 31, 1);
		
      /*
		for ($i=0 ; $i < $classuc ; $i++ ) {
			for ($j = $i+1 ; $j < $classuc ; $j++ ) {
				if ( (30*$classuclist[$j]["max_mstart_mon"] + $classuclist[$j]["max_mstart_day"] ) >  
						(30*$classuclist[$i]["max_mstart_mon"] + $classuclist[$i]["max_mstart_day"] ) ) {
							$tmp = $classuclist[$i];
							$classuclist[$i] = $classuclist[$j];
							$classuclist[$j] = $tmp;
				}
			}
		}                                                  
    */
  }

  if (empty($days)) $days = 30;
  if (empty($start)) $start = 0;
  if (empty($filter)) $filter= "";
	$classuc = QueryResStartMember($classuclist, $filter, -1, $size, $days, 1);
?>


<body>

<font size="4"><font color=blue><?php echo gmdate("Y/m/d(D) H:i:s", intval($now));?></font>

<p>會員 <?php echo $days;?> 日~~<font size="5">快</font>~~  到期!! 共 <?php echo $classuc;?> 位, 
  <?php
  /*
    echo "<a href=\"?start=0\">首頁</a>, ";
    if ($classuc != 0 ) {
      echo "<a href=\"?start=". ($start+$size)."\">下一頁</a> ";
    }    
    */
  ?>
</p>
<table border="1" width="45%" id="table1">
	<tr>
		<td width="15%">會員編號</td>
		<!--<td width="15%">姓名</td>-->
		<td width="15%">生日</td>
		<td width="15%">剩餘時間(起始)</td>
	</tr>
	<?php 
    $email = "";
		for ($i=0 ; $i < $classuc ; $i++) {

			if ($i %2==0 ) $cc = "#22FF99";
			else $cc = "#FFFF99";

      $birth=getdate(intval($classuclist[$i]["birth"]));
      $email=$email."; ".$classuclist[$i]["email"];
      
      //if (($classuclist[$i]["max_mstart_mon"] + $classuclist[$i]["max_mstart_day"]) <= 0 )
      //  continue;
	?>
	<tr>
		<td width="15%" bgcolor="<?php echo $cc;?>"><a href="mview.php?mid=<?php echo $classuclist[$i]["mid"];?>">
			<?php echo $classuclist[$i]["mid"];?></a></td>
		<!--<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $classuclist[$i]["name"];?></td>-->
		<td width="15%" bgcolor="<?php echo $cc;?>"><?php echo $birth["mon"]."/".$birth["mday"];?> </td>
		<td width="15%" bgcolor="<?php echo $cc;?>">
    <?php echo $classuclist[$i]["max_mstart_mon"];?>月
		<?php echo $classuclist[$i]["max_mstart_day"];?>日
		(<?php echo gmdate("Y/m/d", intval($classuclist[$i]["mstart"]));?>)
    </td>
	</tr>
	<?php } //mysql_close($link);	 
	?>

<table border="1" width="45%" id="table1">
	<tr>
		<td width="70%"><?php echo $email; ?> </td>
  <tr>
</table>
</body>

</html>
