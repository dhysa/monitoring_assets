<?php

    session_start();
    include ('kon.inc.php');
    $con=mysqli_connect(host, user, pass, dbname);
    // Check connection
    if (mysqli_connect_errno())
    {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
        $id_users = $_POST['id_users'];
        $jenis_users=$_POST['jenis_users'];
        $nama_users=$_POST['nama_users'];	
        $pass_users = $_POST['pass_users'];

    $sql="INSERT INTO users (id_users, jenis_users, nama_users, pass_users) 
           VALUES ('$id_users','$jenis_users','$nama_users','$pass_users')";
    
    if (!mysqli_query($con,$sql))
      {
      die('Error: ' . mysqli_error($con));
      }

    /*=======Validasi Password=======*/
    function validPassword($pass_users) {
        //Empty error array for the errors if any
	$error = array();
		// Password Strength check
		if( strlen($pass_users) < 8 ) {
			$error[] = 'Password need to have at least 8 characters!';
		}
 
		if( strlen($pass_users) > 8 ) {
			$error[] = 'Password needs to have less than 8 characters!';
		}
 
		if( !preg_match("#[0-9]+#", $pass_users) ) {
			$error[] = 'Password must include at least one number!';
		}
 
 
		if( !preg_match("#[a-z]+#", $pass_users) ) {
			$error[] = 'Password must include at least one letter!';
		}
 
 
		if( !preg_match("#[A-Z]+#", $pass_users) ) {
			$error[] = 'Password must include at least one uppercase letter!';
		}
 
				// Make the array readable
				// $errors=implode('<br />', $error);
				return $errors;
        
        
    echo "<script type='text/javascript'>alert('You are registered! Please login to confirm');</script>";
    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';

    mysqli_close($con);

?>