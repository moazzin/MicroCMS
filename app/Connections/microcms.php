<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_microcms = "localhost";
$database_microcms = "db_microcms";
$username_microcms = "usr_microcms";
$password_microcms = "123456";
$connection_microcms = mysql_pconnect($hostname_microcms, $username_microcms, $password_microcms) or trigger_error(mysql_error(),E_USER_ERROR); 
?>