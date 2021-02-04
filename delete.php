<?php
	require('database.php');

	$database = new Database();
	$id = $_GET['id'];

	if(isset($id)){
		try{
			$deleteQuery = "DELETE from records where id = '".$id."'";
			$stmt = $database->connection()->prepare($deleteQuery);
			$stmt->execute();
			if($stmt){
				echo 'Data deleted!';
				header("LOCATION: table.php");
			}
			else{
				echo "FAILED";
			}
		}
		catch(Exception $e){
			echo $e;
		}
	}

	
?>