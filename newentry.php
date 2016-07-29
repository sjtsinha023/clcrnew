<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
session_start();
include("include/sql.php");
//include("Pager/Pager.php");


//session_start();
//include("config.php");
//check_login();
if($_POST){
    include("include/sql.php");
    $VID = $_POST['vertical'];
    if ($VID == ""){ ?><script>alert("Please Select the vertical Name!");</script><?php break;}
    $VNAME = $_POST['text_content']; echo $VNAME;
    $URL = $_POST['URL'];
    if ($URL == ""){ ?><script>alert("Please Fill the URL!");</script><?php break;}
    $OWNER = $_POST['OWNER'];
    if ($OWNER == ""){ ?><script>alert("Please Fill the OWNER NAME!");</script><?php break;}
    $T_L1 = $_POST['L1time'];
    if ($T_L1 == ""){ ?><script>alert("Please Select the time for Escalation Lavel-1..!");</script><?php break;}
    $L1_MAIL = $_POST['L1-Email'];
    if ($L1_MAIL == ""){ ?><script>alert("Please fill the correct Email Ids for Escalation Lavel-1..!");</script><?php break;}
    $T_L2 = $_POST['L2time'];
    if ($T_L2 == ""){ ?><script>alert("Please Select the time for Escalation Lavel-2..!");</script><?php break;}
    $L2_MAIL = $_POST['L2-Email'];
    if ($L2_MAIL == ""){ ?><script>alert("Please fill the correct Email Ids for Escalation Lavel-1..!");</script><?php break;}
    $T_L3 = $_POST['L3time'];
    if ($T_L3 == ""){ ?><script>alert("Please Select the time for Escalation Lavel-3..!");</script><?php break;}
    $L3_MAIL = $_POST['L3-Email'];
    if ($L3_MAIL == ""){ ?><script>alert("Please fill the correct Email Ids for Escalation Lavel-1..!");</script><?php break;}
    //$TR_SER = $_POST['TR_SER'];
$sql = "INSERT INTO esc_Vertical_tbl (vertical_id, vertical_name, url, dw_status, sysadm_owner, T_L1, T_L2, T_L3) VALUES ('".$VID."', '".$VNAME."', '".$URL."', '1', '".$OWNER."', '".$T_L1."', '".$T_L2."', '".$T_L3."')"; 
$sql1 = "INSERT INTO esc_metrix_tbl (vertical_id, esc_l1, esc_l2, esc_l3) VALUES ('".$VID."', '".$L1_MAIL."', '".$L2_MAIL."', '".$L3_MAIL."')";   
$res = mysql_query($sql);
$res1 = mysql_query($sql1);
header("Location:crf_details.php?id=".encryptdata($TR_SER));
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escalation Board</title>


<style type="text/css">
<!--
body {
	background-image: url(images/bg.jpg);
}
.style9 {	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
}
.style10 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
	font-weight: bold;
    }
.style22 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<script type="text/javascript">
function validateForm()
{
var vertical = document.forms["application"]["vertical"].value;
var SEVERITY = document.forms["application"]["SEVERITY"].value;
var FORM_DESCRIP = document.forms["application"]["FORM_DESCRIP"].value;
var details = document.forms["application"]["details"].value;

if (vertical ==null || vertical =="")
  {
  alert("Please select vertical");
  return false;
  }else{
  	var project = document.application.project.value;
	var approver = document.application.approver.value;
   }
 if (project ==null || project =="0")
  {
  	alert("Please select Project");
  	return false;
  }
  }
  </script>
<script type="text/javascript">
  function callProject(vertialId){
$.ajax({
   type: "POST",
   url: "../createProject.php",
   data: "verticalId="+vertialId,
   success: function(msg){

document.getElementById("project1","vertical").innerHTML=msg;

    // $.("#project1").html(msg);
   }
 });
  }
  </script>
 
</head>
<body>
<form method="post" name="application" onsubmit="return validateForm()">
<table width="760" border="0" align="center" cellpadding="2" cellspacing="0">
  
              <tr>
    <td bgcolor="#AED7FF"><table width="50%" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#AED7FF">
        <tr>
          <td height="50" align="center" width="40%" bgcolor="#AED7FF" style="border:WHITE 10px SOLID">&nbsp;&nbsp;&nbsp;&nbsp; <span class="style10"><font color="#FFFFFF" size="6">Escalation Board</font></span></td>
        </tr>
        <tr bgcolor="#AED7FF" class="monitorinfoodd">
   <td height="30"><span class="style10"><font color="#FFFFFF"><marquee direction="right" align="center" behavior="alternate" style="border:WHITE 3px SOLID">Add New Record</marquee></font></span></td>
        </tr>
        </table>
        <tr>
          <td bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="border:#AED7FF 3px SOLID">
              <tr>
              <td colspan="3" align="right"><span class="style9">
       Hi <input type="hidden" name="requestor" value="<?php echo $_SESSION['name_of_user'];?>" />
<?php echo $_SESSION['name_of_user'];?> | <a href="dashboard.php">Escalation Dashboard</a>  | <a href="#" onClick="window.location.reload(true);">Refresh</a> | <a href="logout.php">Logout</a>&nbsp;&nbsp;</span></td>
                <td>&nbsp;</td>
                <td align="right"> <?php
                
//include("header.php");
?>
            <tr height="40">
              <td width="300">&nbsp;</td>
              <td width="30">&nbsp;</td>
              <td width="430">&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Vertical Name </td>
              <td class="style9" align="center">:</td>
              <td><label>
                 <select name="vertical" id="vertical" style="width:200px;" onchange="document.getElementById('text_content').value=this.options[this.selectedIndex].text">
                  <option value="">Select Vertical</option>
                                    <option value="38">A Day in a Life</option>
                                    <option value="3">Ad Tech</option>
                                    <option value="24">BCCL</option>
                                    <option value="33">Blogs Network</option>
                                    <option value="37">BOX TV</option>
                                    <option value="50">CEO Office</option>
                                    <option value="1">CMS</option>
                                    <option value="6">Common Platform</option>
                                    <option value="2">Community</option>
                                    <option value="53">Dineout</option>
                                    <option value="27">eCommerce</option>
                                    <option value="4">Gaana</option>
                                    <option value="34">Gaming</option>
                                    <option value="44">Indiatimes</option>
                                    <option value="5">IPL</option>
                                    <option value="48">MensXP</option>
                                    <option value="51">Popkorn</option>
                                    <option value="35">QNA</option>
                                    <option value="54">Recharger</option>
                                    <option value="26">SME</option>
                                    <option value="25">TAN</option>
                                    <option value="40">Telecom</option>
                                    <option value="42">TIL QC</option>
                                    <option value="30">TimesCity</option>
                                    <option value="31">TimesCrest</option>
                                    <option value="36">TimesDeal</option>
                                    <option value="52">Whats Hot</option>
                                    <option value="45">World Wide Media</option>
                                    <option value="29">Zigwheels</option>
                                  </select>
                                  <input type="hidden" name = "text_content" id="text_content" />
                </label>              </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Monitoring URL </td>
              <td class="style9" align="center">:</td>
              <td><input type="text" name="URL" id="URL" />
            </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Sysadmin Owner </td>
              <td class="style9" align="center">:</td>
              <td><input type="text" name="OWNER" id="OWNER" />
            </td>
            </tr>
            <tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Time to escalate L1 (Min) </td>
              <td class="style9" align="center">:</td>
              <td><select name="L1time">
  <option label="">Select Time</option>            
  <option label="10 Mins">10</option>
  <option label="15 Mins">15</option>
  <option label="20 Mins">20</option>
  <option label="30 Mins">30</option>
  <option label="45 Mins">45</option>
</select>
            </td>
            </tr>
            <tr>
              <td colspan="3" height="10"></td>
            </tr>
            <tr>
              <td class="style9" align="right">L1 Email_IDs </td>
              <td class="style9" align="center">:</td>
              <td><textarea name="L1-Email" cols="45" rows="3" id="L1-Email"></textarea>
            </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Time to escalate L2 (Min) </td>
              <td class="style9" align="center">:</td>
              <td><select name="L2time">
  <option label="">Select Time</option>
  <option label="20 Mins">20</option>
  <option label="30 Mins">30</option>
  <option label="45 Mins">45</option>
  <option label="60 Mins">60</option>
  <option label="75 Mins">75</option>
  <option label="90 Mins">90</option>
</select>
            </td>
            </tr>
            <tr>
              <td colspan="3" height="10"></td>
            </tr>
            <tr>
              <td class="style9" align="right">L2 Email_IDs </td>
              <td class="style9" align="center">:</td>
              <td><textarea name="L2-Email" cols="45" rows="3" id="L2-Email"></textarea>
            </td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td class="style9" align="right">Time to escalate L3 (Min) </td>
              <td class="style9" align="center">:</td>
              <td><select name="L3time">
  <option label="">Select Time</option>
  <option label="30 Mins">30</option>
  <option label="45 Mins">45</option>
  <option label="60 Mins">60</option>
  <option label="75 Mins">75</option>
  <option label="90 Mins">90</option>
  <option label="120 Mins">120</option>
</select>
            </td>
            </tr>
            <tr>
              <td colspan="3" height="10"></td>
            </tr>
            <tr>
              <td class="style9" align="right">L3 Email_IDs </td>
              <td class="style9" align="center">:</td>
              <td><textarea name="L3-Email" cols="45" rows="3" id="L3-Email"></textarea>
            </td>
            </tr>
            <tr>
              <td colspan="3" id="project1" style="width:200px;"></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="center"><input name="submit" type="submit" class="style11" id="button" value="Add Record" /></td>
            </tr>
            <tr>
              <td> 
			</td>
              <td> </td>
              <td>&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#AED7FF" colspan="3" align="center"><font face="Arial, Helvetica, sans-serif" size="2" color="#FFFFFF"> Copyright © 2012 Times Internet Limited. All rights reserved.</td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
  </tr>
</table>
</form>
</body>

</html>
