<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<META http-equiv="Content-Script-Type" content="type">
<?php header('Content-type: text/html; charset=big5'); ?>

<title>新增網頁1</title>

</head>

<body >
<?php
	require ("func.php");

  $addnew     =_get("addnew");
  $reset      =_get("reset");

  if (!empty($reset)) {
    /*
    unset($sn);
    unset($studio);
    unset($teacher);
    unset($day);
    unset($time);
    unset($name);
    unset($sub_name);
    unset($comment);
    unset($online);
    */
   $sn         =
   $studio     =
   $teacher    =
   $day        =
   $time       =
   $name       =
   $sub_name   =
   $comment    =
   $online     ="";
  } else {
   $sn         =_get("sn");
   $studio     =_get("studio");
   $teacher    =_get("teacher");
   $day        =_get("day");
   $time       =_get("time");
   $name       =_get("name");
   $sub_name   =_get("sub_name");
   $comment    =_get("comment");
   $online     =_get("online");
  }
	
	if (empty($now)) {$showm=1;$now = getNow();}

  if (!empty($addnew)
        && !empty($name)
        && !empty($teacher)
        && !empty($sub_name)
     ) {
    UpdateBook($sn, $studio, $teacher, $day, $time, $name, $sub_name, $comment, $online);
  } else if (empty($addnew) && !empty($sn)) {
    findbook($sn, $studio, $teacher, $day, $time, $name, $sub_name, $comment, $online);  
  }

  $book_num = getBook($book_list);

?>
<p><b><font size="5">課程登記</font></b></p>
現在時間: <font size="5" color=blue><b><?php echo gmdate("Y/m/d (D) H:i:s", intval($now));?></b></font>
<hr>
<!-- class A -->
<table border="1" width="70%" id="book">
	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center><font color="blue">Studio A</font></center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>一</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>二</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>三</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>四</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>五</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>六</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>日</center></td>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(a) 15:00 <br>~ 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "a", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(b) 17:00 <br>~ 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "b", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(c) 18:45 <br>~ 20:00</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "c", 0 ); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(d) 20:30 <br>~ 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "A", "d", 0); ?>
	</tr>
</table>

<!-- class B -->
<table border="1" width="70%" id="book">
	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center><font color="blue">Studio B</font></center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>一</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>二</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>三</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>四</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>五</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>六</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>日</center></td>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(a) 15:00 <br>~ 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "a", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(b) 17:00 <br>~ 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "b", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(c) 18:45 <br>~ 20:00</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "c", 0 ); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(d) 20:30 <br>~ 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "B", "d", 0); ?>
	</tr>
</table>

<form method="post" action="book_mngr.php">
	
 Studio :
	<select size="1" name="studio">
	  <option value="delete" selected>刪除</option>
	  <option value="A" <?php if (!empty($studio) && $studio == "A") echo "selected"; ?> >A</option>
	  <option value="B" <?php if (!empty($studio) && $studio == "B") echo "selected"; ?> >B</option>
	</select>

  星期 :
	<select size="1" name="day">
	  <option value="1" <?php if (!empty($day) && $day == "1") echo "selected"; ?>>一</option>
	  <option value="2" <?php if (!empty($day) && $day == "2") echo "selected"; ?>>二</option>
	  <option value="3" <?php if (!empty($day) && $day == "3") echo "selected"; ?>>三</option>
	  <option value="4" <?php if (!empty($day) && $day == "4") echo "selected"; ?>>四</option>
	  <option value="5" <?php if (!empty($day) && $day == "5") echo "selected"; ?>>五</option>
	  <option value="6" <?php if (!empty($day) && $day == "6") echo "selected"; ?>>六</option>
	  <option value="7" <?php if (!empty($day) && $day == "7") echo "selected"; ?>>日</option>
	</select>
  時間 :
	<select size="1" name="time">
	  <option value="a" <?php if (!empty($time) && $time == "a") echo "selected"; ?>>(a) 1500-1630</option>
	  <option value="b" <?php if (!empty($time) && $time == "b") echo "selected"; ?>>(b) 1700-1815</option>
	  <option value="c" <?php if (!empty($time) && $time == "c") echo "selected"; ?>>(c) 1845-2000</option>
	  <option value="d" <?php if (!empty($time) && $time == "d") echo "selected"; ?>>(d) 2030-2145</option>
	</select>

  老師 :
  <input name="teacher" size="10" value="<?php echo $teacher;?>" > <br>
  開課 :
	<select size="1" name="online">
	  <option value="0" <?php if (!empty($online) && $online == "0") echo "selected"; ?>>No</option>
	  <option value="1" <?php if (!empty($online) && $online == "1") echo "selected"; ?>>Yes</option>
  </select>
  課程名稱 :
  <input name="name" size="15" value="<?php echo $name;?>" >
  班別 :
  <input name="sub_name" value="<?php echo $sub_name;?>" size="10"> 

  備註 :
  <input name="comment" value="<?php echo $comment;?>" size="20">(do not use "!deleted")
  <br>
	<input type="submit" value="送出資料" name="addnew"> &nbsp;&nbsp;&nbsp;
	<input type="submit" value="重新填寫" name="reset"></div>
  <input type="hidden" value="<?php echo $sn;?>" name="sn"> 

</form>

<!-- class 0 -->
<table border="1" width="70%" id="book">
	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center><font color="blue">刪除 Pool</font></center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>一</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>二</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>三</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>四</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>五</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>六</center></td>
		<td width="12.5%" bgcolor="#dddddddd"><center>日</center></td>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(a) 15:00 <br>~ 16:30</center></td>
    <?php echoclassbook ($book_list, $book_num, "delete", "a", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(b) 17:00 <br>~ 18:15</center></td>
    <?php echoclassbook ($book_list, $book_num, "delete", "b", 0); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(c) 18:45 <br>~ 20:00</center></td>
    <?php echoclassbook ($book_list, $book_num, "delete", "c", 0 ); ?>
	</tr>

	<tr>
		<td width="12.5%" bgcolor="#dddddddd"><center>(d) 20:30 <br>~ 21:45</center></td>
    <?php echoclassbook ($book_list, $book_num, "delete", "d", 0); ?>
	</tr>
</table>

</body>

</html>
