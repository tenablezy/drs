<?php

  /**************************************************/
  /**** change it before released *******************/

  if (0) { /* develp */
     $isTimeTEST = 1;
     $isLinux = 1;
 		 $mysqli_password = "1234";
 		 $NONMEMBER_ID= "bbb";

  } else {
     $isTimeTEST = 0;
     $isLinux = 0;
 		 $mysqli_password = "";
 		 $NONMEMBER_ID = "nonmember";
  }

  /**************************************************/

	$mysqli_host = "localhost";
	$mysqli_user = "root";
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

  if ($isLinux) {
    $BACKUP_PATH = "/home/nick/public_html/backup/";
    $MYSQL_DUMP = "mysqldump";
    $DOWNLOA_PATH = "/home/nick/public_html/backup/";
    $SQL_SEC_PATH= $BACKUP_PATH;

  } else {
    $BACKUP_PATH = "d:\\systembackup\\";
	  $MYSQL_DUMP = "C:\wamp64\bin\mysql\mysql5.7.14\bin\mysqldump.exe";
    $DOWNLOA_PATH = "d:\\systembackup\\";
    $SQL_SEC_PATH="c:/wamp64/tmp/";
  }


?>
