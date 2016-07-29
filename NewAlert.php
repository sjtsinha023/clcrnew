<?php
include("include/sql.php");
$url = $_GET["url"];
$STATE = $_GET['STATE'];

if($STATE=='D'){
echo $sql = "update esc_Vertical_tbl set dw_status='0' where url='".$url."'";
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
}
elseif($STATE=='U'){
echo $sql = "update esc_Vertical_tbl set dw_status='1' where url='".$url."'";
$sql4 = "UPDATE esc_detail_tbl SET token_sts = 1 WHERE url ='".$url."' and token_sts = 0";
}
$res = mysql_query($sql); 
$res4 = mysql_query($sql4); 
$rows = mysql_fetch_assoc($res); 
?>