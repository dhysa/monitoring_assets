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
                                 tier.`nama_tier`,
                                 assets.nama_assets ,
                                 assets.jumlah_assets ,
                                 assets_standard.nama_assets_standard,
                                 assets_standard.jumlah_assets_standard
                                 
                                FROM
                                 assets 
                                 LEFT JOIN assets_standard 
                                   ON assets.id_assets = assets_standard.id_assets_standard 
                                 LEFT JOIN tier 
                                   ON assets_standard.`id_tier` = tier.id_tier   ");
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
//            $row['A'];
//            $row['B'];
//            $row['C'];
//            $row['D'];
//            $row['E'];
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
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