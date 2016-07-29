<?php
include("./include/sql.php");
$sqlx = "SELECT * FROM esc_Vertical_tbl WHERE dw_status = 0";
$resx = mysql_query($sqlx);
//$varx2 = array();
if(mysql_num_rows($resx)>0){
    while($rowsx = mysql_fetch_assoc($resx)){
        $varx1[] = $rowsx['vertical_id'];
        $varx2[] = $rowsx['url'];
        $varx3[] = $rowsx['vertical_name'];
        $varx4[] = $rowsx['dw_status'];
        }}
        $n = count($varx2);
$sqly = "SELECT token_id, url, token_sts FROM esc_detail_tbl WHERE token_sts = 0";
$resy = mysql_query($sqly);
if(mysql_num_rows($resy)>0){
    while($rowsy = mysql_fetch_assoc($resy)) {
               // echo $rowsx['url']; echo "....";
        $vary1[] = $rowsy['token_id'];
        $vary2[] = $rowsy['url'];
        $vary3[] = $rowsy['token_sts'];
        }}
        $x = count($vary1);
for ($i=0; $i<=$n; $i++){
    echo $varx2[$i];
    
    
    
    $res = mysql_query($sql);
$sql1 = "SELECT * FROM esc_Vertical_tbl WHERE url NOT IN (SELECT url FROM esc_detail_tbl WHERE token_sts = '0') AND dw_status = '0'";
$res1 = mysql_query($sql1);
if(mysql_num_rows($res1)>0){
    while ($rows1 = mysql_fetch_assoc($res1)) {
        
    }
}
    //for ($j=0; $j<=$n; $j++){
       // echo $varx2[$j];
    /*if($varx2[$i] == $vary2[$j] && $varx4[$i] == $vary3[$j]){
        $var2[$i] == "";
    }   
    //if ($vary1[$i]) != $vary1[$j] &&         //echo "Sujit Sinha";
                
    else {
        echo $varx2[$i]; echo "..  ..";
        //$sqlz = "INSERT INTO esc_detail_tbl (vertical_id, url, vertical_name, token_sts) VALUES ('".$rowsx['vertical_id']."', '".$rowsx['url']."', '".$rowsx['vertical_name']."', '0')"; 
                    //$resz = mysql_query($sqlz);                
        }
       */ }
?>