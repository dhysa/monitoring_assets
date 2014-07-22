<?php 
	include "kon.inc.php";
	
           
	$id_assets = $_POST['id_assets_standard'];
    $nama_assets= $_POST['nama_assets_standard'];
	$jumlah_assets= $_POST['jumlah_assets_standard'];
	$id_assets_standard = $_POST['id_assets_standard'];
	
        
        $sql = "INSERT INTO assets (id_assets,nama_assets,jumlah_assets,id_assets_standard) 
                VALUES ('$id_assets','$nama_assets','$jumlah_assets','$id_assets_standard')";
	
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
