<?php 
	include "kon.inc.php";
	
           
	$id_agreement = $_POST['id_agreement'];
    $deed_no = $_POST['deed_no'];
	$date_agreements = $_POST['date_agreements'];
	$remarks = $_POST['remarks'];
    $fee_remarks = $_POST['fee_remarks'];
	
        
        $sql = "INSERT INTO agreements (id_agreement,deed_no,date_agreements,remarks,fee_remarks) 
                VALUES ('$id_agreement','$deed_no','$date_agreements','$remarks',$fee_remarks)";
	
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
