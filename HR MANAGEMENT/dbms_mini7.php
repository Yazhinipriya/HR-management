<!DOCTYPE html>
<head>
  <title>Attendance Insertion</title>
  <link rel="stylesheet" type="text/css" href="input.css">
  <style>
    .error 
        {
            color: #FF0000;
        }
        .form {
            background-color:white;
            height:900px;
            width: 500px;
            border-radius: 8px;
            padding: 20px 40px;
            box-shadow: 0 10px 25px rgba(71, 128, 233, 0.2);
          }
  </style>  
</head>
<body>
  <?php
    // Define variables and initialize with empty values
    $id = $name = $dp = $da = $status = "";
    $id_err = $name_err = $dp_err = $da_err = $status_err ="";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {    
        // Validate ID
        if (empty(trim($_POST["id"]))) {
          $id_err = "*Please enter an ID.";
        } else {
          $id = trim($_POST["id"]);
        }      
        // Validate Name
        if (empty(trim($_POST["name"]))) {
          $name_err = "*Please enter a name.";
        } else {
          $name = trim($_POST["name"]);
          if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {      
            $name_err = "*Only letters and white space allowed";
            }
        }
        // Validate days_present
        if (empty(trim($_POST["dp"]))) {
          $dp_err = "*Please enter the number of days present.";
        } else {
          $dp = trim($_POST["dp"]);
        }
      
        // Validate days_absent
        if (empty(trim($_POST["da"]))) {
          $da_err = "*Please enter the number of days absent.";
        } else {
          $da = trim($_POST["da"]);
        }

        
        // Validate status
        if (empty(trim($_POST["status"]))) {
          $status_err = "*Please enter the status.";
        } else {
          $status = trim($_POST["status"]);
        }

        if (empty($id_err) && empty($name_err) && empty($dp_err) && empty($da_err) && empty($status_err)) {
        
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "hr";
    
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
        
            // Prepare and bind the SQL statement
            $stmt = $conn->prepare("INSERT INTO attendance (id, name1, dp, da, status1) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $id, $name, $dp, $da, $status);
        
            // Execute the SQL statement and close the database connection
            $stmt->execute();
            $stmt->close();
            $conn->close();
        
            // Redirect to a success page
            header("location: success.php");
            exit();
          }
        }
        
        ?>

    <div class="signupFrm">
    <div class="wrapper">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form">
      <center><h1 class="title">ATTENDANCE DETAILS</h1></center>

      <div class="inputContainer">
        <input type="text" class="input" name="id" placeholder="a">
        <label for="" class="label">ID:</label>   
      </div>
      <p class="error"> <?php echo $id_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="name" placeholder="a">
        <label for="" class="label">Name:</label> 
      </div>
      <p class="error"> <?php echo $name_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="dp" placeholder="a">
        <label for="" class="label">Number of days present:</label>   
      </div>
      <p class="error"> <?php echo $dp_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="da" placeholder="a">
        <label for="" class="label">Number of days absent:</label>   
      </div>
      <p class="error"> <?php echo $da_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="status" placeholder="a">
        <label for="" class="label">Status:</label>
      </div>
      <p class="error"> <?php echo $status_err;?></p>

      <center><input type="submit" class="submitBtn" value="Submit`"></center>
    </form>
    </div>
  </div>  
</body>
</html>