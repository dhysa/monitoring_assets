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
		$result = mysql_query("SELECT * FROM agreements");

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
		$result = mysql_query("UPDATE users SET deed_no= '".$_POST["deed_no"]."' ,	
                                                date_agreement= ".$_POST["date_agreement"]." , 
                                                remarks= ".$_POST["remarks"]." , 
												fee_remarks=  '".$_POST["fee_remarks"]."'  
                                                WHERE id_agreement = '".$_POST["id_agreement"]."' ;");

		// Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
    
	// Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		// Delete from database
        $result = mysql_query("DELETE FROM agreements WHERE id_agreement = '".$_POST["id_agreement"]."' ;");

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