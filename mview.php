<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>�s�W�|��</title>
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
		{echo "�R�����\!!";exit(1);}		
	} else if (!empty($delete) && $passwd != $MODIFY_PASS) {
		echo "�K�X�����T";
    exit(1);
  }
	
	//echo strtotime("1980/12/05");
	if ( !empty($update) && $passwd == $MODIFY_PASS) {
		//echo "�s�W��Ƥ�....";
		//echo $vip."<br>";
		if (empty($vip)) 		{echo "�п�ܷ|������";	exit(1);}
		if (empty($mid)) 		{echo "�п�J�|���s��";	exit(1);}
		if (empty($name)) 		{echo "�п�J�|���m�W";	exit(1);}
		if (empty($nickname)) 	{echo "�п�J�|���ʺ�";	exit(1);}
		if (empty($sex)) 		{echo "�п�J�|���ʧO";	exit(1);}
		if (empty($by) || empty($bm) ||empty($bd) ) 		{echo "�п�J�|���ͤ�";	exit(1);}
		if (empty($id))			{echo "�п�J�|�������Ҧr��";	exit(1);}
		if (empty($oc)) 		{echo "�п�J�|��¾�~";	exit(1);}

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
		
		//�Ƶ��B�O�_�]�����ų��W
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

		if ( empty($result))  {echo "�ק異��";exit(1);}
		
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
			//secho "�_�l��ק� type=1";
      UpdateMemberStartTime($mid, $mstart);
		
		} else if (0) {
			$link = openmysql();
			$now = getNow();
			$query = $mstart;
			$query2 = "UPDATE `dancer2`.`change` SET `mid`='$mid', `time`='$now',`type`=$TYPE_MEMB_START,`str`='$query' ".
								"WHERE `type`=$TYPE_MEMB_START AND `mid`='$mid' LIMIT 1 ";
			//echo $query2;
			$result = mysqli_statment($link,$query2) or die ("Invalid query");
			/*echo "�_�l��ק� type=2";*/

			if (!mysqli_affected_rows($link)) {
				$link = openmysql();
				$now = getNow();
				$query = $mstart;
				$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now',$TYPE_MEMB_START, '$query')";
				//echo $query2;
				$result = mysqli_statment($link,$query2);
				/*echo "�_�l��ק� type=1";*/
			}

		  if ( empty($result))  echo "�s�W����";			
      else UpdateMemberStartTime($mid, $mstart);
			
		} else {
        UpdateChangeStartTime ($mid, $mstart);
    }
		
						
		if ( empty($result))  {echo "�ק異��";exit(1);}
		$link = openmysql();
		$now = getNow();
		$query = mysqli_real_escape_string($link, $query2);
		$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '0', '$query')";
		//echo $query2;
		$result = mysqli_statment($link,$query2);


		mysqli_close($link);			
		//echo "�ק粒��";
		
    if ( !empty($comment)) {
      LogMemberInfo($mid, $now, "0", $comment);
    }
		
		
	} else if (!empty($update) && $passwd != $MODIFY_PASS) {
		echo "�K�X�����T";
    exit(1);
	}
	
	
	$filter = "AND `mid` = '$mid'";
	$ord = "";
	$start = 0;
	
	//�W�[�Ѽ�
	$sexbgc = "";
	$mcount = QueryMember($mlist, $filter,$ord, $start);
	if ($mcount < 1) {
		echo "���s�b�|���s�� ".$mid;
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

<p align="left">�d�ߦr�� 
<input type="reset" value="�M��" name="qnone">
<input type="text" name="qmid" value="" size="33"> 
<input type="submit" value="�s��" name="q_mid">
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
			<font class="mbody" color="#2c8383">�� �H �� ��</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102">�|<font class="mbody">�@�@�@��</font></td>
			<td width="313">
			<?php

				if ( strncmp($mlist[0]["mid"], "SIS", 3) == 0 ) {
					echo "<input type=\"radio\" value=\"4\" name=\"vip\" checked>".
								"<a href=\"mview.php?mid=".substr($mlist[0]["mid"],4)."\">�j�f�d</a>"; 
				} else if ($mlist[0]["admin"] == 4 ) {
						echo "<input type=\"radio\" value=\"4\" name=\"vip\" checked>";
						echo "�j�f�d ";
						echo "<a href=\"mview.php?mid=SIS2".$mlist[0]["mid"]."\">�|��2</a> "; 
						echo "<a href=\"mview.php?mid=SIS3".$mlist[0]["mid"]."\">�|��3</a>"; 
				}	else {
			?>

			<input type="radio" value="1" name="vip" <?php if ($mlist[0]["admin"]==1) echo "checked";?>>VIP 
			<input type="radio" value="2" name="vip" <?php if ($mlist[0]["admin"]==2) echo "checked";?>>�@��|��
			<input type="radio" value="3" name="vip" <?php if ($mlist[0]["admin"]==3) echo "checked";?>>�D�|�� 
			<!-- <input type="radio" value="4" name="vip" <?php if ($mlist[0]["admin"]==4) echo "checked";?>>�j�f�d  -->
			<?php } ?>
			</td>			
			<td width="205" rowspan="7">
			<img border="0" src="../drs.20130811/pic/<?php echo $mid;?>.jpg" width="150"  name="test"></td>			
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102">�| �� �s ��</td>
			<td width="313">
				<!-- <input name="mid" size="21"  value="<?php echo $mlist[0]["mid"];?>">-->
				<b><a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"><?php echo $mlist[0]["mid"];?></a></b>
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102"></td>
			<td width="313">
				�Ұ�= <b><font color="red"><?php echo $mlist[0]["quota"];?></b></font>
				<!-- �I��= <b><font color="blue"><?php echo $mlist[0]["bound"];?></b></font>-->
				&nbsp;&nbsp;<font size="2"><a href="quota.php?querymid=add&mid=<?php echo $mlist[0]["mid"];?>">�W��</a></font>
				
				<br> �Ұ� �l <?php	echo $mlist[0]["max_class_mon"];?>�� <?php	echo $mlist[0]["max_class_day"];?> �� 
				<br> �|�� �l <?php	echo $mlist[0]["max_mstart_mon"];?>��  <?php	echo $mlist[0]["max_mstart_day"];?> ��
			</td>
		</tr>	
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�|���_�l��</font></td>
			<td>�� �� <input maxLength="4" size="4" name="msy" value="<?php echo $mstart["year"];?>"> �~ 
			<input maxLength="4" size="4" name="msm" value="<?php echo $mstart["mon"];?>">
			</select> ��
			<input maxLength="4" size="4" name="msd" value="<?php echo $mstart["mday"];?>">
			</select> ��</td>
		</tr>			
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102"><font class="mbody">�m�@�@�@�W</font></td>
			<td width="313"><input name="name" size="21"  value="<?php echo $mlist[0]["name"];?>"></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@��</font></td>
			<td><input name="nickname" size="30"  value="<?php echo $mlist[0]["nickname"];?>"> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@�O</font></td>
			<td vAlign="top" width="313" height="19">
			<input type="radio" value="1" name="sex" <?php if ($mlist[0]["sex"]==1) echo "checked";?>>�k�� 
			<input type="radio" value="2" name="sex" <?php if ($mlist[0]["sex"]==2) echo "checked";?>>�k�� </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�͡@�@�@��</font></td>
			<td>�� �� <input maxLength="4" size="4" name="by" value="<?php echo $birth["year"];?>"> �~ 
			<input maxLength="4" size="4" name="bm" value="<?php echo $birth["mon"];?>">
			</select> ��
			<input maxLength="4" size="4" name="bd" value="<?php echo $birth["mday"];?>">
			</select> ��</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�� �� �� �r ��</font></td>
			<td> 
			 
			<input name="id" size="26" value="<?php echo $mlist[0]["id"];?>"></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="4">
			------------------------------------------------------------------------------------------------------------</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">¾�@�@�@�~</font></td>
			<td colspan="2"><select size="1" name="oc">
			<option value="����/�O�I" <?php if ($mlist[0]["what"] =="����/�O�I") echo "selected";?> >����/�O�I</option>
			<option value="�Цa��"    <?php if ($mlist[0]["what"] =="�Цa��") echo "selected";?> >�Цa��</option>
			<option value="�F������"  <?php if ($mlist[0]["what"] =="�F������") echo "selected";?>>�F������</option>
			<option value="�xĵ"      <?php if ($mlist[0]["what"] =="�xĵ") echo "selected";?>>�xĵ</option>
			<option value="�Ш|/��s" <?php if ($mlist[0]["what"] =="�Ш|/��s") echo "selected";?>>�Ш|/��s</option>
			<option value="�g��"      <?php if ($mlist[0]["what"] =="�g��") echo "selected";?>>�g��</option>
			<option value="�ؿv/��y" <?php if ($mlist[0]["what"] =="�ؿv/��y") echo "selected";?>>�ؿv/��y</option>
			<option value="�s�y/������" <?php if ($mlist[0]["what"] =="�s�y/������") echo "selected";?>>�s�y/������</option>
			<option value="��T"      <?php if ($mlist[0]["what"] =="��T") echo "selected";?>>��T</option>
			<option value="�A��"      <?php if ($mlist[0]["what"] =="�A��") echo "selected";?>>�A��</option>
			<option value="����"     <?php if ($mlist[0]["what"] =="����") echo "selected";?>>����</option>
			<option value="�k�߬�����~" <?php if ($mlist[0]["what"] =="�k�߬�����~") echo "selected";?>>�k�߬�����~</option>
			<option value="�y�q/�s��" <?php if ($mlist[0]["what"] =="�y�q/�s��") echo "selected";?>>�y�q/�s��</option>
			<option value="��q/�B��/�ȹC" <?php if ($mlist[0]["what"] =="��q/�B��/�ȹC") echo "selected";?>>��q/�B��/�ȹC</option>
			<option value="�T��/�X��" <?php if ($mlist[0]["what"] =="�T��/�X��") echo "selected";?>>�T��/�X��</option>
			<option value="�Ǽ�/���@���Y/�s�i/��P"<?php if ($mlist[0]["what"] =="�Ǽ�/���@���Y/�s�i/��P") echo "selected";?>>�Ǽ�/���@���Y/�s�i/��P</option>
			<option value="���N" <?php if ($mlist[0]["what"] =="���N") echo "selected";?>>���N</option>
			<option value="�A����" <?php if ($mlist[0]["what"] =="�A����") echo "selected";?>>�A����</option>
			<option value="�ǥ�" <?php if ($mlist[0]["what"] =="�ǥ�") echo "selected";?>>�ǥ�</option>
			<option value="�a��" <?php if ($mlist[0]["what"] =="�a��") echo "selected";?>>�a��</option>
			<option value="�ݷ~��" <?php if ($mlist[0]["what"] =="�ݷ~��") echo "selected";?>>�ݷ~��</option>
			<option value="��L" <?php if ($mlist[0]["what"] =="��L") echo "selected";?>>��L</option>
			</select> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">���q/�ǮզW��</font></td>
			<td colspan="2"><input name="wc" size="50" value="<?php echo $mlist[0]["depart"];?>"> </td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="4"><b><font class="mbody" color="#2c8383">�a�}�A�p����� 
			</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�p �� �H �c</font></td>
			<td colspan="2"><input size="51" name="em"  value="<?php echo $mlist[0]["email"];?>"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�q �T �a �}&nbsp;</font></td>
			<td colspan="2"><input size="45" name="pa"  value="<?php echo $mlist[0]["addr"];?>"> </td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�q�@�@&nbsp;&nbsp; ��</font></td>
			<td colspan="2"><font size="2">��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			��&nbsp; <input size="19" name="tp2"  value="<?php echo $mlist[0]["numberh"];?>"><br>
			��&nbsp; ��&nbsp;&nbsp;&nbsp;&nbsp; �q ��&nbsp; 
			<input name="mp" size="25"  value="<?php echo $mlist[0]["cell"];?>"><br>
			���s���q��&nbsp; 
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<input name="mp1" size="25"  value="<?php echo $mlist[0]["numberc"];?>"></font></td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�ơ@�@�@��</font></td>
			<td colspan="2"><input size="60" name="rk" height = "50" width = "60" value="<?php echo $mlist[0]["remark"];?>"> </td>
		</tr>
		<tr>
		
		<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�O�_�]�������Ŷǳ��W?</font></td>
			<td vAlign="top" width="313" height="19">
			<input type="radio" value="1" name="pp" <?php if ($mlist[0]["prop"]==1) echo "checked";?>>�O 
			<input type="radio" value="2" name="pp" <?php if ($mlist[0]["prop"]==2) echo "checked";?>>�_
			<input type="radio" value="3" name="pp" <?php if ($mlist[0]["prop"]==3) echo "checked";?>>�·|��</td>
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
						������T: <input name="comment"  type="comment" size="50" value=""><br>
						���v�X: <input name="passwd"  type="password" size="25" value="">
						<div align="center">
							<input type="submit" value="��Ƨ�s" name="update"> &nbsp;&nbsp;&nbsp;
							<input type="submit" value="���s���J" name="renew"><a href="backup.php">�t�γƥ�</a>
							<input type="submit" value="�R���|��" name="delete">
							</div>
						</td>
					</tr>
				</table>

				<p align="left">�@</div>
			</td>
		</tr>		
	</table>
</form>
<br>
				<b><a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>"><?php echo $mlist[0]["mid"];?></a></b>
				<p align="left">�ק�O��</p>
				<hr>
				<table border="1" width="100%" id="table4">
					<tr bgColor="#aaaaaa">
						<td width="25%"><font size="1">�ɶ�</font></td>
						<td><font size="1">�ץ�����</font></td>
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
                    $temp_str = str_replace("numberh","����", $temp_str);
										$temp_str = str_replace("numberc","���s���q��", $temp_str);
										$temp_str = str_replace("cell","���", $temp_str);
										$temp_str = str_replace("nickname","�ʺ�", $temp_str);
										//echo "����]=> ".$chglist[$i]["str"];break;
										echo "����]=> ".$temp_str;break;
									case "1": echo "�Ұ�]=> ".$chglist[$i]["str"];break;
									case "2": echo "�I��]=> ".$chglist[$i]["str"];break;
									case "5": 
                      $b_studio= $b_teacher= $b_day= $b_time= $b_name= $b_sub_name=$b_comment=$b_online = "";
					  findbook($chglist[$i]["str"], $b_studio, $b_teacher, $b_day, $b_time, $b_name, $b_sub_name, $b_comment, $b_online);  
                      echo "�W��]=> ".$b_name."(".$b_teacher.")";
                      break;
									case "99": echo "�|���_�l�ɶ�]=> ".gmdate("Y/m/d (D) H:i:s", intval($chglist[$i]["str"]))."(".$chglist[$i]["str"].")";break;
								}
							
								?>	</td>
					</tr>
					<?php }?>
				</table>
</body>


</html>
