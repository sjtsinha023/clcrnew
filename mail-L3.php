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
//echo $rowsV['esc_status'];
if ($rowsV['esc_status'] == "") {
    echo "Please Escalate to level L1 First..!";
    exit();
}
if ($rowsV['esc_status'] == "L1") {
    echo "Please Escalate to level L2 First..!";
    exit();
}
if ($rowsV['esc_status'] == "L3" ) {
    echo "escalation already done to level "; echo $rowsV['esc_status'];
    exit();
}
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
$sqlU = "UPDATE esc_detail_tbl SET esc_l3='".$var[0].",".$var[1].",".$var[2]."', esc_status='L3' WHERE token_id='".$ID."'";
$resU = mysql_query($sqlU);
echo "<script>window.close();</script>";
}
?>

<form id="emailForm" name="emailForm" method="post" action="" >
<table width="100%" border="0" align="center" cellpadding="4" cellspacing="1">
<tr>
  <td colspan="2"><strong>Online Contact Form</strong></td>
</tr>
<tr>
<td align="right">Token ID :</td>
<!--<td><input name="Token" type="text" size="10" id="Token"></td>-->
<td ><?php echo $ID; ?></td>
</tr>
<tr>
  <td align="right">Service Name : </td>
  <!--<td align="left" class="style9"></td>-->
  <?php 
//$sqlN = "SELECT display_name AS URL FROM nagios_services WHERE notes ='".$NOTES."'";
//$resN = mysql_query($sqlN);
//$rowsN = mysql_fetch_assoc($resN);
?>  
 <td><a href="<?php echo $ALERT; ?>" target="_blank"><?php echo $ALERT; ?></a></td>
</tr>
<tr>
<td align="right">Vertical Name :</td>
<!--<td><input name="vname" type="text" size="20" id="vname"></td>-->
<td><?php echo $VNAME; ?></td>
</tr>
<tr>
  <td align="right" >E-mail :</td>
  <!--<td><textarea name="email" cols="45" rows="3" id="email"></textarea></td>-->
  <td><label name="email"><?php echo $rowsN['esc_l1']; ?>,<?php echo $rowsN['esc_l2']; ?>,<?php echo $rowsN['esc_l3']; ?></label></td>
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