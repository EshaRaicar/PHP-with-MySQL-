<!doctype html>
<html>

<head>
    <title>Display Records of a table</title>
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>

    <?php
    $servername = "localhost";
    $dbname = "EshaDB";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "<p style='color:green'>Connection Was Successful</p>";
    } catch (PDOException $err) {
        echo "<p style='color:red'> Connection Failed: " . $err . getMessage() . "</p>\r\n";
    }

    try {
        $sql = "SELECT  Customer_ID,Customer_Name,Type_Of_Pass,Vehical_ID FROM Customer_Details";
        $stmnt = $conn->prepare($sql);    

        $stmnt->execute();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $row = $stmnt->fetch();  // fetches the first row of the table
        if ($row) {      // if there is any result from the query
            echo '<table>';
            echo '<tr> <th>CustomerID</th> <th>CustomerName</th> <th>TypeOfPass</th> <th>VehicalID</th>  </tr>';
            do {
                echo '<tr><td>' . $row['Customer_ID'] . '</td><td>' . $row['Customer_Name'] . '</td><td>' . $row['Type_Of_Pass'] . '</td><td>' . $row['Vehical_ID']  ;
            } while ($row = $stmnt->fetch());     
            echo '</table>';
        } else {
            echo "<p> No Record Found!</p>";
        }
    } catch (PDOException $err) {
        echo "<p style='color:red'>Record Delete Failed: " . $err->getMessage() . "</p>\r\n";
    }
   
    unset($conn);

    echo "<a href='../index.html'>Back to the homepage</a>";

    ?>
</body>

</html>