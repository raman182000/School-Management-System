<?php

  $conn = mysqli_connect('localhost', 'root', '','cpi');

  $username =$_POST["username"];
  $password = md5($_POST["password"]);
  $email =$_POST["email"];
  $mobileno = $_POST["mobileno"];

  $uid=uniqid('SID',true).md5(time().date("ljSFYh:i:sA"));

  $check_user=mysqli_num_rows(mysqli_query($conn,"select * from users where email='$email'"));
  $check_mobile=mysqli_num_rows(mysqli_query($conn,"select * from users where mobileno='$mobileno'"));
  if($check_user>0){
    echo "email_present";
  }
  else if($check_mobile>0)
  {
    echo "mobile No_present";
  }
  else
  {
    $sql = "INSERT INTO users VALUES('','$username','$email','$mobileno','$password','','','','','$uid')";
    $res=mysqli_query($conn,$sql);
    $res_chk=mysqli_query($conn,"select * from users where email='$email' and password='$password'");
    $check_user_reg=mysqli_num_rows($res_chk);
    if($check_user_reg>0)
    {
      $row = mysqli_fetch_array($res_chk);
      echo $uid;
      }
  }
?>