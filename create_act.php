<?php 
	include "kon.inc.php";
	
	$id_users = $_POST['id_users'];
    $jenis_users=$_POST['jenis_users'];
	$nama_users=$_POST['nama_users'];
	$pass_users = $_POST['pass_users'];
	//$flag_users = $_POST['flag_users'];
    
    if(preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pass_users) === 0){
        
     // Password must be at least 8 characters and must contain at least one lower case letter, one upper case letter and one digit
        $queryInput = "INSERT INTO users VALUES ('$id_users','$jenis_users','$nama_users','$pass_users')";
	
        $masuk = mysql_query($queryInput);
	
		if ($masuk) {
			        
			echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.location.href='dash_admin.php'
	 		</script>";
            
			}
    }	
		
		else {
				echo "<script lang=javascript>
	 		window.alert('Failed,check your input!');
	 		window.back()
	 		</script>";
		}
?>
