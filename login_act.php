<?php 
function redirect($page) {
header('Location: ' . $page);
exit();
}
//ini adalah membuat sessionnya
 session_start();
 include ('kon.inc.php');
$id_users = addslashes(strip_tags($_POST['id_users']));
$pass_users = addslashes(strip_tags($_POST['pass_users']));

$get_id = mysql_query("SELECT nama_users,jenis_users FROM users WHERE id_users = '$id_users'");
 
//script berikut berfungsi untuk mengecek apakah form sudah terisi dengan benar
 
if ($id_users&&$pass_users){
 $get_sql = mysql_query ("SELECT * FROM users WHERE id_users = '$id_users'");
 $num = mysql_num_rows($get_sql);
 
//script ini berfungsi untuk mengecek apakah id sudah ada atau belum
 if ($num==0){
 echo "ID Belum terdaftar";
 }
 else {
 while($row = mysql_fetch_assoc($get_sql)){
 $dbnama_users = $row ['nama_users'];
 $dbid_users = $row ['id_users'];
 $dbpassword = $row ['pass_users'];
 $dbjenis_users = $row ['jenis_users'];
 }
 
/*Script ini berfungsi untuk mengecek kebenaran users dan password,
jika sudah benar maka program akan membuat session login
*/
 if ($id_users == $dbid_users && md5($pass_users==$dbpassword)){
 session_start();
          
    switch ($dbjenis_users) {
    case 'admin':
        $_SESSION['id_users'] = $id_users;
        $_SESSION['nama_users'] = $dbnama_users;
        $_SESSION['jenis_users'] = $dbjenis_users;
        redirect ('dash_admin.php');
    break;
    case 'data entry':
        $_SESSION['id_users'] = $id_users;
        $_SESSION['nama_users'] = $dbnama_users;
        $_SESSION['jenis_users'] = $dbjenis_users;
        redirect ('dash_de.php');
    break;
    }
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