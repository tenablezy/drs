<html>

<head>
<meta http-equiv="refresh" content="600">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>

<title>�s�W����1</title>


</head>

<body >
<?php
	require ("func.php");
	
  $mid = _get("mid");
  $nonmemberclass = _get("nonmemberclass");

  //echo $mid.$nonmemberclass;
  if (empty($mid) && !empty($nonmemberclass)) {
    echo "�D�|��: ".$NONMEMBER_ID." �W��!";
    $mid = $NONMEMBER_ID;
  }

  $now = _get("now");
  $showm = _get("showm");
  $bid   = _get("bid");
  $reset = _get("reset");

  if (!empty($reset)) {
    $bid = 0;
  }

	if (empty($now)) {$showm=1;$now = getNow();}
	//localtime(time(),true);
	//echo my_gmdate("Y/m/d 00:00:00", intval($now));
	//$today = strtotime(my_gmdate("Y/m/d  H:i:s", intval($now)))+ 8 * 60 * 60;
	$today = my_strtotime(my_gmdate("Y/m/d", intval($now)));
	//echo $today."-".$now."-".strtotime("2008/04/06");

	if ( !empty($addwav) && $addwav)
	{
		?><embed src="chimes.wav" autoplay=true hidden=true></embed><?php
		$addwav = 0;
		//header('Location: class.php');
	}
	
	//echo "-".my_gmdate("Y/m/d H:m", intval($today));
	//echo $mid;
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
			//echo "�ק粒��";
			header('Location: class.php?addwav=1');
			echo $mid;
		} else if ($mcount <= 0){
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			echo "�|�� ???? (".$mid.") ���s�b!!";
			exit(1); /*         <a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"> */
		}else if (($mlist[0]["max_class_day"]+ $mlist[0]["max_class_mon"]) <=0) {
			//echo "�|�� <".$mlist[0]["name"]."(".$mlist[0]["mid"].") �|���w���<br>�̪�@����s ".
			echo "�|�� <a href=mview.php?mid=".
			    $mlist[0]["mid"].
			    "> ".$mlist[0]["name"].
				"(".$mlist[0]["mid"].")</a> �|���w���<br>�̪�@����s ".
				my_gmdate("Y/m/d (D) H:i:s", intval($mlist[0]["class_start_time"]));
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			exit(1);
		} else {
			echo "�|�� ".$mlist[0]["name"]."(".$mlist[0]["mid"].") �ҵ{�Χ� �ο��~���ҵ{!!";
			?><embed src="chord.wav" autoplay=true hidden=true></embed><?php
			exit(1);
		}
	}
	//echo $today;
	//echo $mid;
	//$f_dayofweek = my_strtotime(my_gmdate("", intval($today)));
	$f_day = my_gmdate("N", intval($today));
	$f_time = my_strtotime(my_gmdate("Y/m/d", intval($today))) - (($f_day -1)* 24 * 60 * 60);
	//echo  my_gmdate("Y/m/d", intval($f_time));
	$chgcount_today = QueryDeQuotaByTime($chglist_today,$today);
	$chgcount = QueryDeQuotaByTime($chglist,$f_time, 7*24*60*60);

	//$chgcount = QueryDeQuotaByTime($chglist,$today);

  $book_num = getBook($book_list);
  $selbook_num = getBookByOrder ($selbook_list);


    $showclass= _get("showclass");
    $showlist = _get("showlist");

    if (!isset($showclass)) $showclass=1;
    if (!isset($showlist))  $showlist=1;

?>

<?php

  if ( $showclass ==1 ) {
?>

<p><b><font size="5">�ҵ{�n�O</font> <font size="5" color=blue><b><?php echo my_gmdate("Y/m/d (D) H:i:s", intval($now));?></b></font>
<hr>
<form method="post" action="class.php">
	
<?php if ($showm) { 
  ?>
	<p>�п�J�|���s�� <input type="text" name="mid" size="25" id="mid" >
 
	<select size="1" name="bid">
	    <option value="0">None</option>
  <?php 
    for ($i = 0 ; $i < $selbook_num ; $i++) 
    {
		if($selbook_list[$i]["studio"] != "delete" && $selbook_list[$i]["online"] == 1){
			echo "<option value=\"".$selbook_list[$i]["sn"]."\"";
		    if ( $bid == $selbook_list[$i]["sn"] && $bid)
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

	<input type="submit" value="�e�X" name="addcls" id="addcls">
	<input type="reset" value="���s�]�w" >
	<input type="submit" value="�D�|���W��" name="nonmemberclass" id="nonmemberclass">
</p>
	<?php }?>
</form>
<p>����n�O�H��: <b><font color="#0000FF" size="5"><?php echo $chgcount_today;?></font></b> �H��</p>

<a href="book_mngr.php">Book Manager</a>  

<!-- class A -->

<center>
<table border="1" width="70%" id="book"  cellspacing=0 cellpadding=0>
	<tr>
		<td width="10%" bgcolor="#FFC2FF"><center><font color="blue">Studio A</font></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�@ <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�G <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+1*24*60*60); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�T <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+2*24*60*60); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�| <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+3*24*60*60); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�� <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+4*24*60*60); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�� <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+5*24*60*60); ?>)</b></center></td>
		<td rowspan="2" width="13%" bgcolor="#dddddd"><center><font size=5><b>�� <br><font size=3>(<?php echo my_gmdate("m/d", intval($f_time)+6*24*60*60); ?>)</b></center></td>
	</tr>

	<tr> 
		<td width="10%" bgcolor="#aeffce"><center><font color="blue">Studio B</font></center></td>
  </tr>

	<tr>
		<td rowspan="2" width="%" bgcolor="#dddddddd"><center><font size=5><b>(a)</b></font> 15:00 ~ 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "a",NULL,$chglist); ?>
	</tr>
	  <tr>
      <?php echoclassbook ($book_list, $book_num, "B", "a",NULL, $chglist); ?>
	  </tr>

	<tr> </tr>
	<tr>
		<td rowspan="2" width="" bgcolor="#dddddddd"><center><font size=5><b>(b)</b></font> 17:00 ~ 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "b",NULL, $chglist); ?>
	</tr>
	  <tr>
      <?php echoclassbook ($book_list, $book_num, "B", "b",NULL, $chglist); ?>
	  </tr>

	<tr> </tr>
	<tr>
		<td rowspan="2" width="" bgcolor="#dddddddd"><center><font size=5><b>(c)</b></font> 19:00 ~ 20:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "c",NULL, $chglist); ?>
	</tr>
	  <tr>
      <?php echoclassbook ($book_list, $book_num, "B", "c",NULL, $chglist); ?>
	  </tr>

	<tr> </tr>
	<tr>
		<td rowspan="2" width="" bgcolor="#dddddddd"><center><font size=5><b>(d)</b></font> 20:30 ~ 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "d",NULL, $chglist); ?>
	</tr>
	  <tr>
      <?php echoclassbook ($book_list, $book_num, "B", "d",NULL, $chglist); ?>
	  </tr>

</table>

<!-- class B -->
<!-- 
<table border="1" width="70%" id="book">
	<tr>
		<td width="10%" bgcolor="#dddddddd"><center><font color="blue">Studio B</font></center></td>
		<td width="13%" bgcolor="#dddddddd"><center>�@</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>�G</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>�T</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>�|</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>��</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>��</center></td>
		<td width="13%" bgcolor="#dddddddd"><center>��</center></td>
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
-->

<!--  <a href="http://www.lumi-dance-school.com/files/schedule/schedule.jpg" target="_blank">Link Schedule</a> -->

<!--
<table width="100%" border="0" cellspacing=0 cellpadding=0>
	<tr>
		<td >
      <iframe width="100%" height="500" src="class.php?showlist=1"></iframe>
    </td>
		<td >
      <iframe width="100%" height="500" src="class.php?showlist=1"></iframe>
    </td>
  </tr>
</table>

-->

<?php

  }
?>

<?php

  if ( $showlist ==1 ) {
?>

<p>�W�ҦC��:</p>
<table border="1" width="100%" id="table1">
	<tr>
		<td width="5%">�ɶ�</td>
		<td width="25%">�|���s�� <!--<br>(�Ѿl��� at <?php echo $nowdatetime;?>)--></td>
		<td width="15%">�m�W</td>
		<td width="15%">�Ѿl�Ұ�</td>
	</tr>
	<?php 


	  //$chgcount = QueryDeQuotaByTime($chglist,$today);
    $chgcount = $chgcount_today;
    $chglist  = $chglist_today;

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
							echo my_gmdate("Y/m/d (D) H:i:s", intval($chglist[$i]["time"]));
							$birth = my_gmdate("m/d", intval($mlist[0]["birth"]));
							if ($birth == $today = my_gmdate("m/d", intval($now)) ) $birth = "<img border=\"0\" src=\"rsc\cake.jpg\" width=\"40\" ></img>";
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
<?php
  }
?>
</center>

</body>

</html>
