<?php 
	include "kon.inc.php";


    if( isset( $_POST['update'] ) ){/** A trigger that execute after clicking the submit     button **/
 
	$id_users = $_POST['id_users'];
    $jenis_users=$_POST['jenis_users'];
	$nama_users=$_POST['nama_users'];
	$pass_users = $_POST['pass_users'];
 
    $queryInput = "UPDATE users 
    SET jenis_users='$jenis_users',nama_users='$nama_users',pass_users='$pass_users' WHERE id_users='$id_users'";

	$masuk = mysql_query($queryInput);
	
		if ($masuk) {
			
			echo "<script lang=javascript>
	 		window.alert('Update successed!');
	 		window.location.href='index.html'
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

