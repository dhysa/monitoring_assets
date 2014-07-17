<?php 
	include "kon.inc.php";
	
    if( isset( $_POST['create'] ) ){
        
	$id_users = $_POST['id_users'];
    $jenis_users= $_POST['jenis_users'];
	$nama_users= $_POST['nama_users'];
	$pass_users = $_POST['pass_users'];
	
        
        $sql = "INSERT INTO users VALUES ('$id_users','$jenis_users','$nama_users','$pass_users','')";
	
        $masuk = mysql_query($sql);
	
		if ($masuk) {
			        
			echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.location.href='create_users.php'
	 		</script>";
            
			}
    	
		
		else {
				echo "<script lang=javascript>
	 		window.alert('Failed!');
	 		window.back()
	 		</script>";
		}
    }
?>
