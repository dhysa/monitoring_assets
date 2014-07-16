<?php 
	include "kon.inc.php";
	
	$nama_tier = $_POST['nama_tier'];
    
        $queryInput = "INSERT INTO tier (nama_tier) VALUES ('$nama_tier')";
	
        $masuk = mysql_query($queryInput);
	
		if ($masuk) {
			        
			echo "<script lang=javascript>
	 		window.alert('Successed!');
	 		window.location.href='tier.php'
	 		</script>";
            
			}
    	
		
		else {
				echo "<script lang=javascript>
	 		window.alert('Failed,check your input!');
	 		window.back()
	 		</script>";
		}
?>
