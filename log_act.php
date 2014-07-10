<?php
 
//ini adalah membuat sessionnya

include "koneksi.php";
$users = addslashes(strip_tags($_POST['users']));
$pass_users = addslashes(strip_tags($_POST['pass_users']));
$get_id = mysql_query("SELECT id_ FROM users WHERE users = '$users'");
 
//script berikut berfungsi untuk mengecek apakah form sudah terisi dengan benar
 
if ($users&&$password){
 $get_sql = mysql_query ("SELECT * FROM users WHERE nama_users = '$nama_users");
 $num = mysql_num_rows($get_sql);
 
//script ini berfungsi untuk mengecek apakah usernama sudah ada atau belum
 if ($num==0){
 echo "users Belum terdaftar";
 }
 else {
 while($row = mysql_fetch_assoc($get_sql)){
 $dbnama = $row ['users'];
 $dbpassword = $row ['pass_users'];
 $id_users = $row ['id_users'];
 $nama_users = $row ['nama_users'];
 }
 
/*Script ini berfungsi untuk mengecek kebenaran users dan password,
jika sudah benar maka program akan membuat sessiojn login
*/
 if ($users == $dbnama && md5($password==$dbpassword)){
 session_start();
 $_SESSION['users'] = $users;
 $_SESSION['id_users'] = $id_users;
 $_SESSION['nama_users'] = $nama_users;
 }
 else {
 echo "Password Salah";
 }
 
 }
 }
 else {
 echo "Tolong penuhi field";
 }
?>


