<?php
 $host = "localhost";
 $user = "root";
 $pass = "admin";
 $dbname = "mon_assets";
 
 $con = mysql_connect ($host, $user, $pass) or die ("Tidak bisa konek dengan database".mysql_error);
 mysql_select_db ($dbname) or die ("Gagal membuka database".mysql_error);

//define('host','localhost');
//define('user','root');
//define('pass','admin');
//define('dbname','mon_assets');
?>
