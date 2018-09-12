<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>

<title>新增網頁1</title>

</head>

<body >

<!-- Progress bar holder -->
<div id="progress" style="width:500px;border:1px solid #ccc;"></div> <div id="information" style="width"></div>
<!-- Progress information -->
<div id="information" style="width"></div>

<?php
	require ("func.php");

	$qm_all      =_get("qm_all");
	$qm_timeout  =_get("qm_timeout");
	
	
	if ( !empty($qm_all)) {

	  echo $qm_all."<br><br>"; 
		$order = _get("order");
		$total_email= _get("total_email");
		$filter= _get("filter");

			$link = openmysql();
			$query = "SELECT * FROM `user` WHERE 1 $filter ORDER BY $order `email`";
			$result = mysqli_statment($link,$query);
			$i = 0;
			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			  if ( !strstr($row["email"], "@")) continue;
			  if ($i > 300) {
			$i = 0;
			 $total_email .="<BR>############## 300位 切割#############################<BR>";
		  }

		  $str ="<a href=\"mview.php?mid=".$row["mid"]."\">".$row["email"]."</a>; ";

		  $total_email .=$str;
		  $i ++;	
		}
			mysqli_free_result($result);
			mysqli_close($link);

			echo $total_email;
	}
	
	if ( !empty ($qm_timeout) ) {
		
		$filter = NULL;
		$start = 0;
		$ord = "`mstart` DESC,";
		
		$mcount = QueryAllMemberStartTime($mlist, NULL, $ord);
    /*
		if ($mcount < 1 ) { 
			$bt = 1;
			$mcount = QueryMember($mlist, NULL, "`time`,", "0");
		}
		else $bt = 0;	
    */

    $total = 0;
    $email = "";
		for ($i=0 ; $i < $mcount ; $i ++) {
      if ( 0 < $mlist[$i]["max_mstart_days"] && $mlist[$i]["max_mstart_days"] < 30) {
        $birth=getdate(intval($mlist[$i]["birth"]));

		    echo "<a href=\"mview.php?mid=".$mlist[$i]["mid"]."\">";
			  echo "<br>".$mlist[$i]["mid"]."( 生日 ".$birth["mon"]."/".$birth["mday"].")"."=> ".$mlist[$i]["max_mstart_days"]." 天";
		    echo "</a>";
        $email=$email.";".$mlist[$i]["email"];
        $total ++;
      }
		}
		echo "<br>共 ".$total." 位";
    echo "<br>$email<br>";
    echo "<br>";

	}
?>


<form name="ProfileForm" method="post"  action="emaillist.php">

<!--
<input type="hidden" value="<?php echo $bt;?>" name="bt">
<input type="hidden" value="<?php echo $start;?>" name="start">
<input type="hidden" value="<?php echo $ord;?>" name="ord">
<input type="hidden" value="<?php echo $filter;?>" name="filter">
-->
<!--<input type="submit" value="快過期列表(<30 days)" name="qm_timeout">-->
<p><a href="main3.php">會員快到期列表(請耐心等待)!!</a></p>
<input type="submit" value="全部列表" name="qm_all">

</form>

</body>

</html>
