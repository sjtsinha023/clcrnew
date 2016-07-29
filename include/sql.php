<?php
$cn=mysql_connect("localhost","root","root");
$dbname = "Escalation_DB";
mysql_select_db($dbname,$cn);
//echo "database connected";
/*$sql = "SELECT * FROM esc_detail_tbl WHERE vertical_id = 1";
//$sql = "SELECT D.id AS id,V.name AS vertical_name,VP.name AS project,U.name AS requestor_name,request_type,A.name AS approver_name,crt_time,DT_TM_A1,DT_TM_A2,DT_TM_A4,MISC5,MISC6,SEVERITY,CATEGORY,ENGINEER_NAME,CRF_STATUS,TASK FROM tbl_details D LEFT JOIN tbl_vertical V ON V.id = D.vertical LEFT JOIN tbl_vertical_project VP ON VP.id = D.project LEFT JOIN tbl_user U ON U.id = D.requestor_id LEFT JOIN tbl_approver A ON A.id = D.approver_id WHERE CRF_STATUS = 'Approved By Approver' AND request_type != 'Testing Request' ORDER BY D.id DESC";
$res1 = mysql_query($sql);
$totalRows = mysql_num_rows($res1);
if(mysql_num_rows($res1)>0){
		while($rows = mysql_fetch_assoc($res1)){ 
		  echo "testing";
		  echo $rows['url'];}}
          */
?>