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
	$the["A"] =0;
	$the["B"] =0;
	$the["delete"] =0;
	$book_num = getBook($book_list);
	
	if($AOrB != "A" && $AOrB != "B")
		$AOrB = "A";
	for($i=0, $t = 0; $i<$book_num; $i++){
		if($book_list[$i]["studio"] =="A"){
			$the["A"]++;
		}else if($book_list[$i]["studio"] =="B"){
			$the["B"]++;
		}else{
			$the["delete"]++;
		}
		$teacherList[$t++] = $book_list[$i]["teacher"];
		$teacherList[$book_list[$i]["teacher"]] = 1;
	}
	for($i =0, $teacherNum =0; $i < $t; $i++){
		if($teacherList[$teacherList[$i]] == 1){
			$trueTeacherList[$teacherNum++] = $teacherList[$i];
			$teacherList[$teacherList[$i]]++;
		}
	}
	
?>

<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>�s�W����1</title>
</head>

<body >

<form method="post" action="query4.php">
	<br>Start: 
  <script> $(function() { $( "#stime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="stime_str" id="stime_str" size="20" value="<?php echo $stime_str; ?>">

	End: 
  <script> $(function() { $( "#etime_str" ).datepicker({dateFormat: 'yy/mm/dd'}); }); </script>
  <input type="text" name="etime_str" id="etime_str" size="20" value="<?php echo $etime_str; ?>">
	
	Teacher:
	<input type="text" name="teacher" id="teacher" size="20" value="<?php echo $teacher; ?>">
	Part: 
	<select size="1" name="part">
	    <option value="<?php echo  1*24*60*60;?>"   <?php if ($part == 24*60*60) echo "selected";?> >1 Day</option>
	    <option value="<?php echo  7*24*60*60;?>"   <?php if ($part == 7*24*60*60) echo "selected";?> >1 Week</option>
	    <option value="<?php echo 30*24*60*60;?>"   <?php if ($part == 30*24*60*60) echo "selected";?> >1 Month</option>
	</select>
	<input type="submit" value="send" name="query" id="query">

  <br>
  <br>
<table  border="1" id="table1">
	<tr>
		<td width = "300px">Time</td>
<?php
	for($j = 0, $c = 0; $j < $book_num; $j++){
		if($book_list[$j]["teacher"] == $teacher &&  $book_list[$j]["online"] == 1){
			if(($c++)%2){
?>
				<td  width = "150px" bgcolor = #FFFFCC>
				<?php echo $book_list[$j]["teacher"]; ?><br>
				<?php echo $book_list[$j]["name"]; ?><br>
				<?php echo $book_list[$j]["sub_name"]; ?><br>
				</td>
<?php
			}else{
?>
				<td width = "150px" bgcolor = #CCFF99>
				<?php echo $book_list[$j]["teacher"]; ?><br>
				<?php echo $book_list[$j]["name"]; ?><br>
				<?php echo $book_list[$j]["sub_name"]; ?><br>
				</td>
<?php
			}
		}
	}
?>
		<td width = "150px">Count</td>
	</tr>

<?php 
	
	$today = $stime;
	$etoday = $today;

	$count = 0;
	
	$countRow;
	$countBoy;
	$countGirl;
	$countMenber;
	$countNoMenb;
	
	$totalBoy;
	$totalGirl;
	$totalMenber;
	$totalNoMenb;
	
	$countTotal["A"] = 0;
	$countTotal["B"] = 0;
	for($i =0; $i < $book_num; $i++){
		$countTotal[$book_list[$i]["sn"]] =0;
		$totalBoy[$book_list[$i]["sn"]] =0;
		$totalGirl[$book_list[$i]["sn"]] =0;
		$totalMember[$book_list[$i]["sn"]] =0;
		$totalNoMemb[$book_list[$i]["sn"]] =0;
	}
	
	if ( ($etime - $stime ) > $part ) $p = $part;
	else $p = $etime - $stime;

	while(1) {///////////////////////////////////

		$etoday += $p;

		$chgcount = QueryRegByTime($chglist, $today, $p ); 
		$timeStr = my_gmdate("Y/m/d (D)", intval($today));

		if ( $p > 24 * 60 * 60 ) {
		$timeStr .= " ~ ";
		$timeStr .= my_gmdate("Y/m/d (D)", intval($etoday) - 60);
		}
		//
		$countRow["A"] = 0;
		$countRow["B"] = 0;
		for($i =0; $i <$book_num; $i++){
			$countRow[$book_list[$i]["sn"]]  	= 0;
			$countBoy[$book_list[$i]["sn"]]  	= 0;
			$countGirl[$book_list[$i]["sn"]]	= 0;
			$countMember[$book_list[$i]["sn"]]	= 0;
			$countNoMemb[$book_list[$i]["sn"]]  = 0;
		}

		//�p��ʧO�B�|��
		///////////////////////////////////////////////////////////////////////////////////////////
		for($i =0; $i <$chgcount; $i++){
			$countRow[$chglist[$i]["sn"]]++;
			if($chglist[$i]["sex"] == 1){
				$countBoy[$chglist[$i]["sn"]]++;
			}else{
				$countGirl[$chglist[$i]["sn"]]++;
			}
			if($chglist[$i]["admin"] == 3){
				$countNoMemb[$chglist[$i]["sn"]]++;
			}else{
				$countMember[$chglist[$i]["sn"]]++;
			}
		}
		//////////////////////////////////////////////////////////////////////////////////////////
?>
	<tr>
		<td> <?php echo $timeStr; ?>
			<a href="class.php?now=<?php echo $today;?>"> </a>  </td>
<?php		
		for($i =0, $c =0; $i <$book_num; $i++){
			if($book_list[$i]["teacher"] == $teacher && $book_list[$i]["online"] ==1 ){
				if(($c++)%2){
?>
					<td bgcolor = #FFFFCC>�k��: <?php shownumber($countBoy[$book_list[$i]["sn"]]); ?>�H<br>
					�k��: <?php shownumber($countGirl[$book_list[$i]["sn"]]); ?>�H<br>
					�|��: <?php shownumber($countMember[$book_list[$i]["sn"]]); ?>�H<br>
					�D�|��: <?php shownumber($countNoMemb[$book_list[$i]["sn"]]); ?>�H<br>
					</td>
<?php
				}else{
?>
					<td bgcolor = #CCFF99>�k��: <?php shownumber($countBoy[$book_list[$i]["sn"]]); ?>�H<br>
					�k��: <?php  shownumber($countGirl[$book_list[$i]["sn"]]); ?>�H<br>
					�|��: <?php  shownumber($countMember[$book_list[$i]["sn"]]); ?>�H<br>
					�D�|��: <?php  shownumber($countNoMemb[$book_list[$i]["sn"]]); ?>�H<br>
					</td>
<?php
				}
				$countRow[$AOrB] += $countRow[$book_list[$i]["sn"]];
				$countTotal[$book_list[$i]["sn"]] 	+= $countRow[$book_list[$i]["sn"]];
				$totalBoy[$book_list[$i]["sn"]] 	+= $countBoy[$book_list[$i]["sn"]];
				$totalGirl[$book_list[$i]["sn"]] 	+= $countGirl[$book_list[$i]["sn"]];
				$totalMember[$book_list[$i]["sn"]] 	+= $countMember[$book_list[$i]["sn"]];
				$totalNoMemb[$book_list[$i]["sn"]] 	+= $countNoMemb[$book_list[$i]["sn"]];
			}
		}

  /************* writing data ************************/






?>
		<td><?php shownumber($countRow[$AOrB]); ?></td>
	</tr>
<?php
		$countTotal["A"] += $countRow["A"];
		$countTotal["B"] += $countRow["B"];
		$today = $etoday;
		$count++;
		if ( $today >= $etime ) break;
		if ( $today + $part <= $etime) $p = $part;
		else $p  = ($etime - $etoday);

	}///////////////////////////

?>
<tr>
		<td> �έp </td>
<?php
	for($j = 0, $c = 0; $j < $book_num; $j++){
		if($book_list[$j]["teacher"] == $teacher && $book_list[$j]["online"] == 1){
			if(($c++)%2){
?>
				<td bgcolor = #FFFFCC>
				�`�H��: 	<?php echo $countTotal[$book_list[$j]["sn"]]; ?>�H<br>
<!--				����: 		<?php echo round($countTotal[$book_list[$j]["sn"]]/$count, 2); ?>�H<br>-->
				�k�k��: 	<?php echo $totalBoy[$book_list[$j]["sn"]];
								  echo " : ";
								  echo $totalGirl[$book_list[$j]["sn"]]; 
							?><br>
				�|�����: 	<?php 
				if($countTotal[$book_list[$j]["sn"]]==0){
					echo $countTotal[$book_list[$j]["sn"]];
				}else{
					echo round($totalMember[$book_list[$j]["sn"]]/$countTotal[$book_list[$j]["sn"]], 2); 
				}?><br>
				</td>
<?php
			}else{
?>
				<td bgcolor = #CCFF99>
				�`�H��: 	<?php echo $countTotal[$book_list[$j]["sn"]]; ?>�H<br>
				<!--����: 		<?php echo round($countTotal[$book_list[$j]["sn"]]/$count, 2); ?>�H<br>-->
				�k�k��: 	<?php echo $totalBoy[$book_list[$j]["sn"]];
								  echo " : ";
								  echo $totalGirl[$book_list[$j]["sn"]]; 
							?><br>
				�|�����: 	<?php 
							if($countTotal[$book_list[$j]["sn"]]==0){
								echo $countTotal[$book_list[$j]["sn"]];
							}else{
								echo round($totalMember[$book_list[$j]["sn"]]/$countTotal[$book_list[$j]["sn"]], 2); 
							}?><br>
				</td>
<?php
			}
		}
	}
?>
		<td><?php echo round($countTotal[$AOrB]/$count, 2); ?>	</td>
</tr>

</table>
</form>
</body>

</html>
