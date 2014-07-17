<?php

try
{
	//Open database connection
	$con = mysql_connect("localhost","root","admin");
	mysql_select_db("mon_assets", $con);

	//Getting records (listAction)
	if($_GET["action"] == "list")
	{
		//Get records from database
		$result = mysql_query("SELECT * FROM users;");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	
	// Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		// Update record in database
		$result = mysql_query("UPDATE users SET nama_users= '".$_POST["nama_users"]."' ,	
                                                jenis_users= '".$_POST["jenis_users"]."' ,                                                                                               pass_users=  '".$_POST["pass_users"]."'  
                                                WHERE id_users = '".$_POST["id_users"]."' ;");

		// Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
    
	// Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		// Delete from database
        $result = mysql_query("DELETE FROM users WHERE id_users = '".$_POST["id_users"]."' ;");

		// Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	print json_encode($jTableResult);
}
	
?>