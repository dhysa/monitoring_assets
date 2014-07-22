<?php 
	include "kon.inc.php";
	
           
	$id_assets_standard = $_POST['id_assets_standard'];
    $nama_assets_standard= $_POST['nama_assets_standard'];
	$jumlah_assets_standard= $_POST['jumlah_assets_standard'];
	$id_tier = $_POST['id_tier'];
	
        
        $sql = "INSERT INTO assets_standard (id_assets_standard,nama_assets_standard,jumlah_assets_standard,id_tier) 
                VALUES ('$id_assets_standard','$nama_assets_standard','$jumlah_assets_standard','$id_tier')";
	
        $masuk = mysql_query($sql);
	
		 if ($masuk) {
			
            echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.back()
	 		</script>";	
            
			}
            
		else {
            
            echo "<script lang=javascript>
	 		window.alert('Failed!');
	 		window.back()
	 		</script>";            
            
		}
      
?>
