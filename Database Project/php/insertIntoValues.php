<!doctype html>
<html>
<head>
	<title>Insert Data Into a Database</title>
	<link rel="stylesheet" href="../css/style.css" />
</head>
<body>

<?php
$servername ="localhost";
$dbname = "EshaDB";
$username = "root";
$password = "";


try {
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}


try {
	$sql="INSERT INTO Customer_Details (Customer_ID, Customer_Name, Type_Of_Pass, Vehical_ID) VALUES (:Customer_ID, :Customer_Name, :Type_Of_Pass, :Vehical_ID);";   
	$stmnt = $conn->prepare($sql);    
	$stmnt->bindParam(':Customer_ID', $_POST['Customer_ID']);   
	$stmnt->bindParam(':Customer_Name', $_POST['Customer_Name']);   
	$stmnt->bindParam(':Type_Of_Pass', $_POST['Type_Of_Pass']);
	$stmnt->bindParam(':Vehical_ID', $_POST['Vehical_ID']);

	$stmnt->execute();

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Data Inserted Into Table Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
}

unset($conn);

echo "<a href='../insertData.html'>Insert More Values</a> <br />";

echo "<a href='../index.html'>Back to the homepage</a>";

?>

</body>
</html>