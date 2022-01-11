<?php
session_start();
$insert = false;
if(isset($_POST['name'])){
  error_reporting(0);
  $server = "localhost";
  $username = "root";
  $password = "";

  $con = mysqli_connect($server, $username, $password);

  if(!$con){
      die("connection to this database failed due to" . mysqli_connect_error());
  }
  // echo "Success connecting to the database";

  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $desc = $_POST['desc'];
  $sql = "INSERT INTO `tribzzz`.`registration_form` (`Name`, `Age`, `Gender`, `Email`, `Phone`, `Description`, `Date`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
  //echo $sql;

  if($con->query($sql) == true){
      //echo "Successfully inserted";
      $insert = true;
  }
  else{
    echo "ERROR: $sql <br> $con->error";
  }

  $con->close(); 
  
  header("location: landing_page_registration.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="registration.css">
</head>
<body>
    <div class="container">
        <h2>Welcome to Tribzzz Community: Incredible India!!!!</h2>
        <p>Enter your details and submit this form to get registered.</p>

    <?php
    if(isset($_SESSION['status'])){
        echo $_SESSION['status'];
        unset($_SESSION['status']);
    }
    ?>

        <form action="registration.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your Age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="text" name="email" id="email" placeholder="Enter your email">
            <input type="text" name="phone" id="phone" placeholder="Enter your phone no.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter the details of your skills and the products which you need to be recognised"></textarea>
            <br>
            <button class="btn">Submit</button>
            <br>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>