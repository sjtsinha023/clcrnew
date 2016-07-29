<?php
include("include/sql.php");
$url = $_GET["url"];
$STATE = $_GET['STATE'];

if($STATE=='D'){
echo $sql = "update esc_Vertical_tbl set dw_status='0' where url='".$url."'";
}elseif($STATE=='U'){
echo $sql = "update esc_Vertical_tbl set dw_status='1' where url='".$url."'";
}
$res = mysql_query($sql);  
$rows = mysql_fetch_assoc($res); 
?>
