<?php
include("include/sql.php");
$sql = "SELECT TIMESTAMPDIFF(SECOND, a.DT_TM, NOW()), a.vertical_id, a.vertical_name, a.url, a.sysadm_owner, a.T_L1, a.T_L2, a.T_L3, b.vertical_id, b.esc_l1, b.esc_l2, b.esc_l3 FROM esc_Vertical_tbl a, esc_metrix_tbl b WHERE a.dw_status = 0 GROUP BY a.vertical_id";
$res = mysql_query($sql);
while($rows = mysql_fetch_assoc($res)) {

$msg = $rows['url']." is showing Down..!";
$TIMEDIFF = $rows['TIMESTAMPDIFF(SECOND, a.DT_TM, NOW())'];
$TIMEDIFF1 = $rows['TIMESTAMPDIFF(SECOND, a.DT_TM, NOW())']+100;
if($TIMEDIFF <= 60){
$mailid = "sujit.sinha023@gmail.com";
mail($mailid,"Site Down Alert",$msg); 
}
elseif($TIMEDIFF >= $rows['T_L1']*60 && $TIMEDIFF <= $rows['T_L1']*60+60){
    $msg = $rows['url']." is showing Down since more than 10 mins..!";
    $mailid = $rows['esc_l1'];
    mail($mailid,"Site Down Alert for L1",$msg);
}
elseif($TIMEDIFF >= $rows['T_L2']*60 && $TIMEDIFF <= $rows['T_L2']*60+60){
    $msg = $rows['url']." is showing Down since more than 20 mins..!";
    $mailid = $rows['esc_l2'].",".$rows['esc_l1'];
    mail($mailid,"Site Down Alert for L2",$msg);
}    
elseif($TIMEDIFF >= $rows['T_L3']*60 && $TIMEDIFF <= $rows['T_L3']*60+60){
    $msg = $rows['url']." is showing Down since more than 30 mins..!";
    $mailid = $rows['esc_l3'].",".$rows['esc_l2'].",".$rows['esc_l1'];
    mail($mailid,"Site Down Alert for L3",$msg);
    }
}

?>