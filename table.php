<!DOCTYPE html>
<html>
<head>
	<title>CRUD</title>
</head>
<body>
	<table>
		<thead>
			<th>Name</th>
			<th>Address</th>
			<th>Process</th>
		</thead>
		<tbody>
		<?php
			require('database.php');

			$database = new Database();
			$selectQuery = "SELECT * from records";

			$stmt = $database->connection()->prepare($selectQuery);
			$stmt->execute();

			

			if($stmt->rowCount()){
				while($row= $stmt->fetch(PDO::FETCH_ASSOC)){
			
		?>
			<tr>
				<td><?php echo $row['name']; ?> </td>
				<td><?php echo $row['address']; ?> </td>
				<td>
					<a href=<?php echo "delete.php?id=". $row['id']; ?>> DELETE </a>
					<a href=<?php echo "table.php?idUpdate=".$row['id']."&name=".$row['name']."&address=".$row['address']; ?>> UPDATE </a>
				</td>
			</tr>
		<?php
				}
			}
		?>
		</tbody>
	</table>
	<?php
		if(isset($_GET['idUpdate'])){

	?>
		<form method="POST" action="update.php" ">
			<input readonly name="id" value=<?php echo $_GET['idUpdate'];?> >
			<input type="text" name="name" value=<?php echo $_GET['name'];?>>
			<input type="text"  name="address" value=<?php echo $_GET['address'];?>>
			<input type="submit">
		</form>
	<?php
		}
	?>
	<?php
		 if(!isset($_GET['idUpdate'])){
	?>
		<form method="POST" action="add.php" ">
			<input type="text"  placeholder="Enter your name"  name="name">
			<input type="text" placeholder="Enter your address" name="address">
			<input type="submit">
		</form>
	<?php
		}
	?>

	<style >
		form{
			display: flex;
			flex-direction: column;
		}
	</style>
</body>
</html>