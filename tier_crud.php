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
		$result = mysql_query("SELECT * FROM tier;");
		
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
	//Creating a new record (createAction)
	else if($_GET["action"] == "create")
	
	{
		
		$result = mysql_query("INSERT INTO tier(nama_tier) VALUES('" . $_POST["nama_tier"] . "', now());");
		//Insert record into database
		
		//Get last inserted record (to return to jTable)
		$result = mysql_query("SELECT * FROM tier WHERE id_tier = LAST_INSERT_ID() ;");
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
	//Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		//Update record in database
		$result = mysql_query("UPDATE tier SET nama_tier= '" . $_POST["nama_tier"] ."' WHERE id_tier = " . $_POST["id_tier"] .  ";");

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
	//Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		//Delete from database
		$result = mysql_query("DELETE FROM tier WHERE id_tier = " . $_POST["id_tier"] . ";");

		//Return result to jTable
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