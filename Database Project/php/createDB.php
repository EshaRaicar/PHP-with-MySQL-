<!doctype html>
<html>

<head>
	<title>Create a Database</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>

<body>
	<?php
	$servername = "localhost";
	$databasename = "EshaDB";
	$username = "root";
	$password = "";


	try {
		$conn = new PDO("mysql:host=$servername", $username, $password);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>";
	}

	try {
		$sql = "CREATE DATABASE EshaDB;";  

		$conn->exec($sql);
		echo "<p style='color:green'>Database Created Successfully</p>";
	} catch (PDOException $err) {
		echo $sql . "<p style='color:red'>" . $err->getMessage() . "</p>";
	}

	
	unset($conn);

	echo "<a href='../index.html'>Back to the homepage</a>";

	?>

</body>

</html>