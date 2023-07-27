<?php

$username = $_POST['username'];
$password = $_POST['password'];





if (!empty($uname1) || !empty($email) || !empty($password) )
{

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "project";



// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $SELECT = "SELECT * From register Where username = '$username' AND Password='$password'";
//Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->execute();
     $stmt->store_result();
     $rnum = $stmt->num_rows;

     //checking username
      if ($rnum>0) {
      header("location:nav.html");
     } else {
      $alert= "<script>alert('Username or Password is Wrong');window.location='login.html'</script>";
      echo $alert;
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>