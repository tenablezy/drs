<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=utf-8'); ?>
</head>
<body>

<?php
	require ("func.php");
  BackupSystem();

if (0) { /* move to func */
	$now = getNow();
	$bpdate = gmdate("Ymd_H_i_s", intval($now));

	$fromsrc_root = "C:\\wamp64";
	//$tosrc_root = "c:\\backup\\";
	$tosrc_root = "d:\\systembackup\\";

	$fromsrc = $fromsrc_root."\\bin\\mysql\\mysql5.0.51a\\data ";
	$tosrc = $tosrc_root.$bpdate."_dancerdb ";

	$cmd = "xcopy $fromsrc $tosrc /I >test";
	system($cmd);
	//echo $cmd;
	echo "<br>備份資料庫完成!!<br>";
	
	$fromsrc = $fromsrc_root."\\www\\drs ";
	$tosrc = $tosrc_root.$bpdate."_drs";
	$cmd = "xcopy $fromsrc $tosrc /I > test";
	system($cmd);
	//echo $cmd;

	//$tosrc_root = "c:/backup/";
	$tosrc_root = "d:/systembackup/";

	$tosrc = $tosrc_root.$bpdate."_drs_sql_user_db.sql";
        //echo "\n".$tosrc;

  $b1 = BackupFile($tosrc, "user");
	$tosrc = $tosrc_root.$bpdate."_drs_sql_change_db.sql";

	$b2 = BackupFile($tosrc, "change");
	$tosrc = $tosrc_root.$bpdate."_drs_sql_book_db.sql";
	
  $b3 = BackupFile($tosrc, "book");

}
?>


<?php

/*
include 'config.php';
include 'opendb.php';

$tableName  = 'mypet';
$backupFile = 'backup/mypet.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";
$result = mysqli_query($query);


include 'closedb.php';
?>
To restore the backup you just need to run LOAD DATA INFILE query like this :

 

 <?php
 include 'config.php';
 include 'opendb.php';

 $tableName  = 'mypet';
 $backupFile = 'mypet.sql';
 $query      = "LOAD DATA INFILE 'backupFile' INTO TABLE $tableName";
 $result = mysqli_query($query);


 include 'closedb.php';
 ?>
 It's a good idea to name the backup file as tablename.sql so you'll know from which table the backup file is
 */

 ?>

</body>
</html>
