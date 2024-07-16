<!DOCTYPE html>
<html>
    <head>
        <title>Project Deletion</title>
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
        </style>

    </head>
    <body>

    <?php

    // Define variables and initialize with empty values
    $id = $name = $budget = $duration = $company = $desc= "";
    $id_err = $name_err = $budget_err = $duration_err = $company_err = $desc_err = "";

    // Check if the form was submitted
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
    
    
      // If there are no errors, insert the employee details into the database
      if (empty($id_err) && empty($name_err)) {
        
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
    
        $sql = "DELETE FROM project WHERE ID='$id'";

                if ($conn->query($sql) === TRUE) {
                // Redirect to a success page
                    header("location: delete.php");
                    exit();
                } 

                $conn->close();
    
        // Redirect to a success page
        // header("location: success.php");
        // exit();
      }
    }
    
    ?>  

<div class="signupFrm">
    <div class="wrapper">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="form">
      <center><h1 class="title">DELETE RECORDS</h1></center>

      <div class="inputContainer">
        <input type="text" class="input" name="id" placeholder="a">
        <label for="" class="label">Project ID:</label>  
      </div>
      <p  class="error"> <?php echo $id_err;?></p><br> 
      

      <div class="inputContainer">
        <input type="text" class="input" name="name" placeholder="a">
        <label for="" class="label">Project Name:</label>   
      </div>
      <p  class="error"> <?php echo $name_err;?></p><br> 

      <center><input type="submit" class="submitBtn" value="Delete`"></center>
    </form>
    </div>
  </div>
</body>
</html>