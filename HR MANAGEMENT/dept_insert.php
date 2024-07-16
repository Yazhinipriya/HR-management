<!DOCTYPE html>
<head>
  <title>Department Insertion</title>
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
    //np-no.of projects
    //ne-no.of employees
    $id = $name = $desc = $np = $ne = "";
    $id_err = $name_err = $desc_err = $np_err = $ne_err ="";
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
        // Validate desc
        if (empty(trim($_POST["desc"]))) {
          $desc_err = "*Please enter the description about the dept.";
        } else {
          $desc = trim($_POST["desc"]);
        }
      
        // Validate no_of_projects
        if (empty(trim($_POST["np"]))) {
          $np_err = "*Please enter No.of currently active projects.";
        } else {
          $np = trim($_POST["np"]);
        }

        
        // Validate no_of_employees
        if (empty(trim($_POST["ne"]))) {
          $ne_err = "*Please enter No. of employees in the dept.";
        } else {
          $ne = trim($_POST["ne"]);
        }

        if (empty($id_err) && empty($name_err) && empty($desc_err) && empty($np_err) && empty($ne_err)) {
        
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
            $stmt = $conn->prepare("INSERT INTO department (id, name, desc, no_of_projects, no_of_employees) VALUES (?, ?, ?, ?, ?,)");
            $stmt->bind_param("sssssss", $id, $name, $desc, $np, $ne);
        
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
      <center><h1 class="title">DEPARTMENT DETAILS</h1></center>

      <div class="inputContainer">
        <input type="text" class="input" name="id" placeholder="a">
        <label for="" class="label">Department ID:</label>   
      </div>
      <p class="error"> <?php echo $id_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="name" placeholder="a">
        <label for="" class="label">Department Name:</label> 
      </div>
      <p class="error"> <?php echo $name_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="desc" placeholder="a">
        <label for="" class="label">Department Description:</label>   
      </div>
      <p class="error"> <?php echo $desc_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="np" placeholder="a">
        <label for="" class="label">Number of active projects:</label>   
      </div>
      <p class="error"> <?php echo $np_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="ne" placeholder="a">
        <label for="" class="label">Number of employees present:</label>
      </div>
      <p class="error"> <?php echo $ne_err;?></p>

      <center><input type="submit" class="submitBtn" value="Submit`"></center>
    </form>
    </div>
  </div>  
</body>
</html>
