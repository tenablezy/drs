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
<title>�s�W����3</title>
<base target="main">
</head>

<body>

<table align="right"  border="0" width="88%" id="table1">
	<tr>
		<td align="right" ><font face="�з���" color="#0099FF" size=3><a target="main" href="class.php">
		<span style="text-decoration: none; color: #0099FF"></span></font>
    <img src="logo.gif" height="80" width="120"></font></a>
    </td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="�з���" color="#009900" size=3>
		<a target="main" style="color: #009900" href="new.php"> 
    <img src="new.jpg" width="40"><span style="text-decoration: none">�s�W�|��</span></a></font></td>
	</tr>
	<tr>
	<tr> <td><hr> </td></tr>
	</tr>
	<tr>
		<td align="right" ><font face="�з���"><a style="color: #9900FF" href="class.php">
		<span style="text-decoration: none; font-weight:700">�ҵ{�n�O</span>
    <img src="attend.jpg" width="40"></a></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="�з���"><a target="main" href="quota.php">
    <img src="update.jpg" width="40" >
		<span style="text-decoration: none; color: #990000">��ƭק�</span></a></font></td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="�з���">�d&nbsp;&nbsp;&nbsp; ��</font></td>
	</tr>
  -->
	<tr>
		<td align="right" ><font face="�з���">&nbsp;<a style="color: #009999" href="mblist.php?ordmid=1">
      <span style="text-decoration: none">�|���C��</span>
    <img src="mlist.jpg" width="40"></a></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="�з���">&nbsp;�|�����</font></td>
	</tr>
	<tr>
		<td align="right" ><font face="�з���">&nbsp;...</font></td>
	</tr>
	<tr>
		<td align="right" ><font face="�з���">&nbsp;...</font></td>
	</tr>
  -->
	<tr>
		<td align="right" ><font face="�з���"><a style="color: #0000FF" href="emaillist.php">
    <img src="ann.jpg" width="40" >
    <span style="text-decoration: none">�q���|��</span>
    </a></font></td>
	</tr>
	<tr> <td><hr> </td></tr>
  <!--
	<tr>
		<td align="right" ><font face="�з���">...</font></td>
	</tr>
  -->
	<tr>
		<td>�@</td>
	</tr>
	<tr>
		<td align="right" ><font face="�з���"><a style="color: #0000FF" href="main.php">
      �i���d��</font>
      <img src="search.jpg" width="40" >
      </a>
    </td>
	</tr>
	<tr> <td><hr> </td></tr>
	<tr>
		<td align="right" ><font face="�з���" color="#0000FF"><a target="main" href="backup.php">
		<span style="text-decoration: none; color: #0000FF">�t�γƥ�</span></a></font></td>
	</tr>
	<tr>
		<td align="right" ><font face="�з���" color="#0000FF"><a href="info.php">
		<span style="text-decoration: none; color: #555555">�t�θ�T</span></a></font></td>
	</tr>

 <tr>
		<td> 
	<font size="4"><font color=blue><?php echo gmdate("Y/m/d(D) H:i:s", intval($now));?></font>
	<BR>
	<font size="2">����:<font color=blue><?php echo $version;?>_<?php echo $ver_date;?></font>
	

        </td></tr>
        
</table>        
<!--
<?php
  //echo "<br>";
    //$ooot = file_get_contents('http://localhost/~nick/drs/main3.php');
    //myWriteFile ("/home/nick/abc.html", $ooot);

    if ( ($bkh == "22" || $bkh == "23" || $bkh == "00") && 
         ( (          0 <= $bki && $bki < 2*$refresh ) ||
           ( 3*$refresh <= $bki && $bki < 5*$refresh )
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

	
