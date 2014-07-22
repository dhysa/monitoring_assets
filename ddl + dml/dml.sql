
/*  Menampilkan  nama assets, jumlah assets, nama assets standard, jumlah assets standard, nama tier dalam satu table*/

 SELECT 
  assets.nama_assets,
  assets.jumlah_assets,
  assets_standard.nama_assets_standard,
  assets_standard.jumlah_assets_standard,
  tier.`nama_tier` 
FROM
  assets 
  LEFT JOIN assets_standard 
    ON assets.id_assets = assets_standard.id_assets_standard 
  LEFT JOIN tier 
    ON assets_standard.`id_tier` = tier.id_tier ;


	SELECT 
  assets_standard.nama_assets_standard,
  assets_standard.jumlah_assets_standard,
  tier.`nama_tier` 
FROM
   assets_standard
  LEFT JOIN tier 
    ON assets_standard.`id_tier` = tier.id_tier ;
	
	
	
	
	
	
	
	
		// Updating a record (updateAction)
	else if($_GET["action"] == "update")
	{
		// Update record in database
		$result = mysql_query("UPDATE users SET nama_assets_standard= '".$_POST["nama_assets_standard"]."' ,	
                                                jumlah_assets_standard= ".$_POST["jumlah_assets_standard"]." ,                                                                                               
												id_tier=  '".$_POST["id_tier"]."'  
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
        $result = mysql_query("DELETE FROM users WHERE id_assets_standard = '".$_POST["id_assets_standard"]."' ;");

		// Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	//Close database connection
	mysql_close($con);
 