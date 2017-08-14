<?php
    if(isset($_POST['user_name'])){
        $con=mysqli_connect("localhost","root","","users");
         $name=$_POST['user_name'];

 $checkdata=" SELECT name FROM users WHERE name='$name' ";

 $query=mysqli_query($con,$checkdata);

 if(mysqli_num_rows($query)>0)
 {
  echo "User Name Already Exist";
 }
 else
 {
  echo "Available";
 }
 exit();
}
    
?>