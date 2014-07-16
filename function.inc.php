<?
 function redirect($page){
 header('Location: '.$page);
 exit;
 }

function check_login_status(){
if (isset($_SESSION['id_users'])){
return $_SESSION['id_users'];
}
return false;
}
?>