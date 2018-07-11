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
<?php header('Content-type: text/html; charset=big5'); ?>
<title>?s?W????1</title>
</head>

<body >
<form method="post" action="query2.php">
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
		<td width="30%">Time</td>
		<td width="10%">Boys</td>
		<td width="10%">Girls</td>
		<td width="10%">?|??</td>
		<td width="10%">?D?|??</td>
		<td width="10%">?ǥ?</td>
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
   $boycount 	= 0;
   $girlcount 	= 0;
   $ncount 		= 0;	//?}?Y?D?|??
   $lumicount 	= 0;	//Lumi?}?Y?|??
   $studcount	= 0;
/*   $zerocount 	= 0;
   $tencount	= 0;
   $twentycount	= 0;
   $thirtycount	= 0;
   $fortycount	= 0;??
*/
   $chgcount = QueryRegByTime($chglist, $today, $p ); 
   $timelist[$count]["timestr"] = my_gmdate("Y/m/d (D)", intval($today));

   if ( $p > 24 * 60 * 60 ) {
    $timelist[$count]["timestr"] .= " ~ ";
    $timelist[$count]["timestr"] .= my_gmdate("Y/m/d (D)", intval($etoday) - 60);
   }

   $timelist[$count]["chgcount"] = $chgcount;
   
   //?p???ʧO?B?|??
   for($i =0; $i <$chgcount; $i++){
		if($chglist[$i]["sex"] == 1){
			$boycount++;
		}else{
			$girlcount++;
		}
		if($chglist[$i]["admin"] == 3){
			$ncount++;
		}else{
			$lumicount++;
		}
		
		if($chglist[$i]["what"] == "?ǥ?"){
			$studcount++;
		}
   }
   $timelist[$count]["boycount"] 	= $boycount;
   $timelist[$count]["girlcount"] 	= $girlcount;
   $timelist[$count]["ncount"] 		= $ncount;
   $timelist[$count]["lumicount"] 	= $lumicount;
   $timelist[$count]["studcount"] 	= $studcount;
   $count ++;

   $today = $etoday;

   if ( $today >= $etime ) break;
   if ( $today + $part <= $etime) $p = $part;
   else $p  = ($etime - $etoday);
   
  }

	$total 		= 0;
	$totalBoys 	= 0;
	$totalGirls = 0;
	$totalNs 	= 0;
	$totalLumis = 0;
	$totalStuds = 0;
	
	for ($i=0 ; $i < $count ; $i++ ) {
		$total 		+= $timelist[$i]["chgcount"];
		$totalBoys 	+= $timelist[$i]["boycount"];
		$totalGirls += $timelist[$i]["girlcount"];
		$totalNs 	+= $timelist[$i]["ncount"];
		$totalLumis += $timelist[$i]["lumicount"];
		$totalStuds += $timelist[$i]["studcount"];
?>
	 
	<tr>
		<td width="30%" > <?php echo $timelist[$i]["timestr"]; ?>
    <a href="class.php?now=<?php echo $today;?>"> </a>
		</td>
		<td width="10%"><?php echo $timelist[$i]["boycount"]; ?></td>
		<td width="10%"><?php echo $timelist[$i]["girlcount"]; ?></td>
		<td width="10%"><?php echo $timelist[$i]["lumicount"]; ?></td>
		<td width="10%"><?php echo $timelist[$i]["ncount"]; ?></td>
		<td width="10%"><?php echo $timelist[$i]["studcount"]; ?></td>
		<td width="10%"><?php echo $timelist[$i]["chgcount"]; ?></td>
	</tr>

</form>
	 
<?php	 
	 //echo "$chgcount";
	}
?>
<tr>
		<td width="30%" > ???? </td>
		<td width="10%"><?php echo round($totalBoys/$i, 2); ?>	</td>
		<td width="10%"><?php echo round($totalGirls/$i, 2); ?>	</td>
		<td width="10%"><?php echo round($totalLumis/$i, 2); ?>	</td>
		<td width="10%"><?php echo round($totalNs/$i, 2); ?>	</td>
		<td width="10%"><?php echo round($totalStuds/$i, 2); ?>	</td>
		<td width="10%"><?php echo round($total/$i, 2); ?>		</td>
</tr>

</table>
</body>

</html>
