<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>�s�W�|��</title>
</head>

<?php
	require ("func.php");

  $memtype = _get("memtype");
  $addnew  = _get("addnew");
  $pmemtype = _get("pmemtype");
  $vip     = _get("vip");
		
  $mid        =_get("mid");
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
  $birth      =_get("birth");
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
  $birth_2      =_get("birth_2");
  $rk_2         =_get("rk_2");
  
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
  $birth_3      =_get("birth_3");
  $rk_3           =_get("rk_3");
  
  $checkerror = _get("checkerror");
  $checkerror2 = _get("checkerror2");
  $checkerror3 = _get("checkerror3");

  /*
  if (!empty($vip)) {

	  switch ($vip) {
			case 1: $memtype = "VIP";       break;
			case 2: $memtype = "�@��|��";  break;
			case 3: $memtype = "�D�|��";    break;
			case 4: $memtype = "�j�f�d";    break;
			default: $memtype = "�L���w";   break;
	  }
  }
  */

/*
  if (empty($memtype) || !empty($addnew)) {
      echo "............";
      $memtype = $pmemtype;
  }
  */

	switch ($memtype) {
			case "VIP": 			$vip = 1;break;
			case "�@��|��": 	$vip = 2;break;
			case "�D�|��": 		$vip = 3;break;
			case "�j�f�d": 		$vip = 4;break;
			default: /*$memtype = "�L���w"; */break;
	}
	
  //echo $memtype.".".$pmemtype.".".$addnew.".".$vip;
	$sister = ($vip ==4) ? 1:0;
	$admin = $vip;

	if ( !empty($addnew)) {
		$checkerror = 0;
//		echo "�s�W��Ƥ�....";
//		echo $vip."<br>";
		if (empty($vip)) 			{$checkerror=1; echo "�п�ܷ|������<br>";	}
		if (empty($mid)) 			{$checkerror=1; echo "�п�J�|���s��<br>";	}
		if (empty($name)) 			{$checkerror=1; echo "�п�J�|���m�W<br>";	}
		/*if (empty($nickname)) 		{$checkerror=1; echo "�п�J�|���ʺ�<br>";	}*/
		if (empty($sex)) 			{$checkerror=1; echo "�п�J�|���ʧO<br>";	}
		if (empty($by) || empty($bm) ||empty($bd) ) 		{$checkerror=1; echo "�п�J�|���ͤ�<br>";}
		/*if (empty($id))				{$checkerror=1; echo "�п�J�|�������Ҧr��<br>";}*/
		//if (empty($oc)) 			{$checkerror=1; echo "�п�J�|��¾�~<br>";}
		//if (empty($pc) || empty($pa)) {$checkerror=1; echo "�п�J�|���a�}<br>";}
		//if (empty($wc) || empty($wc)) {$checkerror=1; echo "�п�J�|�����q/�ǮզW��<br>";}
		if (empty($em)) {$checkerror=1; echo "�п�J�|��E-Mail<br>";}
		//if (empty($tp2)) {$checkerror=1; echo "�п�J�|������<br>";}
		if (empty($mp)) {$checkerror=1; echo "�п�J�|���q��<br>";}
		
		if ($vip == 4) {
			//if (empty($mid_2)) 			{$checkerror=1; echo "�п�J�|��2�s��<br>";	}
			if (empty($name_2)) 			{$checkerror2=1; echo "�п�J�|��2�m�W<br>";	}
			if (empty($nickname_2)) 		{$checkerror2=1; echo "�п�J�|��2�ʺ�<br>";	}
			if (empty($sex_2)) 			{$checkerror2=1; echo "�п�J�|��2�ʧO<br>";	}
			if (empty($by_2) || empty($bm_2) ||empty($bd_2) ) 		{$checkerror2=1; echo "�п�J�|��2�ͤ�<br>";}
			if (empty($id_2))				{$checkerror2=1; echo "�п�J�|��2�����Ҧr��<br>";$id_2 = "id2".$mid;}
			//if (empty($oc_2)) 			{$checkerror=1; echo "�п�J�|��2¾�~<br>";}
			//if (empty($pc_2) || empty($pa_2)) {$checkerror=1; echo "�п�J�|��2�a�}<br>";}
			//if (empty($wc_2) || empty($wc_2)) {$checkerror=1; echo "�п�J�|��2���q/�ǮզW��<br>";}
			if (empty($em_2)) {$checkerror2=1; echo "�п�J�|��2 E-Mail<br>";}
			//if (empty($tp2_2)) {$checkerror2=1; echo "�п�J�|��2 ����<br>";}
			if (empty($mp_2)) {$checkerror2=1; echo "�п�J�|��2 �q��<br>";}
	
			//if (empty($mid_3)) 			{$checkerror=1; echo "�п�J�|��3 �s��<br>";	}
			if (empty($name_3)) 			{$checkerror3=1; echo "�п�J�|��3 �m�W<br>";	}
			if (empty($nickname_3)) 		{$checkerror3=1; echo "�п�J�|��3 �ʺ�<br>";	}
			if (empty($sex_3)) 			{$checkerror3=1; echo "�п�J�|��3 �ʧO<br>";	}
			if (empty($by_3) || empty($bm_3) ||empty($bd_3) ) 		{$checkerror3=1; echo "�п�J�|��3 �ͤ�<br>";}
			if (empty($id_3))				{$checkerror3=1; echo "�п�J�|��3 �����Ҧr��<br>"; $id_3 = "id3".$mid;}
			//if (empty($oc_3)) 			{$checkerror=1; echo "�п�J�|��3 ¾�~<br>";}
			//if (empty($pc_3) || empty($pa_3)) {$checkerror=1; echo "�п�J�|��3 �a�}<br>";}
			//if (empty($wc_3) || empty($wc_3)) {$checkerror=1; echo "�п�J�|��3 ���q/�ǮզW��<br>";}
			if (empty($em_3)) {$checkerror3=1; echo "�п�J�|��3 E-Mail<br>";}
		//	if (empty($tp2_3)) {$checkerror3=1; echo "�п�J�|��3 ����<br>";}
			if (empty($mp_3)) {$checkerror3=1; echo "�п�J�|��3 �q��<br>";}
			
		}
		
		if ( $checkerror) exit(1);
		if ( $checkerror) {
			echo "<br>�|�� ��Ƥ��� �Ф�ʥ[�J!";
			exit(1);
		}
		if ( $checkerror2) {
			echo "<br>�|��2��Ƥ��� �Ф�ʥ[�J!";
			exit(1);
		}
		if ( $checkerror3) {
			echo "<br>�|��3��Ƥ��� �Ф�ʥ[�J!";
			exit(1);
		}

		
		$admin = $vip;
		
//		echo $mid."<br>";
//		echo $name."<br>";
//		echo $nickname."<br>";
//		echo $sex."<br>";
//		echo $by.$bm.$bd."<br>";
		$birth = $by."/".$bm."/".$bd;
		$birth_1 = my_strtotime($birth);
//		echo $native."<br>";
//		echo $id."<br>";
//		echo $oc."<br>";	
		$what = $oc;		
//		echo $wc."<br>";	
		$depart = $wc;
//		echo $em."<br>";
		$email = $em;
//		echo $pc.$pa."<br>";
		$addr = $pc." ".$pa;
//		echo $tp1.$tp2."<br>";
		$numberh = $tp1."-".$tp2;
//		echo $mp."<br>";
		$cell = $mp;
//		echo $mp1."<br>";
		$numberc = $mp1;
		// �[�W�Ƶ��B�O�_�]�����ų��W
		$remark = $rk;
		$prop = $pp;
		
		if ($vip == 4) {
	//		echo $mid_2."<br>";
	//		echo $name_2."<br>";
	//		echo $nickname_2."<br>";
	//		echo $sex_2."<br>";
	//		echo $by_2.$bm_2.$bd_2."<br>";
			$birth = $by_2."/".$bm_2."/".$bd_2;
			$birth_2 = my_strtotime($birth);
	//		echo $native_2."<br>";
	//		echo $id_2."<br>";
	//		echo $oc_2."<br>";	
			$what_2 = $oc_2;		
	//		echo $wc_2."<br>";	
			$depart_2 = $wc_2;
	//		echo $em_2."<br>";
			$email_2 = $em_2;
	//		echo $pc_2.$pa_2."<br>";
			$addr_2 = $pc_2." ".$pa_2;
	//		echo $tp1_2.$tp2_2."<br>";
			$numberh_2 = $tp1_2."-".$tp2_2;
	//		echo $mp_2."<br>";
			$cell_2 = $mp_2;
	//		echo $mp1_2."<br>";
			$numberc_2 = $mp1_2;
			$remark_2  = $rk_2;
			
	//		echo $mid_3."<br>";
	//		echo $name_3."<br>";
	//		echo $nickname_3."<br>";
	//		echo $sex_3."<br>";
	//		echo $by_3.$bm_3.$bd_3."<br>";
			$birth = $by_3."/".$bm_3."/".$bd_3;
			$birth_3 = my_strtotime($birth);
	//		echo $native_3."<br>";
	//		echo $id_3."<br>";
	//		echo $oc_3."<br>";	
			$what_3 = $oc_3;		
	//		echo $wc_3."<br>";	
			$depart_3 = $wc_3;
	//		echo $em_3."<br>";
			$email_3 = $em_3;
	//		echo $pc_3.$pa_3."<br>";
			$addr_3 = $pc_3." ".$pa_3;
	//		echo $tp1_3.$tp2_3."<br>";
			$numberh_3 = $tp1_3."-".$tp2_3;
	//		echo $mp_3."<br>";
			$cell_3 = $mp_3;
	//		echo $mp1_3."<br>";
			$numberc_3 = $mp1_3;
			$remark_3  = $rk_3;
		}		
		
    if ( !$checkerror ) {
			$link = openmysql();
			$query = "INSERT INTO `user` (  `mid`,  `name`,  `nickname`,  `id`,  `sex`, `birth`,  `cell`,  `numberh`, `numberc`, `email`,  `addr`,  `depart`,  `what`,    `admin`, `remark`, `prop`) ".
					 "VALUES 			 ( '$mid', '$name', '$nickname', '$id', '$sex','$birth_1', '$cell', '$numberh', '$numberc', '$email',  '$addr', '$depart', '$what', '$admin', '$remark', '$prop')";
			//echo $query;
			$result = mysqli_statment($link,$query);

			$now = getNow();
      /*
			$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', $TYPE_MEMB_START, '$now')";
			$result = mysqli_statment($link,$query2);

      UpdateMemberStartTime($mid, $now);
      */
      UpdateChangeStartTime ($mid, $now);
			
			if ($vip == 4) {
				$mid_2 = "SIS2".$mid;
				$query = "INSERT INTO `user` (  `mid`,  `name`,  `nickname`,  `id`,  `sex`, `birth`,  `cell`,  `numberh`, `numberc`, `email`,  `addr`,  `depart`,  `what`,    `admin`, `remark`, `prop`) ".
						 "VALUES 			 ( '$mid_2', '$name_2', '$nickname_2', '$id_2', '$sex_2','$birth_2', '$cell_2', '$numberh_2', '$numberc_2', '$email_2',  '$addr_2', '$depart_2', '$what_2', '$admin', '$remark_2', '$prop')";
				//echo $query;
				$result = mysqli_statment($link,$query);
				$now_2 = getNow();

        /*
				$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid_2', '$now_2', $TYPE_MEMB_START, '$now_2')";
				$result = mysqli_statment($link,$query2);
				
				if ( empty($result))  echo "�s�W����";
        else UpdateMemberStartTime($mid_2, $now_2);
        */
        UpdateChangeStartTime ($mid_2, $now_2);
				
				
				$mid_3 = "SIS3".$mid;
				$query = "INSERT INTO `user` (  `mid`,  `name`,  `nickname`,  `id`,  `sex`, `birth`,  `cell`,  `numberh`, `numberc`, `email`,  `addr`,  `depart`,  `what`,    `admin`, `remark`, `prop`) ".
						 "VALUES 			 ( '$mid_3', '$name_3', '$nickname_3', '$id_3', '$sex_3','$birth_3', '$cell_3', '$numberh_3', '$numberc_3', '$email_3',  '$addr_3', '$depart_3', '$what_3', '$admin', '$remark_3', '$prop')";
				//echo $query;
				$result = mysqli_statment($link,$query);

				$now_3 = getNow();
        /*
				$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid_3', '$now_3', $TYPE_MEMB_START, '$now_3')";
				$result = mysqli_statment($link,$query2);
				
				if ( empty($result))  echo "�s�W����";			
        else UpdateMemberStartTime($mid_3, $now_3);
        */
        UpdateChangeStartTime ($mid_3, $now_3);
			}		
			mysqli_close($link);		
			
			if ( empty($result))  echo "�s�W����";
			echo "�s�W����";
			
    }
	}

        if ($admin == 1) $sexbgc="#FFFF00" ;
        else if ($admin == 2) $sexbgc="#FFAAFF";
        else if ($admin == 3) $sexbgc="#CCFFFF";
        else $sexbgc="#DDDDDD";

	//echo $sexbgc.$vip;
?>
<body>

<form name="ProfileForm" method="post" align="center" action="new.php">
	<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#ffffffff" border="0" id="table2">
		<tr>
		
			<td align="right" width="6">�@</td>
			<td noWrap width="102">�|<font class="mbody">�@�@�@��</font></td>
			<td width="526">
			<!-- <input type="submit" value="VIP" name="memtype" > -->
			<input type="submit" value="�@��|��" name="memtype">
			<input type="submit" value="�D�|��" name="memtype">
			| <input type="submit" value="�j�f�d" name="memtype" >
			</td>			
			
		</tr>
	</table>
<?php if ( $vip != 0 ) { ?>
<br>
<br>
<br>
	<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="<?php echo $sexbgc;?>" border="0" id="table2">
		<tr>
			<td bgColor="<?php echo $sexbgc;?>" colSpan="3"><b>
			<font class="mbody" color="#2c8383">�� �H �� ��</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
				<td align="right" width="6">�@</td>
				<td noWrap width="102">�|<font class="mbody"> �� �� ��</font></td>
				<td width="526"><b>
					<?php echo $memtype; ?>
				</b></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102">�| �� �s ��</td>
			<td width="526"><input name="mid" size="21"></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>

		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102"><font class="mbody">�m�@�@�@�W</font></td>
			<td width="526"><input name="name" size="21">
		</tr>
		<!--
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@��</font></td>
			<td><input name="nickname" size="21"> 
			</td>
				
			</td>
		</tr> -->
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@�O</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex">�k�� 
			<input type="radio" value="2" name="sex">�k�� 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�͡@�@�@��</font></td>
			<td>�� �� <input maxLength="4" size="4" name="by"> �~ 
			<select size="1" name="bm">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			</select> �� <select size="1" name="bd">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select> ��</td>
		</tr>
		<!--
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">������/�@��</font></td>
			<td> 
			 
			<input name="id" size="26"></td>
		</tr>
		-->
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--�a�}�A-->�p����� 
			</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�p �� �H �c</font></td>
			<td><input size="51" name="em"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td>��ʹq ��&nbsp; </td>
      <td>
			<input name="mp" size="25"><br>
<!--			���s���q��&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>   	<!--
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�q �T �a �}&nbsp;</font></td>
			<td><input size="5" name="pc">-<input size="45" name="pa"> </td>
		</tr>   	-->

		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">¾�@�@�@�~</font></td>
			<td><select size="1" name="oc">
			<option value="0" selected>�п��</option>
			<option value="����/�O�I">����/�O�I</option>
			<option value="�Цa��">�Цa��</option>
			<option value="�F������">�F������</option>
			<option value="�xĵ">�xĵ</option>
			<option value="�Ш|/��s">�Ш|/��s</option>
			<option value="�g��">�g��</option>
			<option value="�ؿv/��y">�ؿv/��y</option>
			<option value="�s�y/������">�s�y/������</option>
			<option value="��T">��T</option>
			<option value="�A��">�A��</option>
			<option value="����">����</option>
			<option value="�k�߬�����~">�k�߬�����~</option>
			<option value="�y�q/�s��">�y�q/�s��</option>
			<option value="��q/�B��/�ȹC">��q/�B��/�ȹC</option>
			<option value="�T��/�X��">�T��/�X��</option>
			<option value="�Ǽ�/���@���Y/�s�i/��P">�Ǽ�/���@���Y/�s�i/��P</option>
			<option value="���N">���N</option>
			<option value="�A����">�A����</option>
			<option value="�ǥ�">�ǥ�</option>
			<option value="�a��">�a��</option>
			<option value="�ݷ~��">�ݷ~��</option>
			<option value="��L">��L</option>
			</select> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">���q/�ǮզW��</font></td>
			<td><input name="wc" size="50"> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">��      ��</font></td>
			<td><input name="rk" size="60"> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�O�_�]�����ų��W?</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="pp">�O 
			<input type="radio" value="2" name="pp">�_
			<input type="radio" value="3" name="pp">�·|��
			</td>
		</tr>
<?php if ($sister)	{ ?>
</table>
<br><br><br>
<br><br><br><br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <hr>
<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#3cf7fd" border="0" id="table3">
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102"><font class="mbody">�m�@�@�@�W</font></td>
			<td width="526"><input name="name_2" size="21">
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@��</font></td>
			<td><input name="nickname_2" size="21"> 
			</td>
				
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@�O</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex_2">�k�� 
			<input type="radio" value="2" name="sex_2">�k�� 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�͡@�@�@��</font></td>
			<td>�� �� <input maxLength="4" size="4" name="by_2"> �~ 
			<select size="1" name="bm_2">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			</select> �� <select size="1" name="bd_2">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select> ��</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">������/�@��</font></td>
			<td> 
			 
			<input name="id_2" size="26"></td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--�a�}�A-->�p����� 
			</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�p �� �H �c</font></td>
			<td><input size="51" name="em_2"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td>��ʹq ��&nbsp; </td>
      <td>
			<input name="mp_2" size="25"><br>
<!--			���s���q��&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1_2" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
		<tr>       <!--
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�q �T �a �}&nbsp;</font></td>
			<td><input size="5" name="pc_2">-<input size="45" name="pa_2"> </td>
		</tr>          -->

		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">¾�@�@�@�~</font></td>
			<td><select size="1" name="oc_2">
			<option value="0" selected>�п��</option>
			<option value="����/�O�I">����/�O�I</option>
			<option value="�Цa��">�Цa��</option>
			<option value="�F������">�F������</option>
			<option value="�xĵ">�xĵ</option>
			<option value="�Ш|/��s">�Ш|/��s</option>
			<option value="�g��">�g��</option>
			<option value="�ؿv/��y">�ؿv/��y</option>
			<option value="�s�y/������">�s�y/������</option>
			<option value="��T">��T</option>
			<option value="�A��">�A��</option>
			<option value="����">����</option>
			<option value="�k�߬�����~">�k�߬�����~</option>
			<option value="�y�q/�s��">�y�q/�s��</option>
			<option value="��q/�B��/�ȹC">��q/�B��/�ȹC</option>
			<option value="�T��/�X��">�T��/�X��</option>
			<option value="�Ǽ�/���@���Y/�s�i/��P">�Ǽ�/���@���Y/�s�i/��P</option>
			<option value="���N">���N</option>
			<option value="�A����">�A����</option>
			<option value="�ǥ�">�ǥ�</option>
			<option value="�a��">�a��</option>
			<option value="�ݷ~��">�ݷ~��</option>
			<option value="��L">��L</option>
			</select> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">���q/�ǮզW��</font></td>
			<td><input name="wc_2" size="50"> </td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">��      ��</font></td>
			<td><input name="rk_2" size="60" height = "40"> </td>
		</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <hr>
<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#fc37fd" border="0" id="table4">
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap width="102"><font class="mbody">�m�@�@�@�W</font></td>
			<td width="526"><input name="name_3" size="21">
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@��</font></td>
			<td><input name="nickname_3" size="21"> 
			</td>
				
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�ʡ@�@�@�O</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex_3">�k�� 
			<input type="radio" value="2" name="sex_3">�k�� 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�͡@�@�@��</font></td>
			<td>�� �� <input maxLength="4" size="4" name="by_3"> �~ 
			<select size="1" name="bm_3">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			</select> �� <select size="1" name="bd_3">
			<option value="0" selected>�п��</option>
			<option value="01">1</option>
			<option value="02">2</option>
			<option value="03">3</option>
			<option value="04">4</option>
			<option value="05">5</option>
			<option value="06">6</option>
			<option value="07">7</option>
			<option value="08">8</option>
			<option value="09">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
			<option value="14">14</option>
			<option value="15">15</option>
			<option value="16">16</option>
			<option value="17">17</option>
			<option value="18">18</option>
			<option value="19">19</option>
			<option value="20">20</option>
			<option value="21">21</option>
			<option value="22">22</option>
			<option value="23">23</option>
			<option value="24">24</option>
			<option value="25">25</option>
			<option value="26">26</option>
			<option value="27">27</option>
			<option value="28">28</option>
			<option value="29">29</option>
			<option value="30">30</option>
			<option value="31">31</option>
			</select> ��</td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">������/�@��</font></td>
			<td> 
			 
			<input name="id_3" size="26"></td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--�a�}�A-->�p����� 
			</font></b><font color="red">�]����^</font></td>
		</tr>
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">�p �� �H �c</font></td>
			<td><input size="51" name="em_3"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td>��ʹq ��&nbsp; </td>
      <td>
			<input name="mp_3" size="25"><br>
<!--			���s���q��&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1_3" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
	<!--	<tr>
			<td vAlign="top" align="right" width="6">�@</td>
			<td vAlign="top" noWrap><font class="mbody">�q �T �a �}&nbsp;</font></td>
			<td><input size="5" name="pc_3">-<input size="45" name="pa_3"> </td>
		</tr>
-->
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">¾�@�@�@�~</font></td>
			<td><select size="1" name="oc_3">
			<option value="0" selected>�п��</option>
			<option value="����/�O�I">����/�O�I</option>
			<option value="�Цa��">�Цa��</option>
			<option value="�F������">�F������</option>
			<option value="�xĵ">�xĵ</option>
			<option value="�Ш|/��s">�Ш|/��s</option>
			<option value="�g��">�g��</option>
			<option value="�ؿv/��y">�ؿv/��y</option>
			<option value="�s�y/������">�s�y/������</option>
			<option value="��T">��T</option>
			<option value="�A��">�A��</option>
			<option value="����">����</option>
			<option value="�k�߬�����~">�k�߬�����~</option>
			<option value="�y�q/�s��">�y�q/�s��</option>
			<option value="��q/�B��/�ȹC">��q/�B��/�ȹC</option>
			<option value="�T��/�X��">�T��/�X��</option>
			<option value="�Ǽ�/���@���Y/�s�i/��P">�Ǽ�/���@���Y/�s�i/��P</option>
			<option value="���N">���N</option>
			<option value="�A����">�A����</option>
			<option value="�ǥ�">�ǥ�</option>
			<option value="�a��">�a��</option>
			<option value="�ݷ~��">�ݷ~��</option>
			<option value="��L">��L</option>
			</select> </td>
		</tr>   
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">���q/�ǮզW��</font></td>
			<td><input name="wc_3" size="50"> </td>
		</tr>		
		<tr>
			<td align="right" width="6">�@</td>
			<td noWrap><font class="mbody">��      ��</font></td>
			<td><input name="rk_3" size="60" height = "40"> </td>
		</tr>
	</table>
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<hr>
	<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#fcf7fd" border="0" id="table5">
<?php } ?>		
		
		<tr>
			<td vAlign="top" colSpan="3" ></td>
		</tr>
		<tr>
			<td colSpan="3" vAlign="top" align="center">
			<div align="center">
				<table cellSpacing="4" cellPadding="0" width="650" border="0" id="table3">
					<tr>
						<td width="600">
						<div align="center">
							<input type="submit" value="�e�X���" name="addnew"> &nbsp;&nbsp;&nbsp;
							<input type="reset" value="���s��g"></div>
						</td>
					</tr>
				</table>
			</div>
�@</td>
<br><br><br><br><br><br>
		</tr>		
<?php } /* vip != 0 */ ?>
	</table><!--
	<input type="hidden" value="www" name="srv">
	<input type="hidden" value="<?php echo $vip;?>" name="vip">
	-->
	<input type="hidden" value="<?php echo $vip;?>" name="vip">
  <?php if (!empty($pmemtype)) { ?>
	<input type="hidden" value="<?php echo $memtype;?>" name="pmemtype">
  <?php  } ?>
</form>

</body>

</html>
