<!DOCTYPE html>
<head>
  <title>Salary Insertion</title>
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
    $id = $name = $dept = $salary = $acc = "";
    $id_err = $name_err = $dept_err = $salary_err = $acc_err ="";
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
        // Validate dept
        if (empty(trim($_POST["dept"]))) {
          $dept_err = "*Please enter the department.";
        } else {
          $dept = trim($_POST["dept"]);
        }
      
        // Validate salary
        if (empty(trim($_POST["salary"]))) {
          $salary_err = "*Please enter the salary.";
        } else {
          $salary = trim($_POST["salary"]);
        }

        
        // Validate account
        if (empty(trim($_POST["acc"]))) {
          $acc_err = "*Please enter the account number.";
        } else {
          $acc = trim($_POST["acc"]);
        }

        if (empty($id_err) && empty($name_err) && empty($dept_err) && empty($salary_err) && empty($acc_err)) {
        
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
            $stmt = $conn->prepare("INSERT INTO salary (id, name, dept, salary, acc) VALUES (?, ?, ?, ?, ?,)");
            $stmt->bind_param("sssss", $id, $name, $dept, $salary, $acc);
        
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
      <center><h1 class="title">SALARY DETAILS</h1></center>

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
        <input type="text" class="input" name="dept" placeholder="a">
        <label for="" class="label">Department:</label>   
      </div>
      <p class="error"> <?php echo $dept_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="salary" placeholder="a">
        <label for="" class="label">Salary:</label>   
      </div>
      <p class="error"> <?php echo $salary_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="acc" placeholder="a">
        <label for="" class="label">Account Number:</label>
      </div>
      <p class="error"> <?php echo $acc_err;?></p>

      <center><input type="submit" class="submitBtn" value="Submit`"></center>
    </form>
    </div>
  </div>  
</body>
</html>