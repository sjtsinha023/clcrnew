<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
session_start();
include("./include/sql.php");
//include("Pager/Pager.php");

//check_login();
//$ID = $_SESSION['USER_ID'];
$sql = "SELECT a.token_id, b.vertical_name, a.url, b.url, b.sysadm_owner, a.in_time, a.total_d_time, b.dw_status, a.token_sts, a.esc_status FROM esc_detail_tbl a, esc_Vertical_tbl b WHERE b.dw_status = 0 and a.token_sts = 0 and b.vertical_id = a.vertical_id";
//$sql = "SELECT D.id AS id,V.name AS vertical_name,VP.name AS project,U.name AS requestor_name,request_type,A.name AS approver_name,crt_time,DT_TM_A1,DT_TM_A2,DT_TM_A4,MISC5,MISC6,SEVERITY,CATEGORY,ENGINEER_NAME,CRF_STATUS,TASK FROM tbl_details D LEFT JOIN tbl_vertical V ON V.id = D.vertical LEFT JOIN tbl_vertical_project VP ON VP.id = D.project LEFT JOIN tbl_user U ON U.id = D.requestor_id LEFT JOIN tbl_approver A ON A.id = D.approver_id WHERE CRF_STATUS = 'Approved By Approver' AND request_type != 'Testing Request' ORDER BY D.id DESC";
$res = mysql_query($sql);
$res = mysql_query($sql);
$sql1 = "SELECT * FROM esc_Vertical_tbl WHERE url NOT IN (SELECT url FROM esc_detail_tbl WHERE token_sts = '0') AND dw_status = '0'";
$res1 = mysql_query($sql1);
if(mysql_num_rows($res1)>0){
    while ($rows1 = mysql_fetch_assoc($res1)) {
    $sql2 = "INSERT INTO esc_detail_tbl (vertical_id, url, vertical_name) VALUES ('".$rows1['vertical_id']."', '".$rows1['url']."', '".$rows1['vertical_name']."')";    
    $res2 = mysql_query($sql2);
    }
}   
$sql3 = "UPDATE esc_detail_tbl SET total_d_time = TIMESTAMPDIFF(SECOND,in_time,NOW()) WHERE token_sts = 0";
$res3 = mysql_query($sql3);
/*
//l3= "SELECT a.url, a.vertical_name, a.dw_status, b.esc_l1, b.esc_l2, b.esc_l3, c.total_d_time FROM esc_Vertical_tbl a, esc_metrix_tbl b, esc_detail_tbl c WHERE a.vertical_id = b.vertical_id AND b.vertical_id = c.vertical_id AND a.dw_status = 0 AND c.total_d_time < 7000 ";
//ql3 = "SELECT a.url, a.vertical_name, a.dw_status, b.esc_l1, b.esc_l2, b.esc_l3, c.total_d_time FROM esc_Vertical_tbl a, esc_metrix_tbl b, esc_detail_tbl c WHERE a.vertical_id = b.vertical_id AND b.vertical_id = c.vertical_id AND a.dw_status = 0 AND c.token_sts = 0 AND c.total_d_time < 500
$sql3 = "SELECT a.url, a.vertical_name, a.dw_status, b.esc_l1, b.esc_l2, b.esc_l3, c.total_d_time FROM esc_Vertical_tbl a, esc_metrix_tbl b, esc_detail_tbl c WHERE a.vertical_id = b.vertical_id AND b.vertical_id = c.vertical_id AND a.dw_status = 0 AND c.token_sts = 0 AND c.total_d_time < 500";
$res3 = mysql_query($sql3);
while ($rows3 = mysql_fetch_assoc($res3)) {
    //echo $rows3['url'];
    $msg1 = $rows3['url'];
    $msg2 = " is showing down.";
    $msg = $msg1.$msg2;
    //$msg. = " is showing down";
    echo $msg;
    $mailid = $rows3['esc_l1'];
    mail($mailid,"EscBoard Down Alert",msg);
    echo "   ## Mail Sent ##  to ".$rows3['esc_l1'];
}
*/


?>
<html>
<head>

<!-- <META HTTP-EQUIV="REFRESH" CONTENT="60"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escalation Board</title>
<link rel="stylesheet" href="js/sort/themes/blue/style.css" type="text/css" id="" media="print, projection, screen">
<style type="text/css">
<!--
.style46 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:#666666
}
body {
	background-image: url(images/bg.jpg);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
  <style type="text/css">
btn {
  background: #8cf7ff;
  background-image: -webkit-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -moz-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -ms-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -o-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: linear-gradient(to bottom, #8cf7ff, #14b8aa);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}

btn:hover {
  background: #3bbdbd;
  background-image: -webkit-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -moz-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -ms-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -o-linear-gradient(top, #3bbdbd, #7affed);
  background-image: linear-gradient(to bottom, #3bbdbd, #7affed);
  text-decoration: none;
}
btn1 {
  background: #f59090;
  background-image: -webkit-linear-gradient(top, #f59090, #f72525);
  background-image: -moz-linear-gradient(top, #f59090, #f72525);
  background-image: -ms-linear-gradient(top, #f59090, #f72525);
  background-image: -o-linear-gradient(top, #f59090, #f72525);
  background-image: linear-gradient(to bottom, #f59090, #f72525);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}
btn2 {
  background: #e5f500;
  background-image: -webkit-linear-gradient(top, #e5f500, #faa869);
  background-image: -moz-linear-gradient(top, #e5f500, #faa869);
  background-image: -ms-linear-gradient(top, #e5f500, #faa869);
  background-image: -o-linear-gradient(top, #e5f500, #faa869);
  background-image: linear-gradient(to bottom, #e5f500, #faa869);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}

btn2:hover {
  background: #e6b83a;
  background-image: -webkit-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -moz-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -ms-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -o-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: linear-gradient(to bottom, #e6b83a, #f0dc28);
  text-decoration: none;
}
  </style>
<style type="text/css">
<!--
.style22 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
}
.style10 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16pt;
	font-weight: bold;
}
.style13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
	color: #FFFFFF;
}
.style14 {
	font-size: 12pt
}
.style47 {
	color: #000000
}
.style48 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript" src="js/sort/jquery-latest.js"></script>
<script type="text/javascript" src="js/sort/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("table").tablesorter({ 
        // sort on the first column and third column, order asc 
        sortList: [[0,2]] 
    }); 
}); 
</script>

</head>
<body>

<table width="100%" border="0" align="center" cellpadding="2" cellspacing="0">
            
  <tr>
    <td bgcolor="#AED7FF"><table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td height="50" align="center" width="40%" bgcolor="#AED7FF" style="border:#FFFFFF 10px SOLID">&nbsp;&nbsp;&nbsp;&nbsp; <span class="style10"><font color="#FFFFFF" size="8">Escalation Board</font></span></td>
        </tr>
        <tr bgcolor="#AED7FF" class="monitorinfoodd">
   <td height="50"><span class="style10"><font color="#FFFFFF"><marquee direction="right" align="center" behavior="alternate" style="border:#FFFFFF 5px SOLID">    Notification Dashboard    </marquee></font></span></td>
        </tr>
        </table>
        <tr>
          <td bgcolor="#AED7FF"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="border:AED7FF 3px SOLID">
              <tr>
              <td colspan="3" align="right"><span class="style9">
       Hi <input type="hidden" name="requestor" value="<?php echo $_SESSION['name_of_user'];?>" />
<?php echo $_SESSION['name_of_user'];?> | <a href="escreport.php">Escalation Report</a>  | <a href="newentry.php">Add New Monitoring</a> | <a href="#" onClick="window.location.reload(true);">Refresh</a> | <a href="logout.php">Logout</a>&nbsp;&nbsp;</span></td>
                <td>&nbsp;</td>
                <td align="right"> <?php
                
//include("header.php");
?>
                </td>
              </tr>
            </table></td>
        
        
        <tr>
          <td align="center" valign="middle" bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td align="right" class="style46"><?php echo $pager->links;?></td>
              </tr>
              <tr>
                <td><table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#E6EEEE" id="myTable" class="tablesorter">
                    <thead>
                      <tr bgcolor="#D7D7D7">
                        <th width="4%"><div align="center" class="style47"><span class="style9">Token-ID</span></div></th>
                        <th width="12%"><div align="center" class="style47"><span class="style9">Vertical Name</span></div></th>
                        <th width="20%"><div align="center" class="style47"><span class="style9">URL</span></div></th>
                        <th width="11%"><div align="center" class="style47"><span class="style9">SysAdmin Owner</span></div></th>
                        <th width="8%"><div align="center" class="style47"><span class="style9">IN-TIME</span></div></th>
                        <!-- <th width="8%"><div align="center" class="style47"><span class="style9">OUT-TIME</span></div></th> -->
                        <th width="8%"><div align="center" class="style47"><span class="style9">DOWN TIME (HH:MM:SEC)</span></div></th>
                        <th width="5%"><div align="center" class="style47"><span class="style9">Escalation L1</span></div></th>
                        <th width="5%"><div align="center" class="style47"><span class="style9">Escalation L2</span></div></th>
                        <th width="5%"><div align="center" class="style47"><span class="style9">Escalation L3</span></div></th>
                        <th width="5%"><div align="center" class="style47"><span class="style9">Close Token</span></div></th>
                        <!--<th width="10%"><div align="center" class="style47"><span class="style9">Acknowladge By</span></div></th>-->
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                      if(mysql_num_rows($res)>0){
		              while($rows = mysql_fetch_array($res)) {
		                  //$rows = mysql_fetch_array($res);
                          //echo $rows['token_id'];
                          //echo $var[x];
		                  //echo $rows['url'];
                          //$URL = $rows['url'];
                          //$VNAME = $rows['vertical_name'];
                    ?>
                    <form method="POST" action=''>
                    <tr height="30">
                        <td><div align="center" class="style46"><span class="style9"><?php echo $rows['token_id'];?></span></div></td>
                        <td><div align="center" class="style46"><span class="style9"><?php echo $rows['vertical_name'];?></span></div></td>
                        <td><div align="center" class="style46"><span class="style9"><a href="<?php $rows['url'];?>" target="_blank"><?php echo $rows['url'];?></span></a></div></td>
                        <td><div align="center" class="style46"><span class="style9"><?php echo $rows['sysadm_owner'];?></span></div></td>
                        <td><div align="center" class="style46"><span class="style9"><?php echo $rows['in_time'];?></span></div></td>
                        <!-- <td><div align="center" class="style46"><?php echo $rows['out_time'];?></div></td> -->
                        
                        <td><div align="center" class="style46"><span class="style9"><?php
                        //$date = strtotime($rows['in_time']);
                        //$CUR_TIME = strtotime(date("Y-m-d H:i:s"));
                        $NEW_TIME = $rows['total_d_time'];
                        //echo $NEW_TIME;
                        $time = gmdate('H:i:s', $NEW_TIME);
                        if($NEW_TIME>1800){ ?>
                            <font color="#FF0000"><b>
                            <marquee behavior="alternate" direction="left" scrollamount="1">
                            <?php
                        //$NEW_TIME = $NEW_TIME;
                        //$NEW_TIME = number_format($NEW_TIME, 0, '.', '');
                        
                        //echo "-";
                        //echo ConvertMinutes2Hours($NEW_TIME);
                        echo $time;
                        }
                        else {
                            echo gmdate('H:i:s', $rows['total_d_time']);
                        }
                        ?> <?php //echo $rows['total_d_time'];?></span></div></td>
                        
                        <td><div align="center" class="style46" >
                         <a href="javascript:;" onClick="MM_openBrWindow('mail-L1.php?ID=<?php echo $rows['token_id']; ?>&VNAME=<?php echo $rows['vertical_name']; ?>&URL=<?php echo $rows['url']; ?>','','width=700,height=300,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')"><?php if ($rows['esc_status'] == "") {?><btn type="submit" value=""></btn><?php } else { ?><btn1 type="submit" value=""></btn1><?php }?></a>
                         </td>
                         <td><div align="center" class="style46">
                         <a href="javascript:;" onClick="MM_openBrWindow('mail-L2.php?ID=<?php echo $rows['token_id']; ?>&VNAME=<?php echo $rows['vertical_name']; ?>&URL=<?php echo $rows['url']; ?>','','width=700,height=300,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')"><?php if ($rows['esc_status'] == "" || $rows['esc_status'] == "L1" ) {?><btn type="submit" value=""></btn><?php } else { ?><btn1 type="submit" value=""></btn1><?php }?></a>
                         </td>
                        <td><div align="center" class="style46">
                         <a href="javascript:;" onClick="MM_openBrWindow('mail-L3.php?ID=<?php echo $rows['token_id']; ?>&VNAME=<?php echo $rows['vertical_name']; ?>&URL=<?php echo $rows['url']; ?>','','width=700,height=300,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')"><?php if ($rows['esc_status'] == "" || $rows['esc_status'] == "L1" || $rows['esc_status'] == "L2") {?><btn type="submit" value=""></btn><?php } else { ?><btn1 type="submit" value=""></btn1><?php }?></a>
                         </td>
                         
                         <td><div align="center" class="style46">
                         <a href="javascript:;" onClick="MM_openBrWindow('mail-done.php?ID=<?php echo $rows['token_id']; ?>&VNAME=<?php echo $rows['vertical_name']; ?>&URL=<?php echo $rows['url']; ?>','','width=700,height=300,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')"><btn2 type="submit" value=""></btn2></a>
                         </td>
                    </div>
                    </td>
                    
                    </tr>
                    </form>
                    <?php } } ?>
                    </tbody>
                </table></td>
              </tr>
            </table></td>
        </tr>
        
        <tr>
          <td height="10"></td>
        </tr>
        
        <tr>
          <td bgcolor="#AED7FF" align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"> Copyright @ 2014 Times Internet Limited. All rights reserved. </font></td>
        </tr>
        
      </table></td>
  </tr>
</table>
</body>
</html>