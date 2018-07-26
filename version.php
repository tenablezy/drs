
<?php


	$i=0;

	$infover[$i]["ver"] = "1.7.5";
  $infover[$i]["date"]= "2018/07/26";
  $infover[$i]["info"]= "
    <BR>1. nonmember 扣堂數
    <BR>2. remove 點數
    <BR>3. 刪除 pool 不顯示
    <BR>4. 男女統計亂碼
    <BR>5. 會員 課堂快到期 remove
   ";
  $i++;

	$infover[$i]["ver"] = "1.7.4";
  $infover[$i]["date"]= "2018/07/22";
  $infover[$i]["info"]= "
    <BR>1. 課程人數精確 -> 0 人 要顯示 0  (done)
    <BR>2. 粉色在淺一點 (done)
    <BR>3. show 會員資料 要精簡 (done)
    <BR>4. 修改課程的 時間也要改 19:00 (done)
    <BR>5. 移除 非會員新增 (done)
    <BR>6. 網宣改成 網路 (done)
    <BR>7. '必填'移除 (done)
    <BR>8. 2642 4/11 -> 4/12 有問題 (fix)
    <BR>9. 移除點數顯示 (done)
    <BR>10. 報表開新頁面 (done)
    <BR>11. 課程>0 補 '+' (done)

   ";
  $i++;

	$infover[$i]["ver"] = "1.7.3";
  $infover[$i]["date"]= "2018/07/10";
  $infover[$i]["info"]= "
    <BR>1. 課程字體變大
    <BR>2. 左列表字體變大
    <BR>3. class 18:45 --> 19:00 ~ 20:15 (Done)
    <BR>4. 新增字體變大 (?)
    <BR>5. 會員改成一種：一般會員
    <BR>6. 會員資料只留：姓名 性別 生日 職業 手機 如何得知
    <BR>7. 會員起始日 要保留, 且有問題要修正
    <BR>8. 亂碼問題
    <BR>9. 上課紀錄有問題
   ";
  $i++;


	$infover[$i]["ver"] = "1.7.2";
  $infover[$i]["date"]= "2017/04/29";
  $infover[$i]["info"]= "
    <BR>1. 是否要備份?  (是需求備份  \"D:\systembackup\" ) (done) !
    <BR>2. (1), (2),的表格是否需要!? 弄成簡訊!?  
	          (先改成提供 堂票和會員過期mail list, 讓櫃台寄信發送!) (Done)
    <BR>3. 點數 刪除 (不顯示!!)  --> Done
    <BR>4. 有一些困惑的數字 (Done !)
    <BR>5 個人照片無法改!? (\"C:\wamp64\www\drs.20130811\pic\") done!
    <BR>6. 照片要兩個 computer sync (應該沒有問題!) (Done!)
    <BR>7. 更新頁面拉長 (done!)
    <BR>8. 全部延長會員期限與課堂期限 (11/1 ~ 12/31 月) (抓 起始日 2016.3.1(@1456761600) ~ 2016.10.31(2016.11.01.00, @1477929600) 日入會一年 ! 給列表!) -->done
           <BR>date +\"%s\" --date=\"2013/01/01\"
           <BR>1356969600
           <BR>date --date='@1356969600'

    <BR>9. 每日的+堂課和上課 存起來 狀況! 9:50 自動backup 和報表, 網頁要開著(Todo!)
	  <BR>10. 堂數歸零 (課堂過期 或 會員過期 1Y!) --> Done
	  <BR>11. 上課編號 轉成上課老師! --> Done
	  <BR>12. 新增 ALTER TABLE `user` ADD `mstart` VARCHAR(100) CHARACTER SET big5 COLLATE big5_chinese_ci NULL DEFAULT NULL AFTER `prop`;
  ";
  $i++;
	
	
	$infover[$i]["ver"] = "1.7.1";
  $infover[$i]["date"]= "2013/07/01";
  $infover[$i]["info"]= "
    <BR>01. 新增會員的 VIP  拿掉
    <BR>02. 左列的 選單 沒有用的功能拿掉
    <BR>03. 點數修改-->
    <BR>登入上課:,  1堂,2 堂,3堂
    <BR>購買堂數, 10堂 5堂 20堂 
    <BR>04. 紅利 拿掉 
    <BR>05. 拿掉 重新設定
    <BR>06. 現在時間的更新
    <BR>07.先增會員的 電話 字串拿掉
    <BR>08. 新增會員的登入 要先選  會員類型  才可以key資料
    <BR>09.  搜尋條件 拿掉 職業 欄位 
    <BR>10.  課程登記 和 課堂 到期 的意思 衝突,   應該要 明確顯示 真正的上課紀錄
    <BR>11.虛線 過長
    <BR>12. 增加 課程登入 內容方式 彈性的 課程名稱 的定義, 真的上課
    <BR>13. 輸出表單 
    <BR>  a. 可以選時間 區間 做報表
    <BR>  b. by date, 每個人
    <BR>  c.  到期和扣課程的紀錄一明確
    <BR>14. email link 功能
    <BR>teamview ID: 898 290 244
  ";
  $i++;
	
	$infover[$i]["ver"] = "1.6.1";
  $infover[$i]["date"]= "2011/5/3";
  $infover[$i]["info"]= "
  <BR>1. 起始日 不應該因為課堂加值而更新
  <BR>2. 課堂 reset時機點 應該是 課堂timeout,而非會員timeout
  <BR>3. 判定課堂起始時間為堂數加值>=3
  ";
  $i++;
	
	
  $infover[$i]["ver"] = "1.6.0";
  $infover[$i]["date"]= "2011/5/1(開幕)";
  $infover[$i]["info"]= "
  <BR>k1. 扣減堂數也會同步扣減紅利 --> 加 (多一個按鈕 叫'上課')
  <BR>k2. 新增點數裡的查詢無法重複使用 (ok)
  <BR>3. 生日跟會員起始日常會顯示1970/1/1  (待check)
  <BR>k4. 首頁的’會員快過期’不能用 (生日拿掉!!)
  <BR>k5. 查詢列表增加’電話’’email’(ok)
  <BR>6. 新增會員後起始日不會自動變當日
  <BR>k7. 每日點數報表 (當日上課人數)
  <BR>k8, 會員期限 1y (課堂期限 6 mon)
  <BR>k9. 會原列表 多 email欄位 
  <BR>10. 修改課堂,不應該修改到期日 (ref.6)
  <BR>k11. 地址拿掉(for new member)
  <BR>k12. no 市話(for new member)
  <BR>13. new member(VIP or ..) , 起始日,生日都有問題
  <BR>k14. 課堂期限(6mon) 歸零
  <BR>k15. 會員通知 Email截斷
  ";
  $i++;

	$infover[$i]["ver"] = "1.5.0";
	$infover[$i]["date"]= "2010/11/21~2011/04/21";
	$infover[$i]["info"]= "1. 扣減堂數也會同步扣減紅利 <BR>
                         *2. 新增點數裡的查詢無法重複使用<BR> 
                         3. 生日跟會員起始日常會顯示1970/1/1<BR> 
                         *4. 首頁的’會員快過期’不能用<BR> 
                         *5. 查詢列表增加’電話’’email’<BR> 
                         6. 新增會員後起始日不會自動變當日<BR> 
                         7. 每日點數報表<BR>
                        ". 
												"";	
	$i++;	
	$infover[$i]["ver"] = "1.4.5";
	$infover[$i]["date"]= "2009/07/03";
	$infover[$i]["info"]= "修正bug=> 修改起始時間 會影響到其他會員!!<br>".
												"";	
	$i++;
	$infover[$i]["ver"] = "1.4.4";
	$infover[$i]["date"]= "2009/05/23";
	$infover[$i]["info"]= "1. 改變 紀錄樣式<br>".
    										"2. 若無startime,以最近加課程為主<br>".
												"";	
	
	$i++;
	$infover[$i]["ver"] = "1.4.3";
	$infover[$i]["date"]= "2009/03/30";
	$infover[$i]["info"]= "1. 點數 -> 課堂  (三個月到期)<br>".
    										"		+- 3 不列入計算<br>".
   											"		+5 以上 (消費)<br>".
   											"		堂課 題醒  2個禮拜提醒<BR>";

	$i++;	
	
	$infover[$i]["ver"] = "1.4.2";
	$infover[$i]["date"]= "2009/03/27";
	$infover[$i]["info"]=	"1.會員的加入時間--> 手填 (在修改區, 一年期限)<br>".
   											"  *一個月內 請通知<br>".
												"2. 統計不正確<br>".
												"3. trace,   type =>中文<BR>";

	$i++;		
	
	
	$infover[$i]["ver"] = "1.4.1";
	$infover[$i]["date"]= "2009/03/10";
	$infover[$i]["info"]=
											"1.姐妹卡可只輸入一人 (手動修改方法) <br>".
											"2.姐妹卡 手動修改 功能 <br>";
	$i++;	
	
	$infover[$i]["ver"] = "1.4";
	$infover[$i]["date"]= "2009/02/01";
	$infover[$i]["info"]= 	"1.姊妹卡功能 <br>".
											"2.\"會員列表\" 排序 by 編號<br>".
											"3.點數和期限功能 <br>".
											"4.新增蛋糕圖案<br>". 
											"5.移除個人資料 (職業,單位,地址,緊急聯絡電話,...) <br>".
											"6.新增剩餘幾天 <br>".
											"7.新增一般,基楚,進階的增加 <br>".
											"8.新增到期功能 <br>";
	$i++;	
	
	$infover[$i]["ver"] = "1.3";
	$infover[$i]["date"]= "2008/07/05";
	$infover[$i]["info"]= "計錄新增使用者時間";
	$i++;	

	$infover[$i]["ver"] = "1.1";
	$infover[$i]["date"]= "2008/06/01";
	$infover[$i]["info"]= 	"1.刷卡時 生日和點數要提醒 aclass.php <BR>".
											"2.課堂誤刷要 刪掉<br>".
											"3.加課堂加錯要 刪掉 <br>".
											"4.E-mail 會員通知 left.php<br>".
											"5.首頁 顯示 11月提醒, 兩個月後 取消<br>".
											"6.堂數和紅利用手打 a quota.php<br>".
											"7.請要加買堂數 a main.php <br>".
											"8.新增刪除會員功能"
											;
	$i++;
	

	
	$infover[$i]["ver"] = "2.0";
	$infover[$i]["date"]= "2017/01/13";
	$infover[$i]["info"]= "20170113 now LMG";
											
											
											
	$i++;
	

	
	$infover[$i]["ver"] = "1.0";
	$infover[$i]["date"]= "2008/04/01";
	$infover[$i]["info"]= "Initial Version";
	$i++;
	
	
	$infover[$i]["ver"] = "";

	$version = $infover[0]["ver"];
	$ver_date = $infover[0]["date"];
?>
