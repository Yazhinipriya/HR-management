<!DOCTYPE html>
<html>
    <head>
    <style>
        body{
            background: linear-gradient(115deg, #56d8e4 10%, #9f01ea 90%);
            font-family: "Poppins", sans-serif;
            box-sizing: border-box;
            font-size:25px;
            height: 78vh;
            width: 98%;
            }
            .form {
            padding-top:40px;
            background-color:white;
            height:300px;
            width: 40%;
            border-radius: 8px;
            margin-top:100px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);
            padding-bottom: 60px;
          }
          .error 
        {
            color: #FF0000;
            font-size: 10px;
            text-align: left;
            padding-left: 25px;
        }
          .inputContainer {
         position: relative;
         height: 45px;
         width: 90%;
         margin-bottom: 17px;
         }
          .button{
            width: 50%;
            height: 100%;
            font-size: 20px;
            background-color:#9f01ea;
            border: none;
            color: white;
            text-align: center;
            padding: 10px 25px;
            display: inline-block;
            border-radius: 12px;
          }
          .button span {
        cursor: pointer;
        display: inline-block;
        position: relative;
        transition: 0.5s;
        }

        .button span:after {
        content: '\00bb';
        position: absolute;
        opacity: 0;
        top: 0;
        right: -20px;
        transition: 0.5s;
        }

        .button:hover span {
        padding-right: 25px;
        }

        .button:hover span:after {
        opacity: 1;
        right: 0;
        }
        .label {
        position: absolute;
        top: 15px;
        left: 15px;
        padding: 0 4px;
        background-color: white;
        color: #DADCE0;
        font-size: 16px;
        transition: 0.5s;
        z-index: 0;
        }

        ::placeholder {
        color: transparent;
        }
        .input {
        position: absolute;
        top: 0px;
        left: 0px;
        height: 100%;
        width: 90%;
        border: 1px solid #DADCE0;
        border-radius: 7px;
        font-size: 16px;
        padding: 0 20px;
        outline: none;
        background: none;
        z-index: 1;
        }
 .input:focus + .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
  color:grey;
}

.input:not(:placeholder-shown)+ .label {
  top: -7px;
  left: 3px;
  z-index: 10;
  font-size: 14px;
  font-weight: 600;
}

.input:focus {
  border: 2px solid grey;
}
        </style>
   </head>
   <body>
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
$uname_err=$psw_err="";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["uname"]))) {
        $uname_err= "*Username is required";
    } else {
        $username = test_input($_POST["uname"]);
        $username = $_POST["uname"];
        $password = $_POST["psw"];
        // Check if the username is already in use
        $stmt = $conn->prepare("SELECT * FROM personal WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            // Redirect to mp1.php if data already exists
            header('Location: homepage.php');
            exit;
        }
    }

    // Validate password
    if (empty(trim($_POST["psw"]))) {
        $psw_err= "*Password is required";
    } else {
        $password = test_input($_POST["psw"]);
    }

    // Insert data into database if validation passes
    if (!empty($username) && !empty($password)) {
        echo "<script>alert('Invalid username or password');</script>";
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
    <center>
    <div class="form">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div style="font-family: 'Poppins', sans-serif;text-align: center"><b>LOGIN FORM</b></div><br>
    <div class="inputContainer">
        <input type="text" class="input" name="uname" placeholder="Enter Username">
        <label for="" class="label">Username:</label> 
        </div>
        <p class="error"> <?php echo $uname_err;?></p>
        <div class="inputContainer">
        <input type="text" class="input" name="psw" placeholder="Enter Password">
        <label for="" class="label">Password:</label> 
        </div>
        <p class="error"> <?php echo $psw_err;?></p>
        <a href="homepage.php">
        <button class="button" type="submit"><span><b>LOGIN</b></span></button>
        </a>
    <div class="container">
        <span style=" font-size: 20px"><br><a href="#">Forgot password?</a></span>
    </div>
</form>
</div>
    </center>
</body>
    </html>