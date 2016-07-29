
<?php
include("./include/sql.php");
$sql = "SELECT * FROM esc_detail_tbl WHERE token_sts='0'";
$res = mysql_query($sql);
$rows = mysql_num_rows($res);
$var = 0;
$var1 =0;
?>

<script type="text/javascript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
</script>
  <style type="text/css">
btn {
  background: #9ff58b;
  background-image: -webkit-linear-gradient(top, #9ff58b, #117002);
  background-image: -moz-linear-gradient(top, #9ff58b, #117002);
  background-image: -ms-linear-gradient(top, #9ff58b, #117002);
  background-image: -o-linear-gradient(top, #9ff58b, #117002);
  background-image: linear-gradient(to bottom, #9ff58b, #117002);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 2px 7px 2px 6px;
  text-decoration: none;
}

btn:hover {
  background: #02d430;
  background-image: -webkit-linear-gradient(top, #02d430, #07ab17);
  background-image: -moz-linear-gradient(top, #02d430, #07ab17);
  background-image: -ms-linear-gradient(top, #02d430, #07ab17);
  background-image: -o-linear-gradient(top, #02d430, #07ab17);
  background-image: linear-gradient(to bottom, #02d430, #07ab17);
  text-decoration: none;
}
btn1 {
  background: #03f27a;
  background-image: -webkit-linear-gradient(top, #03f27a, #169e09);
  background-image: -moz-linear-gradient(top, #03f27a, #169e09);
  background-image: -ms-linear-gradient(top, #03f27a, #169e09);
  background-image: -o-linear-gradient(top, #03f27a, #169e09);
  background-image: linear-gradient(to bottom, #03f27a, #169e09);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 0px 20px 0px 20px;
  text-decoration: none;
}

btn1:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
  </style>
  
  <style>
body  {
    background-image: url("images/Shopping.jpeg");
    background-image: url("images/bakgd.jpg");
}
</style>
  <btn type="submit" value=""></btn>
<?php 
$n = 0;
$sql1 = "SELECT * FROM esc_detail_tbl WHERE token_sts='0'";
$res1 = mysql_query($sql1);
$rows1 = mysql_num_rows($res1);
if(mysql_num_rows($res)>0){
    $rowsf = mysql_fetch_assoc($res);
        $var = array($rowsf['esc_status']);
        $var1 = array($rowsf['token_sts']);
        $n = count($var1);
        //echo $rowsf['esc_status'];
        }
        for ($x = 0; $x<=$n; $x++) {
            echo $var[$x];
            $rows1 = mysql_num_rows($res1);
        //if(mysql_num_rows($res1)>0){
        //while ($rows1 = mysql_fetch_assoc($res1)){
    
    
    
    //echo "Hi Sujit";
?>
<tr>
<td><div align="center">
<a href="javascript:;" onClick="MM_openBrWindow('mail-L1.php?ID=<?php echo $rows1['token_id']; ?>
&VNAME=<?php echo $rows1['vertical_name']; ?>&URL=<?php echo $rows1['url']; ?>
','','width=700,height=300,,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')">
<?php if ($var[$x] == "")  { ?><btn type="submit" value=""></btn>
<?php } else { ?><btn1 type="submit" value=""></btn1><?php } echo "Sujit"; ?>
</td>
<td><div align="center">
<a href="javascript:;" onClick="MM_openBrWindow('mail-L2.php?ID=<?php echo $rows1['token_id']; ?>
&VNAME=<?php echo $rows1['vertical_name']; ?>&URL=<?php echo $rows1['url']; ?>
','','width=700,height=300,,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')">
<?php if ($var[$x] == "L1" || $var[$x] == "") { ?><btn type="submit" value=""></btn>
<?php } else { ?><btn1 type="submit" value=""></btn1><?php }?>
</td>
<td><div align="center">
<a href="javascript:;" onClick="MM_openBrWindow('mail-L3.php?ID=<?php echo $rows1['token_id']; ?>
&VNAME=<?php echo $rows1['vertical_name']; ?>&URL=<?php echo $rows1['url']; ?>
','','width=700,height=300,,resizable=yes,scrollbars=yes,toolbar=no,location=no,directories=no,status=no')">
<?php if ($var[$x] == "L1" || $var[$x] == "L2" || $var[$x] == "") {?><btn type="submit" value=""></btn>
<?php } else { ?><btn1 type="submit" value=""></btn1><?php }?>
</td>

  <?php  } ?>