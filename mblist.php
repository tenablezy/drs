<html>

<head>
<meta http-equiv="Content-Language" content="zh-tw">
<meta http-equiv="Content-Type" content="text/html; charset=Big5">
<?php header('Content-type: text/html; charset=big5'); ?>
<title>�|���C�� �j�M��</title>
</head>

<body>
<div id="progress" style="width:500px;border:1px solid #ccc;"></div> <div id="information" style="width"></div>
<?php
	require ("func.php");
  
  $ordmid  = _get("ordmid");
  $ordmid2 = _get("ordmid2");
  $qstring = _get("qstring");
	
	$qmid   = _get("qmid");   
	$qname  = _get("qname");
	$qdepart= _get("qdepart");
	$qwhat  = _get("qwhat");
	$qemail = _get("qemail");
	$qcell  = _get("qcell");
	$filter = _get("filter");
	$qnone  = _get("qnone");

	$next  = _get("next");
	$prev  = _get("prev");
	$bt    = _get("bt");
	$start = _get("start");
    $ord   = _get("ord");

	if (!empty($ordmid) && $ordmid != $ordmid2) $ordmid2 = $ordmid;
	if (empty($ordmid)) $ordmid = $ordmid2;
	
	if (!empty($prev)) $start -=$MAX_PAGE ;
	else if (!empty($next) && $bt != 1) $start +=$MAX_PAGE ;
	if (empty($start) || $start < 0) $start = 0;
	
	if ($ordmid2 == "�|���s��") $ord = "`mid`,";
	else if ($ordmid2 == "�m�W") $ord = "`name`,";
	else if ($ordmid2 == "��ʹq��") $ord = "`cell`,";	
	else if ($ordmid2 == "¾�~") $ord = "`what`,";	
	else if ($ordmid2 == "���q/�ǮզW��") $ord = "`depart`,";
  else if ($ordmid2 == "E-Mail") $ord = "`email`,";		
	//else $ord = "mid,";
	//echo "a".$ord;

	if (!empty($qmid)) $filter = " AND `mid` like '%$qstring%'";
	else if (!empty($qname)) $filter = " AND `name` like '%$qstring%'";
	else if (!empty($qdepart)) $filter = " AND `depart` like '%$qstring%'";
	else if (!empty($qwhat)) $filter = " AND `what` like '%$qstring%'";
	else if (!empty($qemail)) $filter = " AND `email` like '%$qstring%'";
	else if (!empty($qcell)) $filter = " AND `cell` like '%$qstring%'";
	else if (empty($filter)) $filter = NULL;
	
	if (!empty($qnone)) {
		$filter = NULL;
		$start = 0;
		//$ord = "`mid`,";
		$qstring ="";
	}
	
	$mcount  = 0;
	if (!empty($qstring)) {
		$mcount = QueryMember($mlist, $filter,$ord, $start);
		if ($mcount < 1 ) { 
			$bt = 1;
			$mcount = QueryMember($mlist, $filter,$ord, $start);
		}
		else $bt = 0;
	}
?>

<form name="ProfileForm" method="post"  action="mblist.php">

<input type="hidden" value="<?php echo $bt;?>" name="bt">
<input type="hidden" value="<?php echo $start;?>" name="start">
<input type="hidden" value="<?php echo $ord;?>" name="ord">
<input type="hidden" value="<?php echo $filter;?>" name="filter">

<p align="left">�d�ߦr�� 
<input type="submit" value="�M��" name="qnone">
<input type="text" name="qstring" value="<?php echo $qstring;?>" size="33"> 
<input type="submit" value="�s��" name="qmid">
<input type="submit" value="�m�W" name="qname">
<!--<input type="submit" value="¾�~" name="qwhat">-->
<input type="submit" value="���q/�ǮզW��" name="qdepart">
<input type="submit" value="E-Mail" name="qemail">
<input type="submit" value="phone" name="qcell">

</p>
<p align="left">&nbsp;<input title="�W�@��" type="submit" value="�W�@��" name="prev">
	<input title="�U�@��" type="submit" value="�U�@�� " name="next"> page [#<?php echo $start+1;?>]
</p>
	<table cellSpacing="1" cellPadding="1" width="100%" bgColor="#fcf7fd" border="1" id="table2">
		<tr>
			<td bgcolor="#F5F09A" width="0">#</td>
			<td bgcolor="#F5F09A"  height="50"  width="10%">
				<input title="�|���s���Ƨ�" type="submit" value="�|���s��" name="ordmid">
			</td>
			<td  bgcolor="#F5F09A" height="50" width="35%">
				<input title="�m�W�Ƨ�" type="submit" value="�m�W" name="ordmid">
			</td>			
			<td bgcolor="#F5F09A" height="50"  width="15%">
				<input title="��ʹq�ܱƧ�" type="submit" value="��ʹq��" name="ordmid">				
			</td><!--			
			<td bgcolor="#F5F09A" height="50"  width="10%">
				<input title="¾�~�Ƨ�" type="submit" value="¾�~" name="ordmid">	
			</td>     -->
			<td bgcolor="#F5F09A" height="50"  width="20%">
				<input title="���q/�ǮզW�ٱƧ�" type="submit" value="���q/�ǮզW��" name="ordmid">				
			</td>			
			
			<td bgcolor="#F5F09A" height="50"  width="20%">
				<input title="E-Mail" type="submit" value="E-Mail" name="ordmid">				
			</td>
		</tr>
	<?php 
		for ($i=0 ; $i < $mcount ; $i ++) {
			if ($mlist[$i]["sex"] == 2 ) $styc = "#FF0000";
			else $styc = "#0000FF";
			
			if ($mlist[$i]["admin"] == 1) $sexbgc="#FFFF00" ;
			else if ($mlist[$i]["admin"] == 2) $sexbgc="#FFAAFF";
			else if ($mlist[$i]["admin"] == 3) $sexbgc="#CCFFFF";
			else if ($mlist[$i]["admin"] == 4) $sexbgc="#FFCCCC";
	?>
		<tr>
			<td bgcolor="#F5F09A" width="0"><?php echo $start + $i + 1; ?></td>
			<td bgcolor="<?php echo $sexbgc;?>" width="10%">
				<a style="color: <?php echo $styc;?>; font-weight: bold" href="mview.php?mid=<?php echo $mlist[$i]["mid"];?>"><?php echo $mlist[$i]["mid"];?></a>
			</td>
			<td bgcolor="<?php echo $sexbgc;?>" width="35%"><font color="<?php echo $styc;?>"><b><?php echo $mlist[$i]["name"]."(".$mlist[$i]["nickname"].")";?></td>
			<td bgcolor="<?php echo $sexbgc;?>" width="5%"><font color="<?php echo $styc;?>"><b><?php echo $mlist[$i]["cell"];?></td>			
			<!--<td bgcolor="<?php echo $sexbgc;?>" width="10%"><font color="<?php echo $styc;?>"><b><?php echo $mlist[$i]["what"];?></td>-->
			<td bgcolor="<?php echo $sexbgc;?>" width="30%"><font color="<?php echo $styc;?>"><b><?php echo $mlist[$i]["depart"];?></td>
			<td bgcolor="<?php echo $sexbgc;?>" width="20%"><font size="2" color="<?php echo $styc;?>"><b><?php echo $mlist[$i]["email"];?></td>
		</tr>
	<?php } ?>
		</table><!--
	<input type="hidden" value="www" name="srv">	-->
	<input type="hidden" value="<?php echo $ordmid;?>" name="ordmid2">

</form>

</body>

</html>
