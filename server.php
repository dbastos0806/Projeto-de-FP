<?php
session_start();

// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'formula1');



// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $userType = "Customer";



  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE Name='$username' OR Email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['Name'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['Email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database

    echo $password;

    $query = "INSERT INTO users(Name, Email, Password_hash,UserType) VALUES('$username', '$email', '$password','$userType')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: login.php');
  }
}
//edit
if (isset($_POST['edit_user'])) {
  // receive all input values from the form
  $editId = mysqli_real_escape_string($db, $_POST['editId']);
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $userType = mysqli_real_escape_string($db, $_POST['usertype']);

  $sqldb = new PDO("mysql:host=localhost;dbname=formula1","root","");
  $sql = $sqldb->prepare("UPDATE users SET Name=?,Email=?,UserType= ? WHERE UserId = ?");
try {
$sql->bindParam(1, $_POST['username']);
$sql->bindParam(2, $_POST['email']);
$sql->bindParam(3, $_POST['usertype']);
$sql->bindParam(4, $_POST['editId']);
$sql->execute();
}
catch(Exception $ex){}

header('location: product.php');
  }

// ... 

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
    $password = md5($password);
    $query = "SELECT * FROM users WHERE Name='$username' AND Password_hash='$password'";
    $results = mysqli_query($db, $query);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header('location: main.php');
    } else {
      array_push($errors, "Wrong username/password combination");
    }
  }
}
if (isset($_POST['edit_pilot'])) {
  // receive all input values from the form
  $driverId = mysqli_real_escape_string($db, $_POST['driverId']);
  $code = mysqli_real_escape_string($db, $_POST['code']);
  $forname = mysqli_real_escape_string($db, $_POST['forename']);
  $surname = mysqli_real_escape_string($db, $_POST['surname']);
  $surname = mysqli_real_escape_string($db, $_POST['nationality']);

  $sqldb = new PDO("mysql:host=localhost;dbname=formula1","root","");
  $sql = $sqldb->prepare("UPDATE drivers SET code=?,forename=?,surname= ?,nationality=? WHERE driverId = ?");
try {
$sql->bindParam(1, $_POST['code']);
$sql->bindParam(2, $_POST['forename']);
$sql->bindParam(3, $_POST['surname']);
$sql->bindParam(4, $_POST['nationality']);
$sql->bindParam(5, $_POST['driverId']);
$sql->execute();
}
catch(Exception $ex){}

header('location: main.php');
  }

?>