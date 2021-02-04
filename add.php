<?php
	require("database.php");
	// $name = $_POST['name'];
	// echo $name;
	$database = new Database();	

	$name = $_POST['name'];
	$address = $_POST['address'];
	if(isset($name)){
		try{
			$database->connection()->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$addQuery = "INSERT INTO records (name,address) VALUES ('".$name."','".$address."')";
			$stmt = $database->connection()->prepare($addQuery);
			$stmt->execute();
			if($stmt){
				echo "Data added";
				header("Location: table.php");
			}
			else{
				echo "failed";
			}
		}
		catch(Exception $e){
			echo "error";
		}
	}
  ?>