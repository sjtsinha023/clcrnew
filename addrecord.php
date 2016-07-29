
<html>
<head>

<!-- <META HTTP-EQUIV="REFRESH" CONTENT="60"> -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Escalation Board</title>
<link rel="stylesheet" href="js/sort/themes/blue/style.css" type="text/css" id="" media="print, projection, screen">
<style type="text/css">
<!--
.style46 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color:#666666
}
body {
	background-image: url(images/bg.jpg);
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
-->
</style>
  <style type="text/css">
btn {
  background: #8cf7ff;
  background-image: -webkit-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -moz-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -ms-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: -o-linear-gradient(top, #8cf7ff, #14b8aa);
  background-image: linear-gradient(to bottom, #8cf7ff, #14b8aa);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}

btn:hover {
  background: #3bbdbd;
  background-image: -webkit-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -moz-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -ms-linear-gradient(top, #3bbdbd, #7affed);
  background-image: -o-linear-gradient(top, #3bbdbd, #7affed);
  background-image: linear-gradient(to bottom, #3bbdbd, #7affed);
  text-decoration: none;
}
btn1 {
  background: #f59090;
  background-image: -webkit-linear-gradient(top, #f59090, #f72525);
  background-image: -moz-linear-gradient(top, #f59090, #f72525);
  background-image: -ms-linear-gradient(top, #f59090, #f72525);
  background-image: -o-linear-gradient(top, #f59090, #f72525);
  background-image: linear-gradient(to bottom, #f59090, #f72525);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}
btn2 {
  background: #e5f500;
  background-image: -webkit-linear-gradient(top, #e5f500, #faa869);
  background-image: -moz-linear-gradient(top, #e5f500, #faa869);
  background-image: -ms-linear-gradient(top, #e5f500, #faa869);
  background-image: -o-linear-gradient(top, #e5f500, #faa869);
  background-image: linear-gradient(to bottom, #e5f500, #faa869);
  -webkit-border-radius: 5;
  -moz-border-radius: 5;
  border-radius: 5px;
  font-family: Arial;
  color: #ffffff;
  padding: 3px 18px 3px 18px;
  text-decoration: none;
}

btn2:hover {
  background: #e6b83a;
  background-image: -webkit-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -moz-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -ms-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: -o-linear-gradient(top, #e6b83a, #f0dc28);
  background-image: linear-gradient(to bottom, #e6b83a, #f0dc28);
  text-decoration: none;
}
  </style>
<style type="text/css">
<!--
.style22 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #000000;
	font-weight: bold;
}
-->
</style>
<style type="text/css">
<!--
.style9 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
}
.style10 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12pt;
	font-weight: bold;
}
.style13 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 10pt;
	font-weight: bold;
	color: #FFFFFF;
}
.style14 {
	font-size: 12pt
}
.style47 {
	color: #000000
}
.style48 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
}
-->
</style>
<script type="text/javascript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/javascript" src="js/sort/jquery-latest.js"></script>
<script type="text/javascript" src="js/sort/jquery.tablesorter.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
    // call the tablesorter plugin 
    $("table").tablesorter({ 
        // sort on the first column and third column, order asc 
        sortList: [[0,2]] 
    }); 
}); 
</script>

</head>
<body>

<table width="50%" border="0" align="center" cellpadding="2" cellspacing="0">
            
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
          <td bgcolor="#AED7FF"><table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" style="border:WHITE 3px SOLID">
              <tr>
              <td colspan="3" align="right"><span class="style9">
       Hi <input type="hidden" name="requestor" value="<?php echo $_SESSION['name_of_user'];?>" />
<?php echo $_SESSION['name_of_user'];?> | <a href="dashboard.php">Escalation Dashboard</a>  | <a href="#" onClick="window.location.reload(true);">Refresh</a> | <a href="logout.php">Logout</a>&nbsp;&nbsp;</span></td>
                <td>&nbsp;</td>
                <td align="right"> <?php
                
//include("header.php");
?>
                </td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td align="right" valign="middle"><div align="right" class="style47 style48"></div></td>
        </tr>
        <tr>
          <td height="10" style="border:#AED7FF 3px SOLID"></td>
        </tr>
        <tr>
          <td align="center" valign="middle" bgcolor="#AED7FF"><table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
              <tr>
                <td align="right" class="style46"><?php echo $pager->links;?></td>
              </tr></table>
             </td></tr> </table>
              <form id="entryForm" name="entryForm" method="post" action="" >
<table width="50%" align="center" border="2" bordercolor="#E6EEEE" >
<tbody>
<tr>
  <td colspan="2"><strong>New Record Entry Form</strong></td>
</tr>
<tr>
<td align="center">Vertical Name :</td>
<td><input type="text" align="center" name="firstname"><br></td>
</tr>
</tbody></table></form>
