<!DOCTYPE html>
<head>
  <title>Employee Insertion</title>
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
    $id = $name = $dob = $gender = $email = $address = $phone = "";
    $id_err = $name_err = $dob_err = $gender_err = $email_err = $address_err = $phone_err = "";

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
    
      // Validate DOB
      if (empty(trim($_POST["dob"]))) {
        $dob_err = "*Please enter a date of birth.";
      } else {
        $dob = trim($_POST["dob"]);
      }
    
      // Validate Gender
      if (empty(trim($_POST["gender"]))) {
        $gender_err = "*Please enter a gender.";
      } else {
        $gender = trim($_POST["gender"]);
      }
    
      // Validate Email
      if (empty(trim($_POST["email"]))) {
        $email_err = "*Please enter an email address.";
      } elseif (!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
        $email_err = "*Invalid email address format.";
      } else {
        $email = trim($_POST["email"]);
      }
    
      // Validate Address
      if (empty(trim($_POST["address"]))) {
        $address_err = "*Please enter an address.";
      } else {
        $address = trim($_POST["address"]);
      }
    
      // Validate Phone
      if (empty(trim($_POST["phone"]))) {
        $phone_err = "*Please enter a phone number.";
      } else {
        $phone = trim($_POST["phone"]);
        if (!preg_match("/^[1-9]\d{9}$/",$phone)) {
          $phone_err = "*Please enter a valid number!";
          }
      }
    
      // If there are no errors, insert the employee details into the database
      if (empty($id_err) && empty($name_err) && empty($dob_err) && empty($gender_err) && empty($email_err) && empty($address_err) && empty($phone_err)) {
        
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
        $stmt = $conn->prepare("INSERT INTO employee (id, name, date_of_birth, gender, email, address, mobile) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $id, $name, $dob, $gender, $email, $address, $phone);
    
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
      <center><h1 class="title">EMPLOYEE DETAILS</h1></center>

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
        <input type="text" class="input" name="dob" placeholder="a">
        <label for="" class="label">DOB:</label>   
      </div>
      <p class="error"> <?php echo $dob_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="gender" placeholder="a">
        <label for="gender" class="label">Gender:</label>   
      </div>
      <p class="error"> <?php echo $gender_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="email" placeholder="a">
        <label for="" class="label">Email:</label>
      </div>
      <p class="error"> <?php echo $email_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="address" placeholder="a">
        <label for="" class="label">Address:</label>  
      </div>
      <p class="error"> <?php echo $address_err;?></p>

      <div class="inputContainer">
        <input type="text" class="input" name="phone" placeholder="a">
        <label for="" class="label">Phone No:</label>   
      </div>
      <p class="error"> <?php echo $phone_err;?></p>

      <center><input type="submit" class="submitBtn" value="Submit`"></center>
    </form>
    </div>
  </div>

    
  
</body>
</html>