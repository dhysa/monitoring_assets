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
                                    rental.`id_rental`,
                                    rental.`jenis_rental`,
                                    rental.`size_rental`,
                                    rental.`note_rental`,
                                    agreements.`deed_no`,
                                    agreements.`date_agreements`,
                                    agreements.`fee_remarks`,
                                    agreements.`remarks`
                                    FROM
                                      rental 
                                      LEFT JOIN agreements
                                        ON rental.`id_agreement` = agreements.`id_agreement` ;");

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
//	else if($_GET["action"] == "update")
//	{
//		// Update record in database
//		$result = mysql_query("UPDATE users SET nama_assets_standard= '".$_POST["nama_assets_standard"]."' ,	
//                                                jumlah_assets_standard= ".$_POST["jumlah_assets_standard"]." ,                                                                                               
//												nama_tier=  '".$_POST["nama_tier"]."'  
//                                                WHERE id_assets_stanadard = '".$_POST["id_assets_standard"]."' ;");

		// Return result to jTable
//		$jTableResult = array();
//		$jTableResult['Result'] = "OK";
//		print json_encode($jTableResult);
//	}
    
	// Deleting a record (deleteAction)
	else if($_GET["action"] == "delete")
	{
		// Delete from database
        $result = mysql_query("DELETE FROM rental WHERE id_rental = '".$_POST["id_rental"]."' ;");

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