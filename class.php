<html>

<head>
<meta http-equiv="refresh" content="600">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>

<title>新增網頁1</title>


</head>

<body >
<?php
	require ("func.php");
	
  $mid = _get("mid");
  $now = _get("now");
  $showm = _get("showm");
  $bid   = _get("bid");
  $reset = _get("reset");

  if (!empty($reset)) {
    $bid = 0;
  }

	if (empty($now)) {$showm=1;$now = getNow();}
	//localtime(time(),true);
	//echo gmdate("Y/m/d 00:00:00", intval($now));
	//$today = strtotime(gmdate("Y/m/d  H:i:s", intval($now)))+ 8 * 60 * 60;
	$today = my_strtotime(gmdate("Y/m/d", intval($now)));
	//echo $today."-".$now."-".strtotime("2008/04/06");

	if ( !empty($addwav) && $addwav)
	{
		?><embed src="chimes.wav" autoplay=true hidden=true></embed><?php
		$addwav = 0;
		//header('Location: class.php');
	}
	
	//echo "-".gmdate("Y/m/d H:m", intval($today));
	if ( !empty($mid)) $addcls="sendout";
	//echo $addcls;
	if (!empty($addcls) && !empty($mid)) {
	
		$filter = "AND `mid` = '$mid'";
		$ord = "";
		$start = 0;
		$mcount = QueryMember($mlist, $filter,$ord, $start);
		if ($mcount >0 && $mlist[0]["quota"] >0 && 
					 ($mlist[0]["max_class_day"]+ $mlist[0]["max_class_mon"] )>0 && $bid) 
		{
			  if (0) {
						$link = openmysql();
						$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '1', '-1')";
						//echo $query2;
						$result = mysqli_statment($link,$query2);
						
						$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '2', '1')";
						//echo $query2;
						$result = mysqli_statment($link,$query2);			
						mysqli_close($link);			
			  } else {
				LogMemberInfo($mid, $now, "1", "-1");
				LogMemberInfo($mid, $now, "2", "1");
				LogMemberInfo($mid, $now, "5", $bid);
				RegMemberInfo($mid, $bid, $now, $mlist[0]["sex"], $mlist[0]["admin"], $mlist[0]["birth"], $mlist[0]["what"]);
			  }


			$mid = NULL;
			//echo "修改完成";
			header('Location: class.php?addwav=1');
			echo $mid;
		} else if ($mcount <= 0){
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			echo "會員 ???? (".$mid.") 不存在!!";
			exit(1); /*         <a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"> */
		}else if (($mlist[0]["max_class_day"]+ $mlist[0]["max_class_mon"]) <=0) {
			//echo "會員 <".$mlist[0]["name"]."(".$mlist[0]["mid"].") 會員已到期<br>最近一次更新 ".
			echo "會員 <a href=mview.php?mid=".
			    $mlist[0]["mid"].
			    "> ".$mlist[0]["name"].
				"(".$mlist[0]["mid"].")</a> 會員已到期<br>最近一次更新 ".
				gmdate("Y/m/d (D) H:i:s", intval($mlist[0]["class_start_time"]));
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			exit(1);
		} else {
			echo "會員 ".$mlist[0]["name"]."(".$mlist[0]["mid"].") 課程用完 或錯誤的課程!!";
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			exit(1);
		}
	}
	//echo $today;
	//echo $mid;
	$chgcount = QueryDeQuotaByTime($chglist,$today);

  $book_num = getBook($book_list);
  $selbook_num = getBookByOrder ($selbook_list);
?>
<p><b><font size="5">課程登記</font> <font size="5" color=blue><b><?php echo gmdate("Y/m/d (D) H:i:s", intval($now));?></b></font>
<hr>
<form method="post" action="class.php">
	
<?php if ($showm) { ?>
	<p>請輸入會員編號 <input type="text" name="mid" size="25" id="mid" >
 
	<select size="1" name="bid">
	    <option value="0">None</option>
  <?php 
    for ($i = 0 ; $i < $selbook_num ; $i++) 
    {
		if($selbook_list[$i]["studio"] != "delete" && $selbook_list[$i]["online"] == 1){
			echo "<option value=\"".$selbook_list[$i]["sn"]."\"";
		    if ( $bid == $selbook_list[$i]["sn"])
			    echo " selected ";
		    echo " >". 
				"[".$selbook_list[$i]["studio"]."] ".
				$selbook_list[$i]["teacher"]."- ".
				$selbook_list[$i]["name"].
				" (".$selbook_list[$i]["sub_name"].")".
				"</option>";
		}
    }
  ?>
	</select>

	<input type="submit" value="送出" name="addcls" id="addcls">
	<input type="reset" value="重新設定" ></p>
	<?php }?>
</form>
<p>今日登記人數: <b><font color="#0000FF" size="5"><?php echo $chgcount;?></font></b> 人次</p>

<!-- class A -->
<table border="1" width="70%" id="book">
	<tr>
		<td width="10%" bgcolor="#dddddddd"><center><font color="blue">Studio A</font></center></td>
		<td width="13%" bgcolor="#dddddddd"><center>一</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>二</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>三</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>四</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>五</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>六</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>日</center></td>
	</tr>

	<tr>
		<td width="%" bgcolor="#dddddddd"><center>15:00 <br>(a) 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "a"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>17:00 <br>(b) 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "b"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>19:00 <br>(c) 20:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "c"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>20:30 <br>(d) 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "d"); ?>
	</tr>
</table>

<!-- class B -->
<table border="1" width="70%" id="book">
	<tr>
		<td width="10%" bgcolor="#dddddddd"><center><font color="blue">Studio B</font></center></td>
		<td width="13%" bgcolor="#dddddddd"><center>一</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>二</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>三</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>四</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>五</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>六</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>日</center></td>
	</tr>

	<tr>
		<td width="%" bgcolor="#dddddddd"><center>15:00 <br>(a) 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "a"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>17:00 <br>(b) 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "b"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>19:00 <br>(c) 20:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "c"); ?>
	</tr>

	<tr>
		<td width="" bgcolor="#dddddddd"><center>20:30 <br>(d) 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "d"); ?>
	</tr>
</table>
<a href="book_mngr.php">Book Manager</a>  <a href="http://www.lumi-dance-school.com/files/schedule/schedule.jpg" target="_blank">Link Schedule</a>


<p>上課列表:</p>
<table border="1" width="70%" id="table1">
	<tr>
		<td width="5%">時間</td>
		<td width="25%">會員編號 <br>(剩餘堂數 at <?php echo $nowdatetime;?>)</td>
		<td width="15%">姓名</td>
		<td width="15%">剩餘課堂</td>
	</tr>
	<?php 
		$link = openmysql();
		for ($i=0 ; $i < $chgcount ; $i++) {
			
			$filter = "AND `mid` = '".$chglist[$i]["mid"]."'";
			$ord = "";
			$start = 0;
			$mcount = QueryMember($mlist, $filter,$ord, $start);
			
			if ($i % 2 == 0 ) $cc = "#CCFF99";
			else $cc = "#FFFF99";
			
	?>
	<tr>
		<td width="18%" bgcolor="<?php echo $cc;?>">
			<?php 
							//$chgtime = getdate($chglist[$i]["time"]); 
							echo gmdate("Y/m/d (D) H:i:s", intval($chglist[$i]["time"]));
							$birth = gmdate("m/d", intval($mlist[0]["birth"]));
							if ($birth == $today = gmdate("m/d", intval($now)) ) $birth = "<img border=\"0\" src=\"cake.jpg\" width=\"40\" ></img>";
							else $birth = "";
							
						?>			
		</td>
		<td  width="15%" bgcolor="<?php echo $cc;?>"><a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>">
		  <?php echo $mlist[0]["mid"];?></a><?php 
			findbooklist($chglist[$i]["str"], "", "","","","","", $blist, $echo);
			echo " (".  $echo[0].")";?>
		</td>
		<td  width="15%" bgcolor="<?php echo $cc;?>"><?php echo $mlist[0]["name"]." ".$birth;?></td>
		<td  width="15%" bgcolor="<?php echo $cc;?>"><?php echo $mlist[0]["quota"];?></td>
	</tr>
	<?php } //mysqli_close($link);	 
	?>
</table>

</body>

</html>
