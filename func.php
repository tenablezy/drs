<?php
	require ("version.php");

  /**************************************************/
  /**** change it before released *******************/

  $isTEST = 0;
  $isLinux = 1;

  /**************************************************/

	$mysqli_host = "localhost";
	$mysqli_user = "root";
	$mysqli_password = "1234";
	$db_name = "dancer2";
	
	$MAX_PAGE = 100;
	$MAX_RES_QUOTA = 2;

	$QUOTA_PASS = "lds168";
	$MODIFY_PASS = "lds168";

	$MAX_BOUND_SEC = 365*24*60*60;
	$MAX_CLASS_SEC = 6*31*24*60*60;
	$MAX_MSTART_SEC = 365*24*60*60;
	$TIME_OFFSET = 8*60*60;

	$TYPE_MEMB_START = '99';

	$MIN_MEMSTART_CLASS = 2;
	
	error_reporting(0);

  if (isLinux) {
    $BACKUP_PATH = "/home/nick/public_html/backup/";
    $MYSQL_DUMP = "mysqldump";
    $DOWNLOA_PATH = "/home/nick/public_html/backup/";

  } else {
    $BACKUP_PATH = "d:\\systembackup\\";
	  $MYSQL_DUMP = "C:\wamp64\bin\mysql\mysql5.7.14\bin\mysqldump.exe";
    $DOWNLOA_PATH = "d:\\systembackup\\";
  }


	function getNow()
	{
	  global $TIME_OFFSET;
	  global $isTEST;

    if ($isTEST) {
	    return 1531330762+3*60*24+8*60+1*60*60+35*60 - 7*24*60*60;
    } else {
	    return time() + $TIME_OFFSET;
    }

		return time() + 8 * 60 * 60;
	$today = getdate();
	$today_s = $today["year"].":".$today["mon"].":".$today["mday"]." ".
			   $today["hours"].":".$today["minutes"].":".$today["seconds"];
	//echo $today_s;
	return strtotime($today_s);
		return time();
	/*return strtotime("now");*/
	}
	
	$nowdatetime = my_gmdate("Y/m/d(D) H:i:s", intval(getNow()));

	date_default_timezone_set('Asia/Taipei');

	function CCS_jq_head () {

 	echo '
			<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
			<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
			';
	/*
	echo '
	   <link href="jquery-ui.css" rel="stylesheet" type="text/css"/>
	   <script src="jquery.min.js"></script>
	   <script src="jquery-ui.min.js"></script>';
	*/
 	}


	function _get($str) {
		$val = !empty($_REQUEST[$str]) ? $_REQUEST[$str] : null;
		return $val;
	}

	function _post($str) {
		$val = !empty($_REQUEST[$str]) ? $_REQUEST[$str] : null;
		return $val;
	}

	function openmysql () {
		global $mysqli_host,$mysqli_user,$mysqli_password,$db_name;
		$link = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_password, $db_name);
		
		if (mysqli_connect_errno()) {
			die("Could not connect:". mysqli_connect_error());
		}
		// $link = mysql_connect($mysql_host, $mysql_user, $mysql_password) or die('Could not connect: ' . mysql_error());
		// mysql_select_db($db_name) or die('Could not select database');
		return $link;
	}		
	
	function my_gmdate ($fmt, $tm)
	{
		$gmd = gmdate($fmt, intval($tm));

    // fake time
		//$gmd = gmdate($fmt, 1531330762+3*60*24+8*60+1*60*60+35*60 - 7*24*60*60);
    return $gmd;
	}

	function my_strtotime ($time_str)
	{
		global $TIME_OFFSET;
		return strtotime($time_str) + $TIME_OFFSET;
	}

	
	function mysqli_statment ($link, $query) {
		if ( !mysqli_query($link, "SET NAMES 'big5'") ){
			die('Query failed: ' . mysqli_error($link));
		}
		if ( $result = mysqli_query($link, $query) ){
			return $result;
		}
		else{
			die("Query failed: [$query]<br>" . mysqli_error($link));
		}
		// mysql_query("SET NAMES 'big5'") or die('Query failed: ' . mysql_error());
		// $result = mysql_query($query) or die('Query failed: ' . mysql_error());
    return FALSE;
	}

	function BackupFile ($fname, $tableName) {

    echo "<BR>Backup $fname !!<BR>";
		$link = openmysql();
		$query = "SELECT * INTO OUTFILE '$fname' FROM `$tableName`";
		$result = mysqli_statment($link,$query);
		mysqli_close($link);
	
    return $result;
	}

  function BackupSystem () {
     global $BACKUP_PATH;
     global $MYSQL_DUMP;
		global $mysqli_host,$mysqli_user,$mysqli_password,$db_name;

			$now = getNow();
			$bpdate = my_gmdate("Ymd_H_i_s", intval($now));
      echo $bpdate;


      $command = "$MYSQL_DUMP --opt -h $mysqli_host -u $mysqli_user -p$mysqli_password $db_name > $BACKUP_PATH$db_name.$bpdate.sql";
      echo $command;
      echo exec($command);
    
			$fromsrc_root = "C:\\wamp64";
			//$tosrc_root = "c:\\backup\\";
			$tosrc_root = $BACKUP_PATH;
    
			$fromsrc = $fromsrc_root."\\bin\\mysql\\mysql5.7.14\\data ";
			$tosrc = $tosrc_root.$bpdate."_dancerdb ";
    
			$cmd = "xcopy $fromsrc $tosrc /I >test";
			system($cmd);
			//echo $cmd;
			echo "<br>DB ok 備份資料庫完成!!<br>";
			
			$fromsrc = $fromsrc_root."\\www\\drs ";
			$tosrc = $tosrc_root.$bpdate."_drs";
			$cmd = "xcopy $fromsrc $tosrc /I > test";
			system($cmd);
			//echo $cmd;
			//$tosrc_root = "c:/backup/";
			//$tosrc_root = "d:/systembackup/";
			$tosrc_root = $BACKUP_PATH;
    
			$tosrc = $tosrc_root.$bpdate."_drs_sql_user_db.sql";
            //echo "\n".$tosrc;
    
      $b1 = BackupFile($tosrc, "user");
			$tosrc = $tosrc_root.$bpdate."_drs_sql_change_db.sql";
    
			$b2 = BackupFile($tosrc, "change");
			$tosrc = $tosrc_root.$bpdate."_drs_sql_book_db.sql";
			
      $b3 = BackupFile($tosrc, "book");
    
      if ($b1 == $b2 && $b2 == $b3 && $b3 == TRUE) {
			  echo "<br>ok 備份程式完成!!<br>";
      } else {
			  echo "<br>fail 備份程式失敗!!<br>";
      }

  }

	function AddMember ($name) {

		$link = openmysql();
		$query = "INSERT INTO `item` ( `sn` , `name` , `cost` , `profile` , `cmt` ) ".
				 "VALUES ( NULL , '$name', '$cost', '$sn', '$cmt' )";
		$result = mysqli_statment($link,$query);
		mysqli_close($link);
		
	}

	function QueryResClassMember (&$list, $start, $size, $ub, $lb) {
	  global $MAX_PAGE;
		$filter = "";
		$ord = "";
		//$start = "-1";
		$ml = QueryMemberLimit($mlist, $filter,$ord, $start, $size); 
		
		//echo $ml;
		$rt = 0;
		for ($i = 0 ; $i < $ml ; $i++ ){
		//echo "!";
			if ( (( 30 * $mlist[$i]["max_class_mon"] + $mlist[$i]["max_class_day"]) <= $ub )
				 &&  (( 30 * $mlist[$i]["max_class_mon"] + $mlist[$i]["max_class_day"]) >= $lb )
						&& $mlist[$i]["mid"][0] != "S"  ) {   
				$list[$rt++] = $mlist[$i];
			}
		}
	
		return $rt;	
	}
	
	function QueryResQuotaMember (&$list) {
	
		global $MAX_RES_QUOTA;
		$link = openmysql();
		
		//if ( empty($order)) $order = "`name`"
		$query = "SELECT * FROM `user` ORDER BY `name` ASC";
		//echo $query;
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$list[$rt] = $row;
		
			/* calculate quota */
			$query2 = "SELECT `mid`, SUM(str) FROM `change` WHERE `type` = '1' AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			$list[$rt]["quota"] = (int)$row2["SUM(str)"];
			
			if ( $list[$rt]["quota"] > $MAX_RES_QUOTA) continue;

			/* calculate bound */
			$query2 = "SELECT `mid`, SUM(str) FROM `change` WHERE `type` = '2' AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			$list[$rt]["bound"] = (int)$row2["SUM(str)"];
			
			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}

	
	function QueryMember (&$list, $filter, $order, $start) {
			global $MAX_PAGE;
			return QueryMemberLimit($list, $filter, $order, $start, $MAX_PAGE);
	}

	function LogMemberInfo ( $mid, $now, $type, $data)
	{
		$link = openmysql();
		$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now', $type, '$data')";
		$result = mysqli_statment($link,$query2) or die ("LogMemberInfo: ".$query2);
		mysqli_close($link);
	}

	function RegMemberInfo ( $mid, $sn, $time, $sex, $admin, $birth, $what)
	{
		$link = openmysql();
		$query2 = "INSERT INTO `register` (`mid`, `sn`, `time`, `sex`, `admin`, `birth`, `what`) VALUES ( '$mid', '$sn', '$time', '$sex', '$admin', '$birth', '$what')";
		$result = mysqli_statment($link,$query2);
		mysqli_close($link);
	}

  function QueryProgress ($percent) {

    echo '<script language="javascript">
      document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.'%;height:10;background-color:#0d0;\">&nbsp;</div>";';
    echo 'document.getElementById("information").innerHTML="'.intval($percent).'%.";';
    echo '</script> ';
    //echo '<!-- '.$percent.' -->';

  }
	function QueryMemberStartTime ( $mid){
			global $TYPE_MEMB_START;
		global $MIN_MEMSTART_CLASS;
				
			$link = openmysql();			
			$query2 = "SELECT `str` FROM `change` WHERE `type` = $TYPE_MEMB_START AND `mid` = '$mid' ORDER BY `time` DESC LIMIT 1";
			$result2 = mysqli_statment($link,$query2);
			
			//echo $query2;
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

			
			if ( empty($row2["str"])) {
				
				$link2 = openmysql();			
				$query2 = "SELECT `time` FROM `change` WHERE `type` = '1' AND `mid` = '$mid' AND CAST(`str` AS SIGNED) >= $MIN_MEMSTART_CLASS".
									" ORDER BY `time` DESC LIMIT 1";
				$result2 = mysqli_statment($link2, $query2);
				$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
				//echo 	$query2 ;
				//echo "date=".$row2["time"];						
				if ( !empty($row2["time"])) return $row2["time"];

		    mysqli_free_result($result2);
		    mysqli_close($link2);
	
			}
			//echo "date=".$row2["str"];
			return $row2["str"];
	}

  function UpdateMemberStartTime ($mid, $mstart) {
		    $link2 = openmysql();
		    $query2 = "UPDATE `dancer2`.`user` SET `mstart` = '".$mstart."' WHERE `user`.`mid` ='".$mid."' LIMIT 1";
        //echo $query2;
		    $result2 = mysqli_statment($link2,$query2);
		    mysqli_close($link2);

		    if ( empty($result2))  {echo "修改失敗";exit(1);}
  }
	
  function UpdateChangeStartTime ($mid, $mstart) {
			global $TYPE_MEMB_START;

      if (0) {
			$link = openmysql();
			$now = getNow();
			$query = $mstart;
			$query2 = "UPDATE `dancer2`.`change` SET `mid`='$mid', `time`='$now',`type`=$TYPE_MEMB_START,`str`='$query' ".
								"WHERE `type`=$TYPE_MEMB_START AND `mid`='$mid' LIMIT 1 ";
			//echo $query2;
			$result = mysqli_statment($link,$query2) or die ("Invalid query");
			/*echo "起始日修改 type=2";*/
      }

			//if (!mysqli_affected_rows($link)) {
      if (1) {
				$link = openmysql();
				$now = getNow();
				$query = $mstart;
				$query2 = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$mid', '$now',$TYPE_MEMB_START, '$query')";
				//echo $query2;
				$result = mysqli_statment($link,$query2);
				/*echo "起始日修改 type=1";*/
			}

      UpdateMemberStartTime($mid, $mstart);
  }

	function QueryAllMemberStartTime ( &$list, $filter, $order, $start, $limit) {
			global $TYPE_MEMB_START;
		global $MIN_MEMSTART_CLASS;
		global $MAX_MSTART_SEC;
				
		$link = openmysql();
		
	//echo $order;
		if ( !empty($order)) $order2 = $order;
	  else $order2="";

    if (empty($filter)) $filter = "1";
		$query = "SELECT * FROM `user` WHERE $filter ORDER BY  $order2 `sn` DESC, `name` ASC";
		if ( !empty($start) && !empty($limit)) $query = $query." LIMIT $start , $limit";
		//echo "<BR> '".$query."' ";
		$result = mysqli_statment($link,$query);
    $total = mysqli_num_rows($result);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$list[$rt] = $row;

      if (strstr($row["mid"], "SIS2LUMI")) continue;
      if (strstr($row["mid"], "SIS2lumi")) continue;
      if (strstr($row["mid"], "SIS2Lumi")) continue;
      if (strstr($row["mid"], "SIS3LUMI")) continue;
      if (strstr($row["mid"], "SIS3lumi")) continue;
      if (strstr($row["mid"], "SIS3Lumi")) continue;

      if ( $row["mstart"] == NULL) {
        //echo "<BR>empty".$row["mstart"];

			  $list[$rt]["mstart"] = QueryMemberStartTime($row["mid"]);

        if ( !empty($list[$rt]["mstart"])) {
          UpdateMemberStartTime($row["mid"], $list[$rt]["mstart"]);
        } else {
          UpdateMemberStartTime($row["mid"], "0");
        }

      } else {
       // echo "<BR>non-empty".$row["mstart"];
      }

			$resd = $MAX_MSTART_SEC - (getNow() -$list[$rt]["mstart"]);
			//echo "<br>".$resd." ".$list[$rt]["mstart"]." ".getNow();
			if ($resd < 0) $resd = 0;
			$list[$rt]["max_mstart"] = $resd;
			$list[$rt]["max_mstart_days"] = (int)(($resd)/(24*60*60));
			$list[$rt]["max_mstart_mon"] = (int)(($resd)/(31*24*60*60));
			$list[$rt]["max_mstart_day"] = (int)(((($resd)/(31*24*60*60)) - $list[$rt]["max_mstart_mon"])*31);			
      
      /*echo "<br>rt=$rt";*/
      QueryProgress($rt*100/$total);
      ob_flush();
      flush ();

			$rt ++;
    }
    QueryProgress($total*100/$total);
		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}
			
	function QueryResStartMember (&$list, $filter, $start, $size, $ub, $lb) {

		if (empty($filter)) $filter = "";
		$ord = "`mstart`,";
		//$start = "-1";
		/*$ml = QueryMemberLimit($mlist, $filter,$ord, $start, $size); */
	  $ml = QueryAllMemberStartTime ( $mlist, $filter, $ord, $start, $size);
		
		//echo $ml;
		$rt = 0;
		for ($i = 0 ; $i < $ml ; $i++ ){
		//echo "!";
			if ( (( 30 * $mlist[$i]["max_mstart_mon"] + $mlist[$i]["max_mstart_day"]) <= $ub )
				 &&  (( 30 * $mlist[$i]["max_mstart_mon"] + $mlist[$i]["max_mstart_day"]) >= $lb )
						&& $mlist[$i]["mid"][0] != "S"  ) {   
				$list[$rt++] = $mlist[$i];
			}
		}
	
		return $rt;	
	}

	function QueryMemberLimit (&$list, $filter, $order, $start, $limit) {
	  /* 
		type 0: log
	  type 1: class
	  type 2: quota
	  type TYPE_MEMB_START: start time mark 
	  */

		global $MAX_CLASS_SEC;
		global $MAX_BOUND_SEC;
		global $MAX_MSTART_SEC;
		global $MIN_MEMSTART_CLASS;
		
		$link = openmysql();
		
	//echo $order;
		if ( !empty($order)) $order2 = $order;
	else $order2="";
		$query = "SELECT * FROM `user` WHERE 1 $filter ORDER BY  $order2 `sn` DESC, `name` ASC";
		if ($start >=0 ) $query = $query." LIMIT $start , $limit";
		//echo "<BR> '".$query."' ";
		$result = mysqli_statment($link,$query);
    $total = mysqli_num_rows($result);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$list[$rt] = $row;
		
			/* calculate quota */
			$query2 = "SELECT `mid`, SUM(str) FROM `change` WHERE `type` = '1'  AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			$list[$rt]["quota"] = (int)$row2["SUM(str)"];
			
			/* find the date time */
			
			$query2 = "SELECT `mid`, MAX(time) FROM `change` WHERE `type` = '1'  AND CAST(`str` AS SIGNED) >= $MIN_MEMSTART_CLASS AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

				
			$resd = $MAX_CLASS_SEC - (getNow() -$row2["MAX(time)"]);

			//$list[$rt]["mstart"] = QueryMemberStartTime($row["mid"]);
			//$resd = $MAX_CLASS_SEC - (getNow() -$list[$rt]["mstart"]);
			//echo "<BR>".$resd."] [".$row2["MAX(time)"]."] [".getNow();
			if ($resd < 0) $resd = 0;
			$list[$rt]["max_class"] = $resd;
			$list[$rt]["class_start_time"] = $row2["MAX(time)"];
			/*echo $list[$rt]["class_start_time"];*/
			$list[$rt]["max_class_mon"] = (int)(($resd)/(31*24*60*60));
			$list[$rt]["max_class_day"] = (int)(((($resd)/(31*24*60*60)) - $list[$rt]["max_class_mon"])*31);			

/*  mstart*/
			$list[$rt]["mstart"] = QueryMemberStartTime($row["mid"]);
			$resd = $MAX_MSTART_SEC - (getNow() -$list[$rt]["mstart"]);
			//echo "<br>".$resd." ".$row2["MAX(time)"]." ".getNow();
			if ($resd < 0) $resd = 0;
			$list[$rt]["max_mstart"] = $resd;
			$list[$rt]["max_mstart_mon"] = (int)(($resd)/(31*24*60*60));
			$list[$rt]["max_mstart_day"] = (int)(((($resd)/(31*24*60*60)) - $list[$rt]["max_mstart_mon"])*31);			
						

			/* calculate bound */
			$query2 = "SELECT `mid`, SUM(str) FROM `change` WHERE `type` = '2' AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			$list[$rt]["bound"] = (int)$row2["SUM(str)"];
			
			/* find the date time */
			$query2 = "SELECT `mid`, MAX(time) FROM `change` WHERE `type` = '2' AND CAST(`str` AS SIGNED) > 0 AND `mid` = '".$row["mid"]."' GROUP BY `mid`";
			$result2 = mysqli_statment($link,$query2);
			
			$row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
			
			$resd = $MAX_BOUND_SEC - (getNow() -$row2["MAX(time)"]);
			//echo $resd." ".$row2["MAX(time)"]." ".getNow();
			if ($resd < 0) $resd = 0;
			$list[$rt]["max_bound"] = $row2["MAX(time)"];
			$list[$rt]["max_bound_mon"] = (int)(($resd)/(31*24*60*60));
			$list[$rt]["max_bound_day"] = (int)(((($resd)/(31*24*60*60)) - $list[$rt]["max_bound_mon"])*31);

			/* delete quota if  class time out ?? */
			if ( ( $list[$rt]["max_class"] <= 0 ) && $list[$rt]["quota"] > 0) {
				$midll = $list[$rt]["mid"];
				$nowll = getNow();	
				$classll = (-1) * $list[$rt]["quota"];

				$queryll = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$midll', '$nowll', '1', '$classll')";
				$resultll = mysqli_statment($link,$queryll);

				$classll = "Remove Quota $classll (due to class exp. !)"; /* (因課堂過期)";*/
				$queryll = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$midll', '$nowll', '0', '$classll')";
				//echo $queryll;
				$resultll = mysqli_statment($link,$queryll);
			}

			/* delete quota if  class time out ?? */
			else if ( 0 && ( $list[$rt]["max_mstart"] <= 0 ) && $list[$rt]["quota"] > 0) {
				$midll = $list[$rt]["mid"];
				$nowll = getNow();	
				$classll = (-1) * $list[$rt]["quota"];

				$queryll = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$midll', '$nowll', '1', '$classll')";
				$resultll = mysqli_statment($link,$queryll);

				$classll = "Remove Quota $classll (due to member exp. !)"; /* (因會員過期)";*/
				//$classll = "Remove Quota $classll (因會員過期)";

        //LogMemberInfo($midll, $nowll, "33", $classll);

				$queryll = "INSERT INTO `change` (`mid`, `time`,`type`,`str`) VALUES ('$midll', '$nowll', '0', '$classll')";
				//echo $queryll;
				$resultll = mysqli_statment($link,$queryll);
			}
			
      QueryProgress($rt*100/$total);
      ob_flush();
      flush ();
			$rt ++;
		}
    QueryProgress($total*100/$total);

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}
	
	
	function QueryChanges (&$list, $mid) {
	
		global $MAX_PAGE;
		$link = openmysql();
		
		$query = "SELECT * FROM `change` WHERE `mid` = '$mid' ORDER BY `time` DESC";
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$list[$rt] = $row;
			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}
	
	function QueryDeQuotaByTime (&$list, $time, $du = 86400) {
	
		global $MAX_PAGE;
		$totime = $time + $du;
		//echo my_gmdate("m/d", intval($time))."~".$totime;
		$link = openmysql();
		
		$query = "SELECT * FROM `change` WHERE `type` = '5' AND CAST(`time` AS UNSIGNED) >= $time ".
							"AND CAST(`time` AS UNSIGNED) < $totime ORDER BY `time` DESC";
	/*echo $query;*/
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			/*if ($row["str"] >= 0 ) continue;*/
			$list[$rt] = $row;

      $bid = $row['str'];
      $list["bid@".$bid] ++;
      /*echo "bid@".$bid."=".$list["bid@".$bid];*/

			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}
	// register SQL
	function QueryRegByTime (&$list, $time, $du = 86400) {
	
		global $MAX_PAGE;
		$totime = $time + $du;
		//echo my_gmdate("m/d", intval($time))."~".$totime;
		$link = openmysql();
		
		$query = "SELECT * FROM `register` WHERE CAST(`time` AS UNSIGNED) >= $time ".
							"AND CAST(`time` AS UNSIGNED) < $totime ORDER BY `time` DESC";
	/*echo $query;*/
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			/*if ($row["str"] >= 0 ) continue;*/
			$list[$rt] = $row;
			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
	}
	
	function getBrithday($diff, &$list) {
		$link = openmysql();
		
		$query = "SELECT * FROM `user` ORDER BY `name` DESC";
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		$now = getNow();		
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$f = my_strtotime(gmdate("m/d", intval($row["birth"])));
			$n = my_strtotime(gmdate("m/d", intval($now)));
			//echo $n . "-". $f."=";echo $n - $f;echo "<BR>";
			if ( abs($n - $f) < $diff) {
				$list[$rt] = $row;
				$list[$rt]["pas"] = $n - $f;
				$rt ++;
				//echo my_gmdate("m/d", intval($now)). my_gmdate("m/d", intval($row["birth"]))."<BR>";
				
			}
		}
		
		$max =  $list[0]["pas"];
		for ($i = 0 ; $i < $rt ; $i++){
			for ($j = $i+1 ; $j < $rt ; $j++) {
				if ($list[$j]["pas"] <  $list[$i]["pas"]) {
					$tmp = $list[$i];
					$list[$i] = $list[$j];
					$list[$j] = $tmp;
				}
				
			}
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;		
	}

  function getBook (&$book_list)
  {
		$link = openmysql();
		
		$query = "SELECT * FROM `book` ORDER BY `studio` ASC, `time` ASC, `day` ASC, `online` DESC";
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$book_list[$rt] = $row;
			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	
		return $rt;	
  }


	function mapNow2class (&$day, &$time, $margin=0, $end_margin) {

		$now = getnow();
		$day = my_gmdate("N", intval($now));

		$hr = my_gmdate("H", intval($now));
		$mt = my_gmdate("i", intval($now));

		$class_chk = mktime($hr, $mt);

    if (!isset($end_margin)) $end_margin = $margin;
    //echo "end_margin=".$end_margin;

		$class_st[0] = mktime(15, 00) - $margin; 
		$class_en[0] = mktime(16, 30) + $end_margin;
		$class_na[0] = "a";

		$class_st[1] = mktime(17, 00) - $margin; 
		$class_en[1] = mktime(18, 15) + $end_margin;
		$class_na[1] = "b";

		$class_st[2] = mktime(19, 00) - $margin; 
		$class_en[2] = mktime(20, 15) + $end_margin;
		$class_na[2] = "c";

		$class_st[3] = mktime(20, 30) - $margin; 
		$class_en[3] = mktime(21, 45) + $end_margin;
		$class_na[3] = "d";

		$time = "n/a";
		for ($i = 3 ; $i >= 0 ; $i -- ) {
      //echo "<br>".$class_st[$i]. "<". $class_chk ."<". $class_en[$i];
			if ( $class_st[$i] <=  $class_chk &&  $class_chk <= $class_en[$i]) {
				$time = $class_na[$i];
				break;
			}
		}

	}

  function findbooklist ($sn, $studio, $teacher, $day, $time, $name, $sub_name, &$list, &$echo)
  {
	if (!empty($sn))    $_sn   = "`sn` = '$sn' AND ";
	else $_sn ="";

	//if (!empty($studio))  $_studio = "`studio` = '$studio' AND ";
	//else $_studio = "";

    if (!empty($name))  $_name = "`name` = '$name' AND ";
	else $_name = "";

    if (!empty($teacher))  $_teacher = "`teacher` = '$teacher' AND ";
	else $_teacher = "";

    if (!empty($day))  $_day = "`day` = '$day' AND ";
	else $_day = "";

	if (!empty($time))  $_time = "`time` = '$time' AND ";
	else $_time = "";
		
    if (!empty($sub_name))  $_sub_name = "`sub_name` = '$sub_name' AND ";
	else $_sub_name = "";
	
		$link = openmysql();
		
		$query = "SELECT * FROM `book` WHERE $_sn $_teacher $_day $_time $_name $_sub_name 1 ORDER BY `sn` DESC";
	    //echo $query;
		$result = mysqli_statment($link,$query);
		
		$rt = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$list[$rt] = $row;

		$echo[$rt] =
			"[".$list[$rt]["studio"]."] ".
			$list[$rt]["teacher"]."- ".
			$list[$rt]["name"].
			" (".$list[$rt]["sub_name"].")";


			$rt ++;
		}

		mysqli_free_result($result);
		mysqli_close($link);
	return $rt ;
  }

	function findBook ($sn, &$studio, &$teacher, &$day, &$time, &$name, &$sub_name, &$comment, &$online) 
  {
			//if ( findbooklist ($sn, $name, $list, $echo)) {
			if   ( findbooklist ($sn, $studio, $teacher, $day, $time, $name, $sub_name, $list, $echo)) {
			  $studio = $list[0]["studio"];
			  $teacher= $list[0]["teacher"];
			  $day= $list[0]["day"];
			  $time= $list[0]["time"];
			  $name= html_entity_decode($list[0]["name"]);
			  $sub_name= html_entity_decode($list[0]["sub_name"]);
			  $comment= $list[0]["comment"];
			  $online= $list[0]["online"];
			}
  }

  function getBookByOrder (&$book_list)
  {
	
	$count = 0;
	$num = getBook($list);

	mapNow2class ($chk_day, $chk_time, 15*60);

	/* first list now */
	for ( $i = 0 ; $i < $num ; $i ++ ) {
	  if (!$list[$i]["online"]) continue;
	  if (!$list[$i]["day"]) continue;
	  if ($list[$i]["studio"] == "delete") continue;

	  if ( ($list[$i]["day"] == $chk_day) && ($list[$i]["time"] == $chk_time)) {
		$book_list[$count] = $list[$i];
		$count ++;
		$list[$i]["day"] = 0;
	  }
	}

	$book_list[$count]["sn"] = 0;
	$book_list[$count]["studio"] = "-----";
	$book_list[$count]["online"] = 1;
	$count ++;

	for ( $i = 0 ; $i < $num ; $i ++ ) {
	  if (!$list[$i]["online"]) continue;
	  if (!$list[$i]["day"]) continue;
	  if ($list[$i]["studio"] == "delete") continue;

	  if ( ($list[$i]["day"] == $chk_day)) {
		$book_list[$count] = $list[$i];
		$count ++;
		$list[$i]["day"] = 0;
	  }
	}

	for ( $i = 0 ; $i < $num ; $i ++ ) {
	  if (!$list[$i]["online"]) continue;
	  if (!$list[$i]["day"]) continue;
	  if ($list[$i]["studio"] == "delete") continue;

	  $book_list[$count] = $list[$i];
	  $count ++;
	  $list[$i]["day"] = 0;
	}
	
	for ( $i = 0 ; $i < $num ; $i ++ ) {
	  if (!$list[$i]["day"]) continue;

	  $book_list[$count] = $list[$i];
	  $count ++;
	  $list[$i]["day"] = 0;
	}

		return $count;	
  }

	function UpdateBook ($sn, &$studio, &$teacher, &$day, &$time, &$name, &$sub_name, &$comment, &$online) 
  {
	/*echo $sn;*/
	if ( findbooklist ($sn, $studio, $teacher, $day, $time, $name, $sub_name, $list, $echo)) {

		//echo "sn=$sn";
		//echo "comment='$comment'";
		//echo "studio='$studio'";
		if ($comment == "!deleted" ) echo "2";
		
		if (($studio == "delete") && ($comment == "!deleted" ) && !empty($sn)) {
			  $query = "DELETE FROM `book` ".
					" WHERE `book`.`sn` ='$sn' LIMIT 1";
			//echo $query;
			
		} else if (!empty($sn)){			
		  //$name = htmlentities($name, ENT_QUOTES);
		  //$sub_name = htmlentities($sub_name, ENT_QUOTES);

			  $query = "UPDATE `book` ".
					"SET `studio` = '$studio', `teacher` = '$teacher', `day`='$day', `time`='$time', ".
					"`name` = '$name', `sub_name`='$sub_name', `comment`='$comment', `online`='$online'".
					" WHERE `book`.`sn` ='$sn' LIMIT 1";
			//echo $query;
		} else {
			echo "incorrect $sn";
			echo "Maybe Duplcated";
		}
	} else {

		  $query = "INSERT INTO `book` (`studio`,`teacher`,`day`,`time`, `name`,`sub_name`, `comment`,`online`) ".
				 "VALUES ( '$studio', '$teacher', '$day', '$time', '$name', '$sub_name', '$comment', '$online' )";
	}

		if (!empty($query)) {
			$link = openmysql();
			//echo $query;
			$result = mysqli_statment($link,$query);
			mysqli_close($link);
		}
  }

  function echoclassbook ($book_list, $book_num, $studio, $time, $chkonline = 1, $chglist) {

	  mapNow2class ($chk_day, $chk_time, 10*60, 0);
	   /*gmdate("Y/m/d(D) H:i:s", intval($now));*/
	  /*($chk_time = my_gmdate("d", intval(getnow()))*/
	  //echo $chk_day.".".$chk_time;

    if ($chkonline == NULL) $chkonline = 1;

	  /*echo $chkonline;*/
	  for ( $j = 1 ; $j <= 7 ; $j ++) {
		if ( $chk_day == $j && $chk_time == $time) {
		  echo "<td width=\"\" bgcolor=\"#eeee00\"><font size=4>";
		} else {
      if ($studio == "A" ) {
		    echo "<td width=\"\" bgcolor=\"#ccfef6\"><font size=4>";
      } else {
		    echo "<td width=\"\" bgcolor=\"#aeffce\"><font size=4>";
      }
		}


		for ($i = 0 ; $i < $book_num ; $i ++) {


		  if ($book_list[$i]["studio"] == $studio && $book_list[$i]["time"] == $time && $book_list[$i]["day"] == $j) {

			if (($book_list[$i]["online"] == 1 && $chkonline) || !$chkonline) {
       $bidmrk = "bid@".$book_list[$i]["sn"];
			 $bidmrk_n = $chglist[$bidmrk];

			  //echo $bidmrk."=".$bidmrk_n;
			  echo "";
			  if ($book_list[$i]["online"] == 1) echo "<font color=\"#015902\"><b>";
			  echo "<i>".$book_list[$i]["teacher"]."</i>"."(".$bidmrk_n .")";
			  echo "<font size=2><br><a href=\"book_mngr.php?sn=".$book_list[$i]["sn"]."\">";
			  echo $book_list[$i]["name"];
			  echo "</a>";
			  //echo "<br>"." (".$book_list[$i]["sub_name"].")";
			  if ($book_list[$i]["online"] == 1) echo "</font></b>";
			  if ( $chkonline) break;
			}
		  } else {
		  }

		}
		if ( !$chkonline) {
		  echo "<br>[<a href=\"book_mngr.php?day=$j&time=$time&studio=$studio\">S</a>]";
		}
		echo "</font></td>";
	  }

  }

  function myWriteFile ($fname, $content) {
    global $BACKUP_PATH;

    $fname = $BACKUP_PATH.$fname;
    $myfile = fopen($fname, "w") or die("Unable to open file $fname !");

    fwrite($myfile, $content);
    fclose($myfile);
    echo "write $fname OK !";

  }

?>

