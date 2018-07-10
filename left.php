<html>
<?php
	require ("func.php");
	

	  $now = getNow();
	  $bkh= gmdate("H", intval($now));
	  $bki= gmdate("i", intval($now));
    $refresh = 10;

    if (!isset($order)) $order = "";
    if (!isset($total_email)) $total_email="";
    if (!isset($filter)) $filter="";
	
		$link = openmysql();
		//$query = "SELECT * FROM `user` WHERE 1 $filter ORDER BY $order `email`";
		$query = "SELECT * FROM `user` WHERE 1 $filter ORDER BY $order `email`";
		$result = mysqli_statment($link,$query);
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {$total_email .=$row["email"].";";	}
		mysqli_free_result($result);
		mysqli_close($link);

?>
<head>
<meta http-equiv="refresh" content="<?php echo $refresh*60;?>">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>新增網頁3</title>
<base target="main">
</head>

<body>

<table align="right"  border="0" width="88%" id="table1">
	<tr>
		<td align="right" ><font face="標楷體" color="#0099FF"><a target="main" href="class.php">
		<span style="text-decoration: none; color: #0099FF"></span></font>
    <img src="logo.gif" height="80" width="120"></font></a>
    </td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="標楷體" color="#009900">
		<a target="main" style="color: #009900" href="new.php"> 
    <img src="rsc\new.jpg" width="40"><span style="text-decoration: none">新增會員</span></a></font></td>
	</tr>
	<tr>
	<tr> <td><hr> </td></tr>
	</tr>
	<tr>
		<td align="right" ><font face="標楷體"><a style="color: #9900FF" href="class.php">
		<span style="text-decoration: none; font-weight:700">課程登記</span>
    <img src="rsc\attend.jpg" width="40"></a></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="標楷體"><a target="main" href="quota.php">
    <img src="rsc\update.jpg" width="40" >
		<span style="text-decoration: none; color: #990000">堂數修改</span></a></font></td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="標楷體">查&nbsp;&nbsp;&nbsp; 詢</font></td>
	</tr>
  -->
	<tr>
		<td align="right" ><font face="標楷體">&nbsp;<a style="color: #009999" href="mblist.php?ordmid=1">
      <span style="text-decoration: none">會員列表</span>
    <img src="rsc\mlist.jpg" width="40"></a></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="標楷體">&nbsp;會員資料</font></td>
	</tr>
	<tr>
		<td align="right" ><font face="標楷體">&nbsp;...</font></td>
	</tr>
	<tr>
		<td align="right" ><font face="標楷體">&nbsp;...</font></td>
	</tr>
  -->
	<tr>
		<td align="right" ><font face="標楷體"><a style="color: #0000FF" href="emaillist.php">
    <img src="rsc\ann.jpg" width="40" >
    <span style="text-decoration: none">通知會員</span>
    </a></font></td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="標楷體">...</font></td>
	</tr>
  -->
	<tr>
		<td>　</td>
	</tr>
	<tr>
		<td align="right" ><font face="標楷體"><a style="color: #0000FF" href="main.php">
      進階查詢</font>
      <img src="rsc\search.jpg" width="40" >
      </a>
    </td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="標楷體" color="#0000FF"><a target="main" href="backup.php">
		<span style="text-decoration: none; color: #0000FF">系統備份</span></a></font></td>
	</tr>
	<tr>
		<td align="right" ><font face="標楷體" color="#0000FF"><a href="info.php">
		<span style="text-decoration: none; color: #555555">系統資訊</span></a></font></td>
	</tr>

 <tr>
		<td> 
	<font size="4"><font color=blue><?php echo gmdate("Y/m/d(D) H:i:s", intval($now));?></font>
	<BR>
	<font size="2">版本:<font color=blue><?php echo $version;?>_<?php echo $ver_date;?></font>
	

        </td></tr>
        
</table>        
<!--
<?php
  //echo "<br>";
    //$ooot = file_get_contents('http://localhost/~nick/drs/main3.php');
    //myWriteFile ("/home/nick/abc.html", $ooot);

    if ( ($bkh == "22" || $bkh == "23" || $bkh == "00") && 
         ( (          0 <= $bki && $bki < 2*$refresh ) ||
           ( 4*$refresh <= $bki && $bki < 5*$refresh )
         )
       )
    {
        echo "[$bkh.$bki.$refresh]";
        BackupSystem();
    }


?>
-->        
</body>

</html>

	
