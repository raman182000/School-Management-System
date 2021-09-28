<?php 
$name=$_POST['first_name_T']." ".$_POST['last_name_T'];
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$email=$_POST['email'];
$mobileno=$_POST['mobileno'];
$city=$_POST['city'];
$state=$_POST['state'];
$password=$_POST['password'];
$uid=uniqid('T_Id',true).md5(time().date("ljSFYh:i:sA"));

$conn = mysqli_connect('localhost', 'root', '','cpi');
$check_user=mysqli_num_rows(mysqli_query($conn,"select * from teachers where email='$email'"));
  $check_mobile=mysqli_num_rows(mysqli_query($conn,"select * from teachers where mobileno='$mobileno'"));
  if($check_user>0){
    echo "email_present";
  }
  else if($check_mobile>0)
  {
    echo "mobile No_present";
  }
  else
  {
    $sql = "INSERT INTO teachers VALUES('$uid','$name','$gender','$dob','$email','$mobileno','$city','$state','$password')";
    $res=mysqli_query($conn,$sql);
    $res_chk=mysqli_query($conn,"select * from teachers where email='$email' and password='$password'");
    $check_user_reg=mysqli_num_rows($res_chk);
    if($check_user_reg>0)
    {
      $row = mysqli_fetch_array($res_chk);
      echo $row['id'];
      }
  }
 ?>