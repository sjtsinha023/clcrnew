<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
session_start();
include("include/sql.php");
//check_login();
?>
<html>
<head>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
.style1 {
	font-family: Arial;
	font-size: 10pt;
	color: #FFFFFF;
}
.style2 {
	font-family: Arial;
	font-size: 10pt;
}
.leftmnutables {
	border: 1px solid #D3D3D3;
}
.staticlinks {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: black;
	text-decoration: underline;
}
.Plaintext {
	font-family: Arial;
	font-size: 12px;
	color: black;
}
.leftlinksheading {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	font-weight: bold;
	color: #425B79;
	padding-left: 7px;
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #D3D3D3;
	background-color: #E1E1E1;
	height: 21px;
}
.leftlinkstd {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
	padding-left: 4px;
	height: 21px;
	background-color: #EEEEEE;
	border-top-width: 1px;
	border-bottom-width: 1px;
	border-top-style: solid;
	border-bottom-style: solid;
	border-top-color: white;
	border-bottom-color: #C5DAE7;
}
.monitorinfoodd {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: black;
	font-weight: bold;
	background-color: #EEEEEE;
	height: 20px;
	padding-left: 5px;
}
.monitorinfoodd1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: black;
	padding-left: 5px;
}
.whitegrayrightalignB {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #DEDEDE;
	height: 25px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: black;
	padding-left: 3px;
	padding-right: 3px;
}
.whitegrayrightalign {
	border-bottom-width: 1px;
	border-bottom-style: solid;
	border-bottom-color: #DEDEDE;
	height: 25px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: black;
	padding-left: 3px;
	padding-right: 3px;
}
-->
</style>
</head>
<body>
<table width="100%" border="1" cellpadding="1" cellspacing="3" bordercolor="#E6EEEE">
<tr bgcolor="#AED7FF" class="monitorinfoodd">
   <td colspan="4">Notification Report</td>
      <td colspan="4" align="right" class="monitorinfoodd1">Hi <input type="hidden" name="requestor" value="<?php echo $_SESSION['name_of_user'];?>" />
<?php echo $_SESSION['name_of_user'];?> | <a href="dashboard.php">Escalation Dashboard</a> | <a href="logout.php">Logout</a>&nbsp;&nbsp;</td>
 </tr>
  <tr bgcolor="#AED7FF" class="monitorinfoodd">
    <td align="center" width="6%">Alert ID</td>
    <td align="center" width="12%">Reporting Time</td>
    <td align="center" width="12%">Resolution Time</td>
    <td align="center" width="10%">Down Time</td>
    <td align="center" width="25%">Service Name</td>
    <td align="center" width="10%">Action</td>
    <td align="center" width="10%">Name</td>
    <td align="center" width="15%">Comments</td>
  </tr>
  <?php
//$sql="SELECT * FROM tbl_AlertBoard WHERE category='CRITICAL' AND (IP='URL' OR VNAME='DISK') AND ACTION IS NOT NULL ORDER BY DT_TM DESC limit 2000";
//$sql="SELECT * FROM tbl_AlertBoard WHERE category='CRITICAL' AND (IP='URL' OR VNAME='DISK') AND ACTION IS NOT NULL AND DT_TM > DATE_SUB(NOW(),INTERVAL 24 HOUR) ORDER BY DT_TM DESC ";
$sql="SELECT * FROM esc_detail_tbl WHERE token_sts=1";
$res = mysql_query($sql);
if(mysql_num_rows($res)>0){
while($rows = mysql_fetch_assoc($res)){ 

/*$sqlN = "SELECT display_name AS URL FROM nagios_services WHERE notes ='".$rows['NOTES']."'";
$resN = mysql_query($sqlN);
$rowsN = mysql_fetch_assoc($resN);

$sqlIP = "SELECT * FROM tbl_infra WHERE private_ip ='".$rows['IP']."'";
$resIP = mysql_query($sqlIP);
$rowsIP = mysql_fetch_assoc($resIP);*/

?>
  <tr class="monitorinfoodd1">
    <td align="center" valign="middle"><?php echo $rows['token_id']; ?></td>
    <td align="center" valign="middle"><?php echo $rows['in_time']; ?></td>
    <td align="center" valign="middle"><?php echo $rows['out_time']; ?></td>
    <td align="center" valign="middle"><?php echo gmdate('H:i:s', $rows['total_d_time']); ?></td>
    <?php
/*$sqlD = "SELECT TIMEDIFF(ACTION_DT_TM,DT_TM) AS DTIME FROM tbl_AlertBoard WHERE id='".$rows['ID']."'";
$resD = mysql_query($sqlD);
$rowsD = mysql_fetch_assoc($resD);	
echo $rowsD['DTIME'];*/
	?>
    <td align="center" valign="middle">
<?php echo $rows['url'];
/*if($rows['VNAME']=='DISK'){ 
echo $rows['IP']; echo "&nbsp;("; echo $rowsIP['PROJECT']; echo ")";
}else{ ?>
<a href="<?php echo $rowsN['URL']; ?>" target="_blank"><?php echo $rows['SERVICE']; ?></a>
<?php } ?>
&nbsp;<br>
<?php 
if($rows['VNAME']=='DISK'){ ?>
Disk Utilization: <?php echo $rows['VALUE']; ?>%
<?php }else{ echo $rows['VALUE']; }*/ ?>

</td>
    <td align="center" valign="middle"><?php echo $rows['Action']; ?></td>
    <td align="center" valign="middle" class="Plaintext"><?php echo $rows['engneer']; ?></td>
    <td align="center" valign="middle" class="Plaintext"><?php echo $rows['Comments']; ?></td>
  </tr>
  <?php } } ?>
</table>
</body>
</html>
