<!DOCTYPE html>
<html>
    <head>
    <style>
        body{
            background-color :cadetblue;
            font-family: italic;
            font-size:25px;}
            .form {
            padding-top:70px;
            background-color:white;
            height:300px;
            width: 500px;
            border-radius: 8px;
            margin-top:100px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);
          }
   </style>
   </head>
   <body>
    <center>
    <div class="form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
   

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="uname" required><br>

        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="psw" required><br><br>
        <a href="homepage.php">
        <button type="submit">Login</button>
        </a>
            <button type="button" class="cancelbtn">Cancel</button>
        

        <br><br><label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
    </div>
    <div class="container">
        <span class="psw"><br><a href="#">Forgot password?</a></span>
    </div>
</form>
        </div>
</center>
<?php
$host = "localhost"; // Database host
$user = "root"; // Database username
$password = ""; // Database password
$dbname = "hr"; // Database name

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Initialize variables to store form data
$username = $password = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty($_POST["uname"])) {
        echo "Username is required";
    } else {
        $username = test_input($_POST["uname"]);
        // Check if the username is already in use
        $sql = "SELECT * FROM personal WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Redirect to mp1.php if data already exists
            header('Location: homepage.php');
            exit;
        }
    }

    // Validate password
    if (empty($_POST["psw"])) {
        echo "Password is required";
    } else {
        $password = test_input($_POST["psw"]);
    }

    // Insert data into database if validation passes
    if (!empty($username) && !empty($password)) {
        $sql = "INSERT INTO personal (username, password) VALUES ('$username', '$password')";
        if (mysqli_query($conn, $sql)) {
            // Redirect to mp1.php after inserting data
            echo("The datas are inserted in the database");
            header('Location: homepage.php');
            exit;
        } else {
            echo "Error inserting data: " . mysqli_error($conn);
        }
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Close database connection
mysqli_close($conn);
?>
</body>
    </html>