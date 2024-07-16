<!Doctype html>
<html>
    <head>
        <title>Employee Display</title>
        <link rel="stylesheet" type="text/css" href="input.css">
        <style>         
            .error 
                {
                    color: #FF0000;
                }     
            
            table,th, td{
                margin :200px;
                border: 2px solid black;
                text-align: center;
            }
            tr:hover
             {background-color: white;
             }
             th{
             background-color: navy;
             color: white;
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
$sql = "SELECT * FROM employee";

// Execute the SQL statement
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {

    // Output the table headers
    echo "<center>";
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Date Of Birth</th>";
    echo "<th>Gender</th>";
    echo "<th>Email</th>";
    echo "<th>Address</th>";
    echo "<th>Phone</th>";
    echo "</tr>";

    // Output each row of data
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["date_of_birth"] . "</td>";
        echo "<td>" . $row["gender"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["mobile"] . "</td>";
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