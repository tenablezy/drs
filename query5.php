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
  $methd     = _get("methd"); 
  if (empty($stime_str)) $stime = $now;
  else                   $stime = my_strtotime($stime_str);
  if (empty($etime_str)) $etime = $now;
  else                   $etime = my_strtotime($etime_str) + 24*60*60;

  if (empty($part))      $part  = 24*60*60;

  echo $methd;
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

  if ( $methd == "Report") {
      /* SELECT `mid`,MIN(`time`) FROM `change` GROUP BY `mid` HAVING MIN(`time`) BETWEEN 1530403200 AND 1532217600 ORDER BY MIN(`time`) DESC */
      $sel = "*";
      $rule = "OR (`mid` LIKE '%' AND `time` >= $stime AND `time` <= $etime ) ";
      $maxlist1 = QueryChanges ($chglist1, "*", $sel, $rule);
      echo "maxlist1=".$maxlist1;
  }
	

  if ( $methd == "NewAdd") {
    /* SELECT `mid`,MIN(`time`) FROM `change` GROUP BY `mid` HAVING MIN(`time`) BETWEEN 1530403200 AND 1532217600 ORDER BY MIN(`time`) DESC */
    $sel = "`mid`,MIN(`time`)";
    $rule = "OR (`mid` LIKE '%') GROUP BY `mid` HAVING MIN(`time`) BETWEEN $stime AND $etime ";
    $order = "MIN(`time`) DESC";
    $maxlist1 = QueryChanges ($chglist1, "*", $sel, $rule, $order);
    echo "maxlist2=".$maxlist1;
  }
	
?>

<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>新增網頁1</title>
</head>

<body >

<form method="post" action="query5.php">
	<br>Start: 
  <script> $(function() { $( "#stime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="stime_str" id="stime_str" size="20" value="<?php echo $stime_str; ?>">

	End: 
  <script> $(function() { $( "#etime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="etime_str" id="etime_str" size="20" value="<?php echo $etime_str; ?>">
	
	<select size="1" name="methd">
	    <option value="Report"   <?php if ($methd == "Report") echo "selected";?> >會員紀錄</option>
	    <option value="NewAdd"   <?php if ($methd == "NewAdd") echo "selected";?> >新會員</option>
	</select>
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
		<td>MID</td>
		<td>Date</td>
		<td>Changes</td>
		<td>Notes</td>
  </tr>
<?php
  for ( $i = 0 ; $i < $maxlist1 ; $i ++) {
    if ($methd == "Report" ) {
      if ( $chglist1[$i]["type"] == 0 && strstr($chglist1[$i]["str"], "Remove Quota ") == 0) continue;
    } /* report */
?>
  <tr>
    <td>
<?php
    echo "<a href=\"mview.php?mid=".$chglist1[$i]["mid"]."\">".$chglist1[$i]["mid"]."</a>";
?>
    </td>

    <td>
<?php
    if ($methd == "Report" ) {
		    echo gmdate("Y/m/d H:i:s",intval($chglist1[$i]["time"]));
    }
    if ($methd == "NewAdd" ) {
	      echo gmdate("Y/m/d H:i:s",intval($chglist1[$i]["MIN(`time`)"]));
    }
?>
    </td>

    <td>
<?php
							/*echo $chglist1[$i]["type"];*/
							switch($chglist1[$i]["type"])
							{
								case "0": echo "Remove Quota";break;
								case "1": echo "課堂";break;
								case "2": echo "點數";break;
								case "5": 
                    $b_studio= $b_teacher= $b_day= $b_time= $b_name= $b_sub_name=$b_comment=$b_online = "";
					  findbook($chglist1[$i]["str"], $b_studio, $b_teacher, $b_day, $b_time, $b_name, $b_sub_name, $b_comment, $b_online);  
                      echo "上課";
                      break;
									case "99": echo "會員起始時間"; break;
						}
							
?>
    </td>

    <td>
<?php
							/*echo $chglist1[$i]["type"];*/
							switch($chglist1[$i]["type"])
							{
								case "0": echo $chglist1[$i]["str"];break;
								case "1": echo $chglist1[$i]["str"];break;
								case "2": echo $chglist1[$i]["str"];break;
								case "5": 
                    $b_studio= $b_teacher= $b_day= $b_time= $b_name= $b_sub_name=$b_comment=$b_online = "";
					  findbook($chglist1[$i]["str"], $b_studio, $b_teacher, $b_day, $b_time, $b_name, $b_sub_name, $b_comment, $b_online);  
                      echo $b_name."(".$b_teacher.")";
                      break;
									case "99": echo gmdate("Y/m/d (D) H:i:s", intval($chglist1[$i]["str"])); break;
						}
							
?>
    </td>
  </tr>
<?php
  }
?>
</table>

</form>
</body>

</html>
