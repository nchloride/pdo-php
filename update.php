<?php
	require("database.php");
	$database = new Database();
	$updateId = $_POST['id'];
	$updateName = $_POST['name'];
	$updateAddress = $_POST['address'];
	if($updateId){
		try{		
			$updateQuery = "UPDATE records set name= '".$updateName."', address= '".$updateAddress."' where id = '".$updateId."'; ";
			$stmt = $database->connection()->prepare($updateQuery);
			$stmt->execute();
			if($stmt){
				header("location: table.php");
			}
			else{
				echo "failed";
			}
		}
		catch(Exception $e){
			echo $e;
		}
	}
?>