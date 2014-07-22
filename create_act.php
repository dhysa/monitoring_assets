<?php 
	include "kon.inc.php";
	
           
	$id_users = $_POST['id_users'];
    $jenis_users= $_POST['jenis_users'];
	$nama_users= $_POST['nama_users'];
	$pass_users = $_POST['pass_users'];
	
        if ($id_users== null)
        {
            echo "<script lang=javascript>
	 		window.alert('please, fill the ID!');
	 		window.location.href='create_users.php'
	 		</script>";
        }
        elseif ($jenis_users== null)
        {
            echo "<script lang=javascript>
	 		window.alert('please, fill the jenis user');
	 		window.location.href='create_users.php'
	 		</script>";
        }
        elseif ($nama_users== null)
        {
            echo "<script lang=javascript>
	 		window.alert('please, fill the nama user');
	 		window.location.href='create_users.php'
	 		</script>";
        }
        elseif ($pass_users== null)
        {
            echo "<script lang=javascript>
	 		window.alert('please, fill the pass');
	 		window.location.href='create_users.php'
	 		</script>";
        }
         
        else {
        $sql = "INSERT INTO users VALUES ('$id_users','$jenis_users','$nama_users','$pass_users','')";
	
        $masuk = mysql_query($sql);
	
		 if ($masuk) {
			
            echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.back()
	 		</script>";	
            
			}
            
		else {
            
            echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.location.href='create_users.php'
	 		</script>";            
            
		}
    }  
?>
