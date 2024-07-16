<!DOCTYPE html>
<head>
  <title>Project Insertion</title>
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
    $id = $name = $budget = $duration = $company = $desci= "";
    $id_err = $name_err = $budget_err = $duration_err = $company_err = $desci_err = "";
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
        // Validate Budget
        if (empty(trim($_POST["budget"]))) {
          $budget_err = "*Please enter a budget.";
        } else {
          $budget = trim($_POST["budget"]);
        }
      
        // Validate duration
        if (empty(trim($_POST["duration"]))) {
          $duration_err = "*Please enter a duration(in weeks).";
        } else {
          $duration = trim($_POST["duration"]);
        }

        // Validate Company
        if (empty(trim($_POST["company"]))) {
            $company_err = "*Please enter a Company name.";
        } else {
            $company= trim($_POST["company"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$company)) {      
            $company_err = "*Only letters and white space allowed";
            }
        }
      
        // Validate Description
        if (empty(trim($_POST["desci"]))) {
          $desci_err = "*Please enter a description.";
        } else {
          $desci = trim($_POST["desci"]);
        }

        if (empty($id_err) && empty($name_err) && empty($budget_err) && empty($duration_err) && empty($company_err) && empty($desci_err)) {
        
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
            $stmt = $conn->prepare("INSERT INTO project(id, name, budget, duration, company, descri) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssss", $id, $name, $budget, $duration, $company, $descri);
        
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
      <center><h1 class="title">PROJECT DETAILS</h1></center>

      <div class="inputContainer">
        <input type="text" class="input" name="id" placeholder="a">
        <label for="" class="label">Project ID:</label>   
      </div>
      <p class="error"> <?php echo $id_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="name" placeholder="a">
        <label for="" class="label">Project Name:</label> 
      </div>
      <p class="error"> <?php echo $name_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="budget" placeholder="a">
        <label for="" class="label">Budget:</label>   
      </div>
      <p class="error"> <?php echo $budget_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="duration" placeholder="a">
        <label for="" class="label">Duration:</label>   
      </div>
      <p class="error"> <?php echo $duration_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="company" placeholder="a">
        <label for="" class="label">Company Name:</label>
      </div>
      <p class="error"> <?php echo $company_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="desci" placeholder="a">
        <label for="" class="label">Description:</label>  
      </div>
      <p class="error"> <?php echo $desci_err;?></p>

      <center><input type="submit" class="submitBtn" value="Submit`"></center>
    </form>
    </div>
  </div>  
</body>
</html>