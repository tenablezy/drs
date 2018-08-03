<html>
  <!--<meta http-equiv="refresh" content="5">-->
  <meta http-equiv="Content-Type" content="text/html; charset=big5">
  <META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>
  <title>新增網頁1
  </title>
<?php
	require ("func.php");
	
	global $QUOTA_PASS;
	global $MIN_MEMSTART_CLASS;
	
  $mid  = _get("mid");
  $mid2 = _get("mid2");

	$addquota = _get("addquota");
	$addquota_5 = _get("addquota_5");
	$addquota_1 = _get("addquota_1");
	$addquota_2 = _get("addquota_2");
	$addquota_3 = _get("addquota_3");
	$addquota_4 = _get("addquota_4");
	
	$bounds_5 = _get("bounds_5");
	$bounds_1 = _get("bounds_1");
	$bounds_2 = _get("bounds_2");
	$bounds_3 = _get("bounds_3");
	$bounds_4 = _get("bounds_4");

	$classin = _get("classin");
	$classin_1 = _get("classin_1");
	$classin_2 = _get("classin_2");
	$classin_3 = _get("classin_3");

	$classout_5  = _get("classout_5");
	$classout_10 = _get("classout_10");
	$classout_20 = _get("classout_20");

	$classes = _get("classes");
	$class_reset = _get("class_reset");

  $old_quota = _get("old_quota");
  $old_bound = _get("old_bound");
	$bounds    = _get("bounds");
  
  $querymid  = _get("querymid");
  $passwd    = _get("passwd");
  $comment   = _get("comment");
  $addquotaOne = _get("addquotaOne");
  $nonmember_1= _get("nonmember_1");

  echo $nonmember_1;
	if (!empty($nonmember_1)) { $mid = $NONMEMBER_ID;}

	if ( empty($mid) && !empty($mid2)) $mid = $mid2;
	
	if (!empty($addquota_5)) $classes = "0";
	if (!empty($addquota_1)) $classes = "2";
	if (!empty($addquota_2)) $classes = "-2";
	if (!empty($addquota_3)) $classes = "3";
	if (!empty($addquota_4)) $classes = "-3";
	
	if (!empty($bounds_5)) $bounds = "0";
	if (!empty($bounds_1)) $bounds = "2";
	if (!empty($bounds_2)) $bounds = "-2";
	if (!empty($bounds_3)) $bounds = "3";
	if (!empty($bounds_4)) $bounds = "-3";
	
	if (!empty($classin)) { $classes = "-1"; $bounds = "1"; }
  
	if (!empty($classin_1)) { $classes = "-1"; $bounds = "1"; }
  
	if (!empty($classin_2)) { $classes = "-2"; $bounds = "2"; }
  
	if (!empty($classin_3)) { $classes = "-2"; $bounds = "2"; }

	if (!empty($classout_5))  {  $classes =  "5"; $bounds = "0"; }
	if (!empty($classout_10)) {  $classes = "10"; $bounds = "0"; }
	if (!empty($classout_20)) {  $classes = "20"; $bounds = "0"; }

  if ( !empty($class_reset))  {
  $classes = "0";
	      $bounds = "0";
  }
	
	
	$now = getNow();	
	$mcount = 0;
	
	if ( !empty($addquota) && !empty($classes) && $classes != 0 && $passwd == $QUOTA_PASS){
		
		//echo $old_quota;
		if (  ($old_quota < 0 && $addquota < 0) || 
		      ($old_bound < 0 && $classes < 0 )) {
			echo "已無數值可扣!!";
			exit(1);
		}
		
    if (0) {
		  $link = openmysql();
		  $query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '1', '$classes')";
		  //echo $query2;
		  $result = mysqli_statment($link,$query2);
		  mysqli_close($link);
    } else {
      //echo $classes;
      LogMemberInfo($mid, $now, "1", $classes);
    }
    
    if (!empty($comment)) {
      LogMemberInfo($mid, $now, "0", $comment);
    }

    /* no used here */
		if ( 0 && $classes >= $$MIN_MEMSTART_CLASS ){
      if (0) {
      /*update start time*/
      /*
		  $link = openmysql();
		  $query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', $TYPE_MEMB_START, '$now')";
		  //echo $query2;
		  $result = mysqli_statment($link,$query2);
      UpdateMemberStartTime($mid, $now);
		  mysqli_close($link);
      */
       UpdateChangeStartTime ($mid, $now);
      } else {
        /*LogMemberInfo($mid, $now, $TYPE_MEMB_START, $now);*/
        UpdateChangeStartTime ($mid, $now);
      }
    			
		}
		//$mid = NULL;
		//echo "修改完成";
		//header('Location: class.php');
		//echo $mid;
		$classes = 0;
		header("Location: quota.php?mid=".$mid);
	} if ( !empty($addquota) && !empty($classes) && $classes != 0 && $passwd != $QUOTA_PASS){
		echo "密碼不正確";
    exit(1);
  }
	
	if ( !empty($addquota) && !empty($bounds) && $bounds != 0 && $passwd == $QUOTA_PASS){
    if (0 ) {
		  $link = openmysql();
		  $query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '2', '$bounds')";
		  //echo $query2;
		  $result = mysqli_statment($link,$query2);
		  mysqli_close($link);			
    } else {
      LogMemberInfo($mid, $now, "2", $bounds);
    }
		//$mid = NULL;
		//echo "修改完成";
		//header('Location: class.php');
		//echo $mid;
		$classes = 0;
		header("Location: quota.php?mid=".$mid);
	} else if ( !empty($addquota) && !empty($bounds) && $bounds != 0 && $passwd != $QUOTA_PASS){
		echo "密碼不正確";
        exit(1);
    }
	
	if ( !empty($addquotaOne) && $passwd == $QUOTA_PASS){
        LogMemberInfo($mid, $now, "1", "2");
		LogMemberInfo($mid, $now, "1", "-1");
        LogMemberInfo($mid, $now, "0", "購買一堂");

		$classes = 0;
		header("Location: quota.php?mid=".$mid);
	} else if ( !empty($addquotaOne) && $passwd != $QUOTA_PASS){
		echo "密碼不正確";
        exit(1);
    }

	//echo $mid;
	if (!empty($querymid) || !empty($mid)) {
	
		$filter = "AND `mid` = '$mid'";
		$ord = "";
		$start = 0;
		$mcount = QueryMember($mlist, $filter,$ord, $start);
		
		if ($mcount >0) {
			if ( strncmp($mlist[0]["mid"], "SIS", 3) == 0 ) {
				echo "姐妹卡 不能修改此資訊!!!";
				exit(1);
			}
			//$link = openmysql();
			//$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', '1', '-1')";
			//echo $query2;
			//$result = mysqli_statment($link,$query2);
			//mysqli_close($link);			
			//$mid = NULL;
			//echo "修改完成";
			//header('Location: class.php');
			//echo $mid;
		} else {
			echo "會員 (".$mid.") 不存在!!";
			exit(1);
		} 

	  $chgcount = QueryChanges($chglist, $mid);
	}
  ?>
  <body >
    <p><b>
        <font size="5">新增減點數及紅利
        </font></b>
    </p>
    <hr>
    <form name="ProfileForm" method="post" action="quota.php">	
      <p>請輸入會員編號 
        <input type="text" name="mid" size="25" id="mid">	
        <input type="submit" value="查詢" name="querymid" id="querymid">	
        <input type="submit" value="非會員查詢" name="nonmember_1" id="nonmember_1">	
      </p>
<?php
if ($mcount >0) { 
      ?>	
      <p>會員:
        <a href="mview.php?mid=<?php echo $mlist[0]["mid"];?>">
          <font color="#0000FF" size="5"><b> 
              <?php echo $mlist[0]["name"];?> </b>
          </font></a>(編號  	
        <font size="5" color="#0000FF"><b> 
            <?php echo $mlist[0]["mid"];?> </b>
        </font>)
      </p>	
	  
<?php if (0) { ?>
      &nbsp;<br>

      登入上課: 
      <input type="submit" value="登入上課" name="classin" id="classin">&nbsp;
      <input type="submit" value="登入上課" name="classin" id="classin">&nbsp;

      <input type="submit" value="1 堂" name="classin_1" id="classin_1">&nbsp;
      <input type="submit" value="2 堂" name="classin_2" id="classin_2">&nbsp;
      <input type="submit" value="3 堂" name="classin_3" id="classin_3">&nbsp;

      &nbsp; | &nbsp; 
      購買堂數: 
      <!--<input type="submit" value="登入上課" name="classin" id="classin">&nbsp;
      <input type="submit" value="登入上課" name="classin" id="classin">&nbsp; -->
      <input type="submit" value="5  堂"    name="classout_5" id="classout_5">&nbsp;
      <input type="submit" value="10 堂"    name="classout_10" id="classout_10">&nbsp;
      <input type="submit" value="20 堂"    name="classout_20" id="classout_20">  &nbsp;
	  <?php } ?>
      <br>
      <br>
      <hr>
      
      <p>課堂:
        <font color="#008000" size="5"> <b>
            <?php echo $mlist[0]["quota"];?>  </b>
        </font> 堂 &nbsp;&nbsp;&nbsp; 	, 增加&nbsp;&nbsp; 	
        <!--
        	<select size="1" name="classes">
        	<option selected value="0">0</option>
        	<option value="5">5</option>
        	<option value="10">10</option>
        	<option value="20">20</option>
        	</select>--> 	
        <input type="text" name="classes" size="5" value="<?php echo $classes; ?>" id="classes"> 堂 		
        <!-- <input type="submit" value="加一般" name="addquota_1" id="addquota_1">&nbsp; 		
        <input type="submit" value="減一般" name="addquota_2" id="addquota_2">&nbsp; 		 		
        <input type="submit" value="加基礎,進階" name="addquota_3" id="addquota_3">&nbsp; 		
        <input type="submit" value="減基礎,進階" name="addquota_4" id="addquota_4">&nbsp; 		
        <input type="submit" value="清除" name="addquota_5" id="addquota_5">&nbsp;-->
        
         	
      </p>	
      <?php if (0) /* now, we do not use it */{?>
      <p>紅利: <b>
          <font color="#FF0000" size="5"> 
            <?php echo $mlist[0]["bound"];?> 
          </font></b>點 &nbsp;&nbsp;&nbsp; 	, 增加&nbsp;&nbsp; 	
        <!--
        	<select size="1" name="bounds">
        	<option selected value="0">0</option>
        	<option value="1">1</option>
        	<option value="2">2</option>
        	<option value="3">3</option>
        	<option value="4">4</option>
        	<option value="5">5</option>
        	<option value="6">6</option>
        	<option value="7">7</option>
        	<option value="8">8</option>
        	<option value="9">9</option>
        	<option value="10">10</option>
        	<option value="15">15</option>
        	<option value="20">20</option>
        	</select> -->  
        <input type="text" name="bounds" size="5" value="<?php echo $bounds; ?>" id="bounds"> 點 	 	 		
        <!-- <input type="submit" value="加一般" name="bounds_1" id="bounds_1">&nbsp; 		
        <input type="submit" value="減一般" name="bounds_2" id="bounds_2">&nbsp; 		 		
        <input type="submit" value="加基礎,進階" name="bounds_3" id="bounds_3">&nbsp; 		
        <input type="submit" value="減基礎,進階" name="bounds_4" id="bounds_4"&nbsp; 		
        <input type="submit" value="清除" name="bounds_5" id="bounds_5">&nbsp;--> 	 	
      </p>	
      <?php }?>

      <p>
      備註資訊: <input type="text" name="comment" size="27" id="comment"><br>
      <hr>
      請輸入 授權碼  	<input type="password" name="passwd" size="27" id="mid0">
      </p>	
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 	
        <input type="hidden" value="<?php echo $mlist[0]["mid"];?>" name="mid2" id="mid2">	
        <input type="hidden" value="<?php echo $mlist[0]["quota"];?>" name="old_quota" id="old_quota">	 	
        <input type="hidden" value="<?php echo $mlist[0]["bound"];?>" name="old_bound" id="old_bound">	 	
        <!-- <input type="submit" value="購買一堂" name="addquotaOne" id="addquotaOne">&nbsp; 	 -->
		<input type="submit" value="確定修改" name="addquota" id="addquota">&nbsp; 	
        <!-- <input type="reset" value="重新設定" > -->
        <input type="submit" value="清除" name="class_reset" id="class_reset">
      </p>
      <?php  } ?>
    </form>

				<p align="left">修改記錄
				<b><a href="quota.php?mid=<?php echo $mlist[0]["mid"];?>"><?php echo $mlist[0]["mid"];?></a></b>
        </p>
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
