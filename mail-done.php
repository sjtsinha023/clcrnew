<?php
require_once("./include/membersite_config.php");

if(!$fgmembersite->CheckLogin())
{
    $fgmembersite->RedirectToURL("login.php");
    exit;
}
session_start();
$ID =$_REQUEST['ID'];
//$ALERT = 'SUJIT';
$ALERT =$_REQUEST['URL'];
$VNAME =$_REQUEST['VNAME'];
//$NOTES =$_REQUEST['NOTES'];
//echo $ID;
//echo $ALERT;
include ("include/sql.php");
$sqlN = "SELECT a.*, b.token_id, b.vertical_id FROM esc_metrix_tbl a, esc_detail_tbl b WHERE token_id ='".$ID."' and b.vertical_id = a.vertical_id";
//$sqlN = "SELECT * FROM esc_metrix_tbl WHERE vertical_id ='".$ID."'";
$resN = mysql_query($sqlN);
$rowsN = mysql_fetch_assoc($resN);
$sqlV = "SELECT esc_status FROM esc_detail_tbl WHERE token_id='".$ID."'";
$resV = mysql_query($sqlV);
$rowsV = mysql_fetch_assoc($resV);

if(isset($_POST["SubmitBtn"])){
include ("include/sql.php");

//$to = "sujit.sinha023@gmail.com";
//$subject = "Contact mail";
$to= $rowsN['esc_l1'];
$var = array($rowsN['esc_l1'], $rowsN['esc_l2'], $rowsN['esc_l3']);
//$msg=$_POST["msg"];
//$headers = "From: $from";
$vname = $_POST["vname"];
//mail($to,$subject,$msg,$headers);
//echo "<script>window.close();</script>";
//echo "Email successfully sent.";
//echo $ALERT;
//echo $from;
//echo $vname;
//echo $subject;
$sql1 = "UPDATE esc_detail_tbl SET out_time = NOW(), engneer = '".$_SESSION['name_of_user']."', Action = '".$_POST["ACTION"]."' ,Comments = '".$_POST["msg"]."', token_sts = 1 WHERE url = '".$ALERT."' AND token_sts = 0";
$sql2 = "UPDATE esc_Vertical_tbl SET dw_status = 1 WHERE url = '".$ALERT."' AND dw_status = 0";
$res1 = mysql_query($sql1);
$res = mysql_query($sql2);
echo "<script>window.close();</script>";
}
?>
<form id="emailForm" name="emailForm" method="post" action="" >
<script type="text/javascript">
{
var ACTION = document.forms["application"]["ACTION"].value;
if (ACTION==null || ACTION=="")
  {
  alert("Please select action type");
  return false;
  }
var ECOMMENT = document.forms["application"]["ECOMMENT"].value;
if (ECOMMENT==null || ECOMMENT=="")
  {
  alert("Please type in comment box");
  return false;
  }
}
</script>
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Online Contact Form</strong></td>
</tr>
<?php echo $_SESSION['name_of_user'];?>
<tr>
<td align="right">Token ID :</td>
<td ><?php echo $ID; ?></td>
</tr>
<tr>
  <td align="right">Service Name : </td>
  <?php 
//$sqlN = "SELECT display_name AS URL FROM nagios_services WHERE notes ='".$NOTES."'";
//$resN = mysql_query($sqlN);
//$rowsN = mysql_fetch_assoc($resN);
?>  
 <td><a href="<?php echo $ALERT; ?>" target="_blank"><?php echo $ALERT; ?></a></td>
</tr>
<tr>
<td align="right">Vertical Name :</td>
<td><?php echo $VNAME; ?></td>
</tr>
<tr>
  <td align="right" >Action Type :</td>
  <td >
<select name="ACTION">
<option value="">Select Action</option>
<option value="Service Restarted">Service Restarted</option>
<option value="Working Fine Without Restart">Working Fine Without Restart</option>
<option value="False Alert">False Alert</option>
<option value="Duplicate Alert">Duplicate Alert</option>
<option value="Problem Resolved">Problem Resolved</option>
<option value="Other">Other</option>
</select>  </td>
</tr>
<tr>
  <td align="right">Message :</td>
  <td>
  <textarea name="msg" cols="45" rows="3" id="msg"></textarea>
  </td>
</tr>
<tr>
  <td>&nbsp;</td>
  <td><input name="SubmitBtn" type="submit" id="SubmitBtn" value="Submit"> </td>
</tr>
</table>
</form>