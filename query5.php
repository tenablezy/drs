<?php
	require ("func.php");
	
    function shownumber ( $num) {
        if ( $num > 0 ) {
            echo "<font color=\"red\">$num</font>";
        } else {
            echo $num;
        }
    }

	$now = getNow();

  $part      = _get("part");
  $etime_str = _get("etime_str");
  $stime_str = _get("stime_str");
  $query     = _get("query");
  $AOrB      = _get("AOrB");
  $teacher   = _get("teacher"); 
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

  /* SELECT `mid`,MIN(`time`) FROM `change` GROUP BY `mid` HAVING MIN(`time`) BETWEEN 1530403200 AND 1532217600 ORDER BY MIN(`time`) DESC */
  $sel = "*";
  $rule = "OR (`mid` LIKE '%' AND `time` >= $stime AND `time` <= $etime ) ";
  $maxlist1 = QueryChanges ($chglist1, "*", $sel, $rule);
  echo "maxlist1=".$maxlist1;
	
  /* SELECT `mid`,MIN(`time`) FROM `change` GROUP BY `mid` HAVING MIN(`time`) BETWEEN 1530403200 AND 1532217600 ORDER BY MIN(`time`) DESC */
  $sel = "`mid`,MIN(`time`)";
  $rule = "OR (`mid` LIKE '%') GROUP BY `mid` HAVING MIN(`time`) BETWEEN $stime AND $etime ";
  $order = "MIN(`time`) DESC";
  $maxlist2 = QueryChanges ($chglist2, "*", $sel, $rule, $order);
  echo "maxlist2=".$maxlist2;
	
?>

<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>·s¼Wºô­¶1</title>
</head>

<body >

<form method="post" action="query5.php">
	<br>Start: 
  <script> $(function() { $( "#stime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="stime_str" id="stime_str" size="20" value="<?php echo $stime_str; ?>">

	End: 
  <script> $(function() { $( "#etime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="etime_str" id="etime_str" size="20" value="<?php echo $etime_str; ?>">
	
  <!--
	Teacher:
	<input type="text" name="teacher" id="teacher" size="20" value="<?php echo $teacher; ?>">
	Part: 
	<select size="1" name="part">
	    <option value="<?php echo  1*24*60*60;?>"   <?php if ($part == 24*60*60) echo "selected";?> >1 Day</option>
	    <option value="<?php echo  7*24*60*60;?>"   <?php if ($part == 7*24*60*60) echo "selected";?> >1 Week</option>
	    <option value="<?php echo 30*24*60*60;?>"   <?php if ($part == 30*24*60*60) echo "selected";?> >1 Month</option>
	</select>
  -->
	<input type="submit" value="send" name="query" id="query">

  <br>
  <br>
<table  border="1" id="table1">
	<tr>
		<td><?php echo round($countTotal[$AOrB]/$count, 2); ?>	</td>
</tr>

</table>
</form>
</body>

</html>
