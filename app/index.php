<?php require_once('Connections/microcms.php'); ?>
<?php require_once('SqlUtils/strings.php'); ?>
<?php require_once('SqlUtils/init.php'); ?>
<?php require_once('Utils/pdate.php'); ?>
<?php
$query_Recordset_menu = 'SELECT `caption`, `page_html_id` FROM `tbl_menu` WHERE `visible` = 1';
$query_Recordset_content = 'SELECT `caption`, `text`, (CASE `collapsed` WHEN 0 THEN \'false\' ELSE \'true\' END) `str_collapsed` FROM `tbl_content` WHERE `visible` = 1';
$query_Recordset_update = 'SELECT Max(`last_update_time`) `last_update` FROM `tbl_content` WHERE `visible` = 1';
#$Recordset_menu = mysql_query($query_Recordset_menu, $connection_microcms) or die(mysql_error());
#$row_Recordset_menu = mysql_fetch_assoc($Recordset_menu);
#$totalRows_Recordset_menu = mysql_num_rows($Recordset_menu);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <meta name="author" content="Ahmed Moazzin" />
	<link rel="stylesheet" href="jQuery/jquery.mobile-1.1.0.min.css" />
	<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
	<script src="jQuery/jquery.mobile-1.1.0.min.js"></script>
	<title>منو</title>
</head>
<body>

<div data-role="page" id="menu_page">
	<div data-role="header">
		<h1>منو</h1>
	</div>
	<div data-role="content">
		<ul data-role="listview" data-inset="true">
<?php
$Recordset_menu = mysql_query($query_Recordset_menu, $connection_microcms) or die(mysql_error());
while ($row_Recordset_menu = mysql_fetch_assoc($Recordset_menu)) {
?>
			<li><a href="#<?php echo $row_Recordset_menu['page_html_id'];?>"><?php echo $row_Recordset_menu['caption'];?></a></li>
<?php
}
?>
		</ul>	
	</div>
		<div data-role="footer" class="footer-docs ui-footer ui-bar-c" data-theme="c" data-position="fixed">
<?php
$Recordset_update = mysql_query($query_Recordset_update, $connection_microcms) or die(mysql_error());
if ($row_Recordset_update = mysql_fetch_assoc($Recordset_update)) {
?>
    		<p style="font-size:12px; color:blue; text-align:center">تاریخ بروز رسانی <?php echo pstrftime("%e %B %Y", strtotime($row_Recordset_update['last_update']));?></p>
<?php
}
?>
			<p style="font-size:12px; text-align:center">نسخه 1.0.1</p>
		</div>
</div>
<?php
$Recordset_menu = mysql_query($query_Recordset_menu, $connection_microcms) or die(mysql_error());
while ($row_Recordset_menu = mysql_fetch_assoc($Recordset_menu)) {
?>
<div data-role="page" id="<?php echo $row_Recordset_menu['page_html_id'];?>">
  <div data-role="header">
    <h1><?php echo $row_Recordset_menu['caption'];?></h1>
  </div>
  <div data-role="content">
    <div data-role="collapsible-set">
    <?php $_query = $query_Recordset_content . ' and `page_html_id` = \'' . $row_Recordset_menu['page_html_id'] . '\'';
	$Recordset_content = mysql_query($_query, $connection_microcms) or die(mysql_error());
    while ($row_Recordset_content = mysql_fetch_assoc($Recordset_content)) {
    ?>
      <div data-role="collapsible" data-theme="b" data-content-theme="d" data-collapsed="<?php echo $row_Recordset_content['str_collapsed'];?>">
        <h3><?php echo $row_Recordset_content['caption'];?></h3>
        <p><?php echo $row_Recordset_content['text'];?></p>
      </div>
    <?php
    }
    ?>
    </div>
  </div>
</div>
<?php
}
?>
</body>
</html>
<?php
mysql_free_result($Recordset_menu);
?>

