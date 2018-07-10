<?php
	require ("func.php");
	
	$now = getNow();

  $part      = _get("part");
  $etime_str = _get("etime_str");
  $stime_str = _get("stime_str");
  $query     = _get("query");

  if (empty($stime_str)) $stime = $now;
  else                   $stime = my_strtotime($stime_str);
  if (empty($etime_str)) $etime = $now;
  else                   $etime = my_strtotime($etime_str) + 24*60*60;

  if (empty($part))      $part  = 24*60*60;

  //echo "<br>1 ".$stime_str." ".my_strtotime($stime_str);
  //echo "<br>2 ".$etime_str." ".my_strtotime($etime_str);
  /*
  echo gmdate("Y/m/d H:i:s", strtotime("now"));
  echo gmdate("Y/m/d H:i:s", time());
  echo gmdate("Y/m/d H:i:s", $now);

  $today = getdate();
  print_r($today);

  echo "<br>$stime_str stime=".$stime.gmdate("Y/m/d", intval($stime) + 8 * 60 * 60);
  echo "<br>etime=".$etime.gmdate("Y/m/d", intval($etime));
  echo "<br>part=".intval($part);
  echo "<br>count=".$count;
  */
?>

<html>

<head>
<?php
  CCS_jq_head ();
?>

<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title>新增網頁1</title>
</head>

<body >
<form method="post" action="query.php">
	<br>Start: 
  <script> $(function() { $( "#stime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="stime_str" id="stime_str" size="20" value="<?php echo $stime_str; ?>">

	End: 
  <script> $(function() { $( "#etime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="etime_str" id="etime_str" size="20" value="<?php echo $etime_str; ?>">

	Part: 
	<select size="1" name="part">
	    <option value="<?php echo  1*24*60*60;?>"   <?php if ($part == 24*60*60) echo "selected";?> >1 Day</option>
	    <option value="<?php echo  7*24*60*60;?>"   <?php if ($part == 7*24*60*60) echo "selected";?> >1 Week</option>
	    <option value="<?php echo 30*24*60*60;?>"   <?php if ($part == 30*24*60*60) echo "selected";?> >1 Month</option>
  </select>
	<input type="submit" value="send" name="query" id="query">

  <br>
  <br>
<table width="30%" border="1" id="table1">
	<tr>
		<td width="30%" >Time</td>
		<td width="10%">Count</td>
	</tr>

<?php 


  $count = 0 ;

  $today = $stime;
  $etoday = $today;
  
  
  if ( ($etime - $stime ) > $part ) $p = $part;
  else $p = $etime - $stime;

  while(1) {

   /*echo "<br>".$today." " . $p/60/60;*/

   $etoday += $p;
   $boycount = 0;
   $girlcount = 0;

   $chgcount = QueryDeQuotaByTime($chglist, $today, $p ); 
   $timelist[$count]["timestr"] = my_gmdate("Y/m/d (D)", intval($today));

   if ( $p > 24 * 60 * 60 ) {
    $timelist[$count]["timestr"] .= " ~ ";
    $timelist[$count]["timestr"] .= my_gmdate("Y/m/d (D)", intval($etoday) - 60);
   }

   $timelist[$count]["chgcount"] = $chgcount;
   
   $count ++;

   $today = $etoday;

   if ( $today >= $etime ) break;
   if ( $today + $part <= $etime) $p = $part;
   else $p  = ($etime - $etoday);
   
  }

	$total = 0;
	for ($i=0 ; $i < $count ; $i++ ) {
		$total += $timelist[$i]["chgcount"];
?>
	 
	<tr>
		<td width="30%" > <?php echo $timelist[$i]["timestr"]; ?>
    <a href="class.php?now=<?php echo $today;?>"> </a>
		</td>
		<td width="10%"><?php echo $timelist[$i]["chgcount"]; ?></td>

	</tr>

</form>
	 
<?php	 
	 //echo "$chgcount";
	}
?>
<tr>
		<td width="30%" > <?php echo "average"; ?>
		</td>
		<td width="10%"><?php echo $total/$i; ?></td>
</tr>

</table>
</body>

</html>
