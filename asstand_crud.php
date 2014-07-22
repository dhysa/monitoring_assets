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
		$result = mysql_query("SELECT 
                                  assets_standard.id_assets_standard,
                                  assets_standard.nama_assets_standard,
                                  assets_standard.jumlah_assets_standard,
                                  tier.`nama_tier` 
                                FROM
                                   assets_standard
                                  LEFT JOIN tier 
                                    ON assets_standard.`id_tier` = tier.id_tier");

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
		$result = mysql_query("UPDATE users SET nama_assets_standard= '".$_POST["nama_assets_standard"]."' ,	
                                                jumlah_assets_standard= ".$_POST["jumlah_assets_standard"]." ,                                                                                               
												nama_tier=  '".$_POST["nama_tier"]."'  
                                                WHERE id_assets_stanadard = '".$_POST["id_assets_standard"]."' ;");

		// Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
    
	// Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		// Delete from database
        $result = mysql_query("DELETE FROM assets_standard WHERE id_assets_standard = '".$_POST["id_assets_standard"]."' ;");

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