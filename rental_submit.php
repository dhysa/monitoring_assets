<?php 
	include "kon.inc.php";
	
           
	$id_rental = $_POST['id_rental'];
    $jenis_rental= $_POST['jenis_rental'];
	$size_rental= $_POST['size_rental'];
	$id_agreement = $_POST['id_agreement'];
    $note_rental = $_POST['note_rental'];
	
        
        $sql = "INSERT INTO rental (id_rental,jenis_rental,size_rental,id_agreement,note_rental) 
                VALUES ('$id_rental','$jenis_rental','$size_rental','$id_agreement','$note_rental')";
	
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
