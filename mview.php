<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>新增會員</title>
</head>

<?php
	require ("func.php");

  $mid = _get('mid');
  $qmid = _get('qmid');

  $vip     = _get("vip");
		
	$update =_get("update");
	$renew  =_get("renew");
	$delete =_get("delete");
	$passwd=_get("passwd");

  if (empty($mid) && !empty($qmid)) {
    $mid = $qmid;
    $update = "";
  }


  $name       =_get("name");
  $nickname   =_get("nickname");
  $sex        =_get("sex");
  $by         =_get("by");
  $bm         =_get("bm");
  $bd         =_get("bd");
  $native     =_get("native");
  $id         =_get("id");
  $oc         =_get("oc");
  $wc         =_get("wc");
  $em         =_get("em");
  $pc         =_get("pc");
  $pa         =_get("pa");
  $tp1        =_get("tp1");
  $tp2        =_get("tp2");
  $mp         =_get("mp");
  $mp1        =_get("mp1");
  $rk         =_get("rk");
  $pp		  =_get("pp");

  $mid_2        =_get("mid_2");
  $name_2       =_get("name_2");
  $nickname_2   =_get("nickname_2");
  $sex_2        =_get("sex_2");
  $by_2         =_get("by_2");
  $bm_2         =_get("bm_2");
  $bd_2         =_get("bd_2");
  $native_2     =_get("native_2");
  $id_2         =_get("id_2");
  $oc_2         =_get("oc_2");
  $wc_2         =_get("wc_2");
  $em_2         =_get("em_2");
  $pc_2         =_get("pc_2");
  $pa_2         =_get("pa_2");
  $tp1_2        =_get("tp1_2");
  $tp2_2        =_get("tp2_2");
  $mp_2         =_get("mp_2");
  $mp1_2        =_get("mp1_2");
  $rk_2         =_get("rk_2");
  $pp_2			=_get("pp_2");
  
  $mid_3        =_get("mid_3");
  $name_3       =_get("name_3");
  $nickname_3   =_get("nickname_3");
  $sex_3        =_get("sex_3");
  $by_3         =_get("by_3");
  $bm_3         =_get("bm_3");
  $bd_3         =_get("bd_3");
  $native_3     =_get("native_3");
  $id_3         =_get("id_3");
  $oc_3         =_get("oc_3");
  $wc_3         =_get("wc_3");
  $em_3         =_get("em_3");
  $pc_3         =_get("pc_3");
  $pa_3         =_get("pa_3");
  $tp1_3        =_get("tp1_3");
  $tp2_3        =_get("tp2_3");
  $mp_3         =_get("mp_3");
  $mp1_3        =_get("mp1_3");
  $rk_3         =_get("rk_3");
  $pp_3			=_get("pp_3");

  $msy          =_get("msy");
  $msm          =_get("msm");
  $msd          =_get("msd");
  $comment      =_get("comment");

	if (!empty($delete) && $passwd == $MODIFY_PASS) {
	
		$link = openmysql();
		$query = "DELETE FROM `user` WHERE `user`.`mid` ='$mid' LIMIT 1";
		//echo $query;
		$result = mysqli_statment($link,$query);
		mysqli_close($link);	
		{echo "刪除成功!!";exit(1);}		
	} else if (!empty($delete) && $passwd != $MODIFY_PASS) {
		echo "密碼不正確";
    exit(1);
  }
	
	//echo strtotime("1980/12/05");
	if ( !empty($update) && $passwd == $MODIFY_PASS) {
		//echo "新增資料中....";
		//echo $vip."<br>";
		if (empty($vip)) 		{echo "請選擇會員類型";	exit(1);}
		if (empty($mid)) 		{echo "請輸入會員編號";	exit(1);}
		if (empty($name)) 		{echo "請輸入會員姓名";	exit(1);}
		if (empty($nickname)) 	{echo "請輸入會員暱稱";	exit(1);}
		if (empty($sex)) 		{echo "請輸入會員性別";	exit(1);}
		if (empty($by) || empty($bm) ||empty($bd) ) 		{echo "請輸入會員生日";	exit(1);}
		if (empty($id))			{echo "請輸入會員身分證字號";	exit(1);}
		if (empty($oc)) 		{echo "請輸入會員職業";	exit(1);}

		$mid = ltrim($mid);
		$admin = $vip;
		//echo $mid."<br>";
		//echo $name."<br>";
		//echo $nickname."<br>";
		//echo $sex."<br>";
		//echo $by.$bm.$bd."<br>";
		$birth = my_strtotime($by."/".$bm."/".$bd);
		$mstart = my_strtotime($msy."/".$msm."/".$msd);
		//echo $native."<br>";
		//echo $id."<br>";
		//echo $oc."<br>";	
		$what = $oc;		
		//echo $wc."<br>";	
		$depart = $wc;
		//echo $em."<br>";
		$email = $em;
		//echo $pc.$pa."<br>";
		$addr = $pa;
		//echo $tp1.$tp2."<br>";
		$numberh = $tp2;
		//echo $mp."<br>";
		$cell = $mp;
		//echo $mp1."<br>";
		$numberc = $mp1;
		
		//備註、是否因為往宣報名
		$remark = $rk;
		$prop = $pp;
		
		$link = openmysql();
		$query = "UPDATE `dancer2`.`user` ".
			"SET `name` = '$name', `nickname` = '$nickname', `id`='$id', `sex`='$sex', ".
			"`birth` = '$birth', `cell`='$cell', `numberh`='$numberh', `numberc`='$numberc', ".
			"`email` = '$email', `addr`='$addr', `depart`='$depart', `what`='$what', `admin`= '$admin', `remark`= '$remark', `prop`= '$pp'". 
			" WHERE `user`.`mid` ='$mid' LIMIT 1";
		//echo $query;
		$result = mysqli_statment($link,$query);
		$queryc = $query;
		mysqli_close($link);		

		if ( empty($result))  {echo "修改失敗";exit(1);}
		
		$link = openmysql();
		$now = getNow();
		$query = mysqli_real_escape_string($link, $queryc);
		$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '0', '$query')";
		//echo $query2;
		$result = mysqli_statment($link,$query2);		
		
		if (0 && QueryMemberStartTime ($mid) == "") {
			$link = openmysql();
			$now = getNow();
			$query = $mstart;
			$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now',$TYPE_MEMB_START, '$query')";
			//echo $query2;
			$result = mysqli_statment($link,$query2);
			//secho "起始日修改 type=1";
      UpdateMemberStartTime($mid, $mstart);
		
		} else if (0) {
			$link = openmysql();
			$now = getNow();
			$query = $mstart;
			$query2 = "UPDATE `dancer2`.`change` SET `mid`='$mid', `time`='$now',`type`=$TYPE_MEMB_START,`str`='$query' ".
								"WHERE `type`=$TYPE_MEMB_START AND `mid`='$mid' LIMIT 1 ";
			//echo $query2;
			$result = mysqli_statment($link,$query2) or die ("Invalid query");
			/*echo "起始日修改 type=2";*/

			if (!mysqli_affected_rows($link)) {
				$link = openmysql();
				$now = getNow();
				$query = $mstart;
				$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now',$TYPE_MEMB_START, '$query')";
				//echo $query2;
				$result = mysqli_statment($link,$query2);
				/*echo "起始日修改 type=1";*/
			}

		  if ( empty($result))  echo "新增失敗";			
      else UpdateMemberStartTime($mid, $mstart);
			
		} else {
        UpdateChangeStartTime ($mid, $mstart);
    }
		
						
		if ( empty($result))  {echo "修改失敗";exit(1);}
		$link = openmysql();
		$now = getNow();
		$query = mysqli_real_escape_string($link, $query2);
		$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '0', '$query')";
		//echo $query2;
		$result = mysqli_statment($link,$query2);


		mysqli_close($link);			
		//echo "修改完成";
		
    if ( !empty($comment)) {
      LogMemberInfo($mid, $now, "0", $comment);
    }
		
		
	} else if (!empty($update) && $passwd != $MODIFY_PASS) {
		echo "密碼不正確";
    exit(1);
	}
	
	
	$filter = "AND `mid` = '$mid'";
	$ord = "";
	$start = 0;
	
	//增加參數
	$sexbgc = "";
	$mcount = QueryMember($mlist, $filter,$ord, $start);
	if ($mcount < 1) {
		echo "不存在會員編號 ".$mid;
		exit(1);
	}
	$birth = getdate(intval($mlist[0]["birth"]));
	$mstart = getdate(intval($mlist[0]["mstart"]));
	
	
	if ($mlist[0]["admin"] == 1) $sexbgc="#FFFF00" ;
	else if ($mlist[0]["admin"] == 2) $sexbgc="#FFAAFF";
	else if ($mlist[0]["admin"] == 3) $sexbgc="#CCFFFF";

	$chgcount = QueryChanges($chglist, $mid);
?>
<body>

<form name="ProfileForm2" method="post" align="center" action="mview.php?mid=<?php echo $qmid;?>">

<p align="left">查詢字串 
<input type="reset" value="清除" name="qnone">
<input type="text" name="qmid" value="" size="33"> 
<input type="submit" value="編號" name="q_mid">
<input type="hidden" value="" name="mid">
<input type="hidden" value="" name="update">
</P>
</form>

<form name="ProfileForm" method="post" align="center" action="mview.php?mid=<?php echo $mid;?>">



<input type="hidden" value="" name="qmid">
<input type="hidden" value="<?php echo $mid;?>" name="mid">
	<table cellSpacing="0" cellPadding="4" width="658" bgColor="<?php echo $sexbgc;?>" border="0" id="table2">
		<tr>
			<td bgColor="#f5f09a" colSpan="4"><b>
			<font class="mbody" color="#2c8383">個 人 資 料</font></b><font color="red">（必填）</font></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102">會<font class="mbody">　　　員</font></td>
			<td width="313">
			<?php

				if ( strncmp($mlist[0]["mid"], "SIS", 3) == 0 ) {
					echo "<input type=\"radio\" value=\"4\" name=\"vip\" checked>".
								"<a href=\"mview.php?mid=".substr($mlist[0]["mid"],4)."\">姐妹卡</a>"; 
				} else if ($mlist[0]["admin"] == 4 ) {
						echo "<input type=\"radio\" value=\"4\" name=\"vip\" checked>";
						echo "姐妹卡 ";
						echo "<a href=\"mview.php?mid=SIS2".$mlist[0]["mid"]."\">會員2</a> "; 
						echo "<a href=\"mview.php?mid=SIS3".$mlist[0]["mid"]."\">會員3</a>"; 
				}	else {
			?>

			<input type="radio" value="1" name="vip" <?php if ($mlist[0]["admin"]==1) echo "checked";?>>VIP 
			<input type="radio" value="2" name="vip" <?php if ($mlist[0]["admin"]==2) echo "checked";?>>一般會員
			<input type="radio" value="3" name="vip" <?php if ($mlist[0]["admin"]==3) echo "checked";?>>非會員 
			<!-- <input type="radio" value="4" name="vip" <?php if ($mlist[0]["admin"]==4) echo "checked";?>>姐妹卡  -->
			<?php } ?>
			</td>			
			<td width="205" rowspan="7">
			<img border="0" src="../drs.20130811/pic/<?php echo $mid;?>.jpg" width="150"  name="test"></td>			
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102">會 員 編 號</td>
			<td width="313">
				<!-- <input name="mid" size="21"  value="<?php echo $mlist[0]["mid"];?>">-->
				<b><a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"><?php echo $mlist[0]["mid"];?></a></b>
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102"></td>
			<td width="313">
				課堂= <b><font color="red"><?php echo $mlist[0]["quota"];?></b></font>
				<!-- 點數= <b><font color="blue"><?php echo $mlist[0]["bound"];?></b></font>-->
				&nbsp;&nbsp;<font size="2"><a href="quota.php?querymid=add&mid=<?php echo $mlist[0]["mid"];?>">增減</a></font>
				
				<br> 課堂 餘 <?php	echo $mlist[0]["max_class_mon"];?>月 <?php	echo $mlist[0]["max_class_day"];?> 天 
				<br> 會員 餘 <?php	echo $mlist[0]["max_mstart_mon"];?>月  <?php	echo $mlist[0]["max_mstart_day"];?> 天
			</td>
		</tr>	
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">會員起始日</font></td>
			<td>西 元 <input maxLength="4" size="4" name="msy" value="<?php echo $mstart["year"];?>"> 年 
			<input maxLength="4" size="4" name="msm" value="<?php echo $mstart["mon"];?>">
			</select> 月
			<input maxLength="4" size="4" name="msd" value="<?php echo $mstart["mday"];?>">
			</select> 日</td>
		</tr>			
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102"><font class="mbody">姓　　　名</font></td>
			<td width="313"><input name="name" size="21"  value="<?php echo $mlist[0]["name"];?>"></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">暱　　　稱</font></td>
			<td><input name="nickname" size="30"  value="<?php echo $mlist[0]["nickname"];?>"> </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">性　　　別</font></td>
			<td vAlign="top" width="313" height="19">
			<input type="radio" value="1" name="sex" <?php if ($mlist[0]["sex"]==1) echo "checked";?>>男性 
			<input type="radio" value="2" name="sex" <?php if ($mlist[0]["sex"]==2) echo "checked";?>>女性 </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">生　　　日</font></td>
			<td>西 元 <input maxLength="4" size="4" name="by" value="<?php echo $birth["year"];?>"> 年 
			<input maxLength="4" size="4" name="bm" value="<?php echo $birth["mon"];?>">
			</select> 月
			<input maxLength="4" size="4" name="bd" value="<?php echo $birth["mday"];?>">
			</select> 日</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">身 分 證 字 號</font></td>
			<td> 
			 
			<input name="id" size="26" value="<?php echo $mlist[0]["id"];?>"></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="4">
			------------------------------------------------------------------------------------------------------------</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">職　　　業</font></td>
			<td colspan="2"><select size="1" name="oc">
			<option value="金融/保險" <?php if ($mlist[0]["what"] =="金融/保險") echo "selected";?> >金融/保險</option>
			<option value="房地產"    <?php if ($mlist[0]["what"] =="房地產") echo "selected";?> >房地產</option>
			<option value="政府機關"  <?php if ($mlist[0]["what"] =="政府機關") echo "selected";?>>政府機關</option>
			<option value="軍警"      <?php if ($mlist[0]["what"] =="軍警") echo "selected";?>>軍警</option>
			<option value="教育/研究" <?php if ($mlist[0]["what"] =="教育/研究") echo "selected";?>>教育/研究</option>
			<option value="經商"      <?php if ($mlist[0]["what"] =="經商") echo "selected";?>>經商</option>
			<option value="建築/營造" <?php if ($mlist[0]["what"] =="建築/營造") echo "selected";?>>建築/營造</option>
			<option value="製造/供應商" <?php if ($mlist[0]["what"] =="製造/供應商") echo "selected";?>>製造/供應商</option>
			<option value="資訊"      <?php if ($mlist[0]["what"] =="資訊") echo "selected";?>>資訊</option>
			<option value="服務"      <?php if ($mlist[0]["what"] =="服務") echo "selected";?>>服務</option>
			<option value="醫療"     <?php if ($mlist[0]["what"] =="醫療") echo "selected";?>>醫療</option>
			<option value="法律相關行業" <?php if ($mlist[0]["what"] =="法律相關行業") echo "selected";?>>法律相關行業</option>
			<option value="流通/零售" <?php if ($mlist[0]["what"] =="流通/零售") echo "selected";?>>流通/零售</option>
			<option value="交通/運輸/旅遊" <?php if ($mlist[0]["what"] =="交通/運輸/旅遊") echo "selected";?>>交通/運輸/旅遊</option>
			<option value="娛樂/出版" <?php if ($mlist[0]["what"] =="娛樂/出版") echo "selected";?>>娛樂/出版</option>
			<option value="傳播/公共關係/廣告/行銷"<?php if ($mlist[0]["what"] =="傳播/公共關係/廣告/行銷") echo "selected";?>>傳播/公共關係/廣告/行銷</option>
			<option value="藝術" <?php if ($mlist[0]["what"] =="藝術") echo "selected";?>>藝術</option>
			<option value="農漁牧" <?php if ($mlist[0]["what"] =="農漁牧") echo "selected";?>>農漁牧</option>
			<option value="學生" <?php if ($mlist[0]["what"] =="學生") echo "selected";?>>學生</option>
			<option value="家管" <?php if ($mlist[0]["what"] =="家管") echo "selected";?>>家管</option>
			<option value="待業中" <?php if ($mlist[0]["what"] =="待業中") echo "selected";?>>待業中</option>
			<option value="其他" <?php if ($mlist[0]["what"] =="其他") echo "selected";?>>其他</option>
			</select> </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">公司/學校名稱</font></td>
			<td colspan="2"><input name="wc" size="50" value="<?php echo $mlist[0]["depart"];?>"> </td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="4"><b><font class="mbody" color="#2c8383">地址∕聯絡資料 
			</font></b><font color="red">（必填）</font></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">聯 絡 信 箱</font></td>
			<td colspan="2"><input size="51" name="em"  value="<?php echo $mlist[0]["email"];?>"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">通 訊 地 址&nbsp;</font></td>
			<td colspan="2"><input size="45" name="pa"  value="<?php echo $mlist[0]["addr"];?>"> </td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">電　　&nbsp;&nbsp; 話</font></td>
			<td colspan="2"><font size="2">市&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			話&nbsp; <input size="19" name="tp2"  value="<?php echo $mlist[0]["numberh"];?>"><br>
			行&nbsp; 動&nbsp;&nbsp;&nbsp;&nbsp; 電 話&nbsp; 
			<input name="mp" size="25"  value="<?php echo $mlist[0]["cell"];?>"><br>
			緊急連絡電話&nbsp; 
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<input name="mp1" size="25"  value="<?php echo $mlist[0]["numberc"];?>"></font></td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">備　　　註</font></td>
			<td colspan="2"><input size="60" name="rk" height = "50" width = "60" value="<?php echo $mlist[0]["remark"];?>"> </td>
		</tr>
		<tr>
		
		<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">是否因為網路宣傳報名?</font></td>
			<td vAlign="top" width="313" height="19">
			<input type="radio" value="1" name="pp" <?php if ($mlist[0]["prop"]==1) echo "checked";?>>是 
			<input type="radio" value="2" name="pp" <?php if ($mlist[0]["prop"]==2) echo "checked";?>>否
			<input type="radio" value="3" name="pp" <?php if ($mlist[0]["prop"]==3) echo "checked";?>>舊會員</td>
		</tr>
		
		<tr>
			<td vAlign="top" align="right" colspan="4">
			------------------------------------------------------------------------------------------------------------</td>
		</tr>
		<tr>
			<td colSpan="4" vAlign="top" align="center">
			<div align="center">
				<table cellSpacing="4" cellPadding="0" width="650" border="0" id="table3">
					<tr>
						<td width="600">
						紀錄資訊: <input name="comment"  type="comment" size="50" value=""><br>
						授權碼: <input name="passwd"  type="password" size="25" value="">
						<div align="center">
							<input type="submit" value="資料更新" name="update"> &nbsp;&nbsp;&nbsp;
							<input type="submit" value="重新載入" name="renew"><a href="backup.php">系統備份</a>
							<input type="submit" value="刪除會員" name="delete">
							</div>
						</td>
					</tr>
				</table>

				<p align="left">　</div>
			</td>
		</tr>		
	</table>
</form>
<br>
				<b><a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"><?php echo $mlist[0]["mid"];?></a></b>
				<p align="left">修改記錄</p>
				<hr>
				<table border="1" width="100%" id="table4">
					<tr bgColor="#aaaaaa">
						<td width="25%"><font size="1">時間</font></td>
						<td><font size="1">修正項目</font></td>
					</tr>
					<?php 
						for ($i = 0 ; $i < $chgcount ; $i++) { 

              if ($chglist[$i]["type"] == "2" ) continue;
          ?>
					<tr <?php

								switch($chglist[$i]["type"])
								{
									case "0": 
                      if ( strstr($chglist[$i]["str"], "Remove Quota ")) {
                        echo "bgColor=\"#CC0000\""; 
                      } else {
                      }
                      break;
									case "1": 
                      if (  !strstr($chglist[$i]["str"], "-" )) {
                        echo "bgColor=\"#AAAAFF\""; 
                      } else {
                        echo "bgColor=\"#CCFFFF\""; 
                      }
                      break;
									case "5": echo "bgColor=\"#f5f09a\""; break;
									case "99": echo "bgColor=\"#88ff00\""; break;
                }
            ?>>
						<td width="25%"><font size="2"><?php 
							/*echo $chglist[$i]["time"];*/
							echo gmdate("Y/m/d (D) H:i:s",intval($chglist[$i]["time"]));
							
						?></td>
						<td><font size="2"><?php 
								switch($chglist[$i]["type"])
								{
									case "0": 
                    $temp_str = $chglist[$i]["str"];
                    $temp_str = str_replace("numberh","市話", $temp_str);
										$temp_str = str_replace("numberc","緊急連絡電話", $temp_str);
										$temp_str = str_replace("cell","手機", $temp_str);
										$temp_str = str_replace("nickname","暱稱", $temp_str);
										//echo "紀錄]=> ".$chglist[$i]["str"];break;
										echo "紀錄]=> ".$temp_str;break;
									case "1": echo "課堂]=> ".$chglist[$i]["str"];break;
									case "2": echo "點數]=> ".$chglist[$i]["str"];break;
									case "5": 
                      $b_studio= $b_teacher= $b_day= $b_time= $b_name= $b_sub_name=$b_comment=$b_online = "";
					  findbook($chglist[$i]["str"], $b_studio, $b_teacher, $b_day, $b_time, $b_name, $b_sub_name, $b_comment, $b_online);  
                      echo "上課]=> ".$b_name."(".$b_teacher.")";
                      break;
									case "99": echo "會員起始時間]=> ".gmdate("Y/m/d (D) H:i:s", intval($chglist[$i]["str"]))."(".$chglist[$i]["str"].")";break;
								}
							
								?>	</td>
					</tr>
					<?php }?>
				</table>
</body>


</html>
