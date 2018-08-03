<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>新增會員</title>
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
			case 2: $memtype = "一般會員";  break;
			case 3: $memtype = "非會員";    break;
			case 4: $memtype = "姐妹卡";    break;
			default: $memtype = "無指定";   break;
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
			case "normal":    $memtype = "一般會員";
			case "一般會員": 	$vip = 2;break;
			case "非會員": 		$vip = 3;break;
			case "姐妹卡": 		$vip = 4;break;
			default: /*$memtype = "無指定"; */break;
	}
	
  //echo $memtype.".".$pmemtype.".".$addnew.".".$vip;
	$sister = ($vip ==4) ? 1:0;
	$admin = $vip;

	if ( !empty($addnew)) {
		$checkerror = 0;
//		echo "新增資料中....";
//		echo $vip."<br>";
		if (empty($vip)) 			{$checkerror=1; echo "請選擇會員類型<br>";	}
		if (empty($mid)) 			{$checkerror=1; echo "請輸入會員編號<br>";	}
		if (empty($name)) 			{$checkerror=1; echo "請輸入會員姓名<br>";	}
		/*if (empty($nickname)) 		{$checkerror=1; echo "請輸入會員暱稱<br>";	}*/
		if (empty($sex)) 			{$checkerror=1; echo "請輸入會員性別<br>";	}
		if (empty($by) || empty($bm) ||empty($bd) ) 		{$checkerror=1; echo "請輸入會員生日<br>";}
		/*if (empty($id))				{$checkerror=1; echo "請輸入會員身分證字號<br>";}*/
		//if (empty($oc)) 			{$checkerror=1; echo "請輸入會員職業<br>";}
		//if (empty($pc) || empty($pa)) {$checkerror=1; echo "請輸入會員地址<br>";}
		//if (empty($wc) || empty($wc)) {$checkerror=1; echo "請輸入會員公司/學校名稱<br>";}
		if (empty($em)) {$checkerror=1; echo "請輸入會員E-Mail<br>";}
		//if (empty($tp2)) {$checkerror=1; echo "請輸入會員市話<br>";}
		if (empty($mp) || intval($mp) == 0) {$checkerror=1; echo "請輸入會員電話<br>";}
		if (empty($pp) ) {$checkerror=1; echo "請輸入如何得知LUMI?<br>";}
		
		if ($vip == 4) {
			//if (empty($mid_2)) 			{$checkerror=1; echo "請輸入會員2編號<br>";	}
			if (empty($name_2)) 			{$checkerror2=1; echo "請輸入會員2姓名<br>";	}
			if (empty($nickname_2)) 		{$checkerror2=1; echo "請輸入會員2暱稱<br>";	}
			if (empty($sex_2)) 			{$checkerror2=1; echo "請輸入會員2性別<br>";	}
			if (empty($by_2) || empty($bm_2) ||empty($bd_2) ) 		{$checkerror2=1; echo "請輸入會員2生日<br>";}
			if (empty($id_2))				{$checkerror2=1; echo "請輸入會員2身分證字號<br>";$id_2 = "id2".$mid;}
			//if (empty($oc_2)) 			{$checkerror=1; echo "請輸入會員2職業<br>";}
			//if (empty($pc_2) || empty($pa_2)) {$checkerror=1; echo "請輸入會員2地址<br>";}
			//if (empty($wc_2) || empty($wc_2)) {$checkerror=1; echo "請輸入會員2公司/學校名稱<br>";}
			if (empty($em_2)) {$checkerror2=1; echo "請輸入會員2 E-Mail<br>";}
			//if (empty($tp2_2)) {$checkerror2=1; echo "請輸入會員2 市話<br>";}
			if (empty($mp_2)) {$checkerror2=1; echo "請輸入會員2 電話<br>";}
	
			//if (empty($mid_3)) 			{$checkerror=1; echo "請輸入會員3 編號<br>";	}
			if (empty($name_3)) 			{$checkerror3=1; echo "請輸入會員3 姓名<br>";	}
			if (empty($nickname_3)) 		{$checkerror3=1; echo "請輸入會員3 暱稱<br>";	}
			if (empty($sex_3)) 			{$checkerror3=1; echo "請輸入會員3 性別<br>";	}
			if (empty($by_3) || empty($bm_3) ||empty($bd_3) ) 		{$checkerror3=1; echo "請輸入會員3 生日<br>";}
			if (empty($id_3))				{$checkerror3=1; echo "請輸入會員3 身分證字號<br>"; $id_3 = "id3".$mid;}
			//if (empty($oc_3)) 			{$checkerror=1; echo "請輸入會員3 職業<br>";}
			//if (empty($pc_3) || empty($pa_3)) {$checkerror=1; echo "請輸入會員3 地址<br>";}
			//if (empty($wc_3) || empty($wc_3)) {$checkerror=1; echo "請輸入會員3 公司/學校名稱<br>";}
			if (empty($em_3)) {$checkerror3=1; echo "請輸入會員3 E-Mail<br>";}
		//	if (empty($tp2_3)) {$checkerror3=1; echo "請輸入會員3 市話<br>";}
			if (empty($mp_3)) {$checkerror3=1; echo "請輸入會員3 電話<br>";}
			
		}
		
		if ( $checkerror) exit(1);
		if ( $checkerror) {
			echo "<br>會員 資料不全 請手動加入!";
			exit(1);
		}
		if ( $checkerror2) {
			echo "<br>會員2資料不全 請手動加入!";
			exit(1);
		}
		if ( $checkerror3) {
			echo "<br>會員3資料不全 請手動加入!";
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
		// 加上備註、是否因為網宣報名
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
				
				if ( empty($result))  echo "新增失敗";
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
				
				if ( empty($result))  echo "新增失敗";			
        else UpdateMemberStartTime($mid_3, $now_3);
        */
        UpdateChangeStartTime ($mid_3, $now_3);
			}		
			mysqli_close($link);		
			
			if ( empty($result))  echo "新增失敗";
			echo "新增 <a href=\"mview.php?mid=".$mid."\">".$mid."</a> 完成!!";
			
    }
	}

        if ($admin == 1) $sexbgc="#FFFF00" ;
        else if ($admin == 2) $sexbgc="#FFC2FF";
        else if ($admin == 3) $sexbgc="#CCFFFF";
        else $sexbgc="#DDDDDD";

	//echo $sexbgc.$vip;
?>
<body>

<form name="ProfileForm" method="post" align="center" action="new.php">
	<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#ffffffff" border="0" id="table2">
		<tr>
		
			<td align="right" width="6">　</td>
			<td noWrap width="102">會<font class="mbody">　　　員</font></td>
			<td width="526">
			<!-- <input type="submit" value="VIP" name="memtype" > -->
			<input type="submit" value="一般會員" name="memtype">
			<!-- <input type="submit" value="非會員" name="memtype">
			| <input type="submit" value="姐妹卡" name="memtype" > -->
			</td>			
			
		</tr>
	</table>
<?php if ( $vip != 0 ) { ?>
	<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="<?php echo $sexbgc;?>" border="0" id="table2">
		<tr>
			<td bgColor="<?php echo $sexbgc;?>" colSpan="3"><b>
			<font class="mbody" color="#2c8383">個 人 資 料</font></b><font color="red"></font></td>
		</tr>
		<tr>
				<td align="right" width="6">　</td>
				<td noWrap width="102">會<font class="mbody"> 員 類 型</font></td>
				<td width="526"><b>
					<?php echo $memtype; ?>
				</b></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102">會 員 編 號</td>
			<td width="526"><input name="mid" size="21"></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>

		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102"><font class="mbody">姓　　　名</font></td>
			<td width="526"><input name="name" size="21">
		</tr>
		<!--
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">暱　　　稱</font></td>
			<td><input name="nickname" size="21"> 
			</td>
				
			</td>
		</tr> -->
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">性　　　別</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex">男性 
			<input type="radio" value="2" name="sex">女性 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">生　　　日</font></td>
			<td>西 元 <input maxLength="4" size="4" name="by"> 年 
			<select size="1" name="bm">
			<option value="0" selected>請選擇</option>
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
			</select> 月 <select size="1" name="bd">
			<option value="0" selected>請選擇</option>
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
			</select> 日</td>
		</tr>
		<!--
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">身分證/護照</font></td>
			<td> 
			 
			<input name="id" size="26"></td>
		</tr>
		-->
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--地址∕-->聯絡資料 
			</font></b><font color="red"></font></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">聯 絡 信 箱</font></td>
			<td><input size="51" name="em"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td>行動電 話&nbsp; </td>
      <td>
			<input name="mp" size="25"><br>
<!--			緊急連絡電話&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>   	<!--
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">通 訊 地 址&nbsp;</font></td>
			<td><input size="5" name="pc">-<input size="45" name="pa"> </td>
		</tr>   	-->

		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">職　　　業</font></td>
			<td><select size="1" name="oc">
			<option value="0" selected>請選擇</option>
			<option value="金融/保險">金融/保險</option>
			<option value="房地產">房地產</option>
			<option value="政府機關">政府機關</option>
			<option value="軍警">軍警</option>
			<option value="教育/研究">教育/研究</option>
			<option value="經商">經商</option>
			<option value="建築/營造">建築/營造</option>
			<option value="製造/供應商">製造/供應商</option>
			<option value="資訊">資訊</option>
			<option value="服務">服務</option>
			<option value="醫療">醫療</option>
			<option value="法律相關行業">法律相關行業</option>
			<option value="流通/零售">流通/零售</option>
			<option value="交通/運輸/旅遊">交通/運輸/旅遊</option>
			<option value="娛樂/出版">娛樂/出版</option>
			<option value="傳播/公共關係/廣告/行銷">傳播/公共關係/廣告/行銷</option>
			<option value="藝術">藝術</option>
			<option value="農漁牧">農漁牧</option>
			<option value="學生">學生</option>
			<option value="家管">家管</option>
			<option value="待業中">待業中</option>
			<option value="其他">其他</option>
			</select> </td>
		</tr>
		<!--
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">公司/學校名稱</font></td>
			<td><input name="wc" size="50"> </td>
		</tr>
    -->
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">備      註</font></td>
			<td><input name="rk" size="60"> </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<!--<td noWrap><font class="mbody">是否因為網宣報名?</font></td>-->
			<td noWrap><font class="mbody">如何得知LUMI ?</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="pp">網路
			<input type="radio" value="4" name="pp">親友
			<input type="radio" value="5" name="pp">社團<br>
			<input type="radio" value="6" name="pp">路過
			<input type="radio" value="7" name="pp">其他<br>
      <!--
			<input type="radio" value="2" name="pp">非網宣(舊式)
			<input type="radio" value="3" name="pp">舊會員
      -->
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
			<td align="right" width="6">　</td>
			<td noWrap width="102"><font class="mbody">姓　　　名</font></td>
			<td width="526"><input name="name_2" size="21">
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">暱　　　稱</font></td>
			<td><input name="nickname_2" size="21"> 
			</td>
				
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">性　　　別</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex_2">男性 
			<input type="radio" value="2" name="sex_2">女性 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">生　　　日</font></td>
			<td>西 元 <input maxLength="4" size="4" name="by_2"> 年 
			<select size="1" name="bm_2">
			<option value="0" selected>請選擇</option>
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
			</select> 月 <select size="1" name="bd_2">
			<option value="0" selected>請選擇</option>
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
			</select> 日</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">身分證/護照</font></td>
			<td> 
			 
			<input name="id_2" size="26"></td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--地址∕-->聯絡資料 
			</font></b><font color="red">（必填）</font></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">聯 絡 信 箱</font></td>
			<td><input size="51" name="em_2"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td>行動電 話&nbsp; </td>
      <td>
			<input name="mp_2" size="25"><br>
<!--			緊急連絡電話&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1_2" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
		<tr>       <!--
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">通 訊 地 址&nbsp;</font></td>
			<td><input size="5" name="pc_2">-<input size="45" name="pa_2"> </td>
		</tr>          -->

		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">職　　　業</font></td>
			<td><select size="1" name="oc_2">
			<option value="0" selected>請選擇</option>
			<option value="金融/保險">金融/保險</option>
			<option value="房地產">房地產</option>
			<option value="政府機關">政府機關</option>
			<option value="軍警">軍警</option>
			<option value="教育/研究">教育/研究</option>
			<option value="經商">經商</option>
			<option value="建築/營造">建築/營造</option>
			<option value="製造/供應商">製造/供應商</option>
			<option value="資訊">資訊</option>
			<option value="服務">服務</option>
			<option value="醫療">醫療</option>
			<option value="法律相關行業">法律相關行業</option>
			<option value="流通/零售">流通/零售</option>
			<option value="交通/運輸/旅遊">交通/運輸/旅遊</option>
			<option value="娛樂/出版">娛樂/出版</option>
			<option value="傳播/公共關係/廣告/行銷">傳播/公共關係/廣告/行銷</option>
			<option value="藝術">藝術</option>
			<option value="農漁牧">農漁牧</option>
			<option value="學生">學生</option>
			<option value="家管">家管</option>
			<option value="待業中">待業中</option>
			<option value="其他">其他</option>
			</select> </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">公司/學校名稱</font></td>
			<td><input name="wc_2" size="50"> </td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">備      註</font></td>
			<td><input name="rk_2" size="60" height = "40"> </td>
		</tr>
</table>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 <hr>
<table cellSpacing="0" cellPadding="4" width="658" align="left" bgColor="#fc37fd" border="0" id="table4">
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap width="102"><font class="mbody">姓　　　名</font></td>
			<td width="526"><input name="name_3" size="21">
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">暱　　　稱</font></td>
			<td><input name="nickname_3" size="21"> 
			</td>
				
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">性　　　別</font></td>
			<td vAlign="top" width="526" height="19">
			<input type="radio" value="1" name="sex_3">男性 
			<input type="radio" value="2" name="sex_3">女性 
	
			
			</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">生　　　日</font></td>
			<td>西 元 <input maxLength="4" size="4" name="by_3"> 年 
			<select size="1" name="bm_3">
			<option value="0" selected>請選擇</option>
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
			</select> 月 <select size="1" name="bd_3">
			<option value="0" selected>請選擇</option>
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
			</select> 日</td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">身分證/護照</font></td>
			<td> 
			 
			<input name="id_3" size="26"></td>
		</tr>
		<tr bgColor="#f5f09a">
			<td colSpan="3"><b><font class="mbody" color="#2c8383"><!--地址∕-->聯絡資料 
			</font></b><font color="red">（必填）</font></td>
		</tr>
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">聯 絡 信 箱</font></td>
			<td><input size="51" name="em_3"> 
			</td>
		</tr>
		<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td>行動電 話&nbsp; </td>
      <td>
			<input name="mp_3" size="25"><br>
<!--			緊急連絡電話&nbsp; -->
			<!--webbot bot="Validation" s-data-type="Number" s-number-separators=",." --> 
			<!-- <input name="mp1_3" size="25"> -->
			</font></td>
		</tr>
		<tr>
			<td vAlign="top" colSpan="3" ><hr></td>
		</tr>
	<!--	<tr>
			<td vAlign="top" align="right" width="6">　</td>
			<td vAlign="top" noWrap><font class="mbody">通 訊 地 址&nbsp;</font></td>
			<td><input size="5" name="pc_3">-<input size="45" name="pa_3"> </td>
		</tr>
-->
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">職　　　業</font></td>
			<td><select size="1" name="oc_3">
			<option value="0" selected>請選擇</option>
			<option value="金融/保險">金融/保險</option>
			<option value="房地產">房地產</option>
			<option value="政府機關">政府機關</option>
			<option value="軍警">軍警</option>
			<option value="教育/研究">教育/研究</option>
			<option value="經商">經商</option>
			<option value="建築/營造">建築/營造</option>
			<option value="製造/供應商">製造/供應商</option>
			<option value="資訊">資訊</option>
			<option value="服務">服務</option>
			<option value="醫療">醫療</option>
			<option value="法律相關行業">法律相關行業</option>
			<option value="流通/零售">流通/零售</option>
			<option value="交通/運輸/旅遊">交通/運輸/旅遊</option>
			<option value="娛樂/出版">娛樂/出版</option>
			<option value="傳播/公共關係/廣告/行銷">傳播/公共關係/廣告/行銷</option>
			<option value="藝術">藝術</option>
			<option value="農漁牧">農漁牧</option>
			<option value="學生">學生</option>
			<option value="家管">家管</option>
			<option value="待業中">待業中</option>
			<option value="其他">其他</option>
			</select> </td>
		</tr>   
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">公司/學校名稱</font></td>
			<td><input name="wc_3" size="50"> </td>
		</tr>		
		<tr>
			<td align="right" width="6">　</td>
			<td noWrap><font class="mbody">備      註</font></td>
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
							<input type="submit" value="送出資料" name="addnew"> &nbsp;&nbsp;&nbsp;
							<input type="reset" value="重新填寫"></div>
						</td>
					</tr>
				</table>
			</div>
　</td>
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
