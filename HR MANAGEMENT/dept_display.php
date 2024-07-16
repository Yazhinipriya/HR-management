<!Doctype html>
<html>
    <head>
        <title>Department Display</title>
        <link rel="stylesheet" type="text/css" href="input.css">
        <style>         
            .error 
                {
                    color: #FF0000;
                }     
            .signupFrm {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            }
            .form {
            background-color:white;
            height:500px;
            width: 500px;
            border-radius: 8px;
            padding: 20px 40px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);
            }
            table{
                margin-top:200px;
                border: 4px solid black;
            }
        </style>

    </head>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hr";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Prepare the SQL statement to select all rows from the table
$sql = "SELECT * FROM department";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {

    // Output the table headers
    echo "<center>";
    echo "<table>";
    echo "<tr>";
    echo "<th>Dept ID</th>";
    echo "<th>Dept Name</th>";
    echo "<th>Dept Description</th>";
    echo "<th>No of active projects</th>";
    echo "<th>No of employees</th>";
    echo "</tr>";

    // Output each row of data
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["desc"] . "</td>";
        echo "<td>" . $row["np"] . "</td>";
        echo "<td>" . $row["ne"] . "</td>";
        echo "</tr>";
    }

    // Output the table closing tag
    echo "</table>";
    echo "</center>";

} else {
    echo "No results found";
}

// Close the database connection
mysqli_close($conn);
?>

</body>
</html>