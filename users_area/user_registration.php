<?php 
include('../includes/connect.php');
include('../functions/common_function.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
     <!-- bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
            New User Registration
        </h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username Field -->
                    <div class="form-outline mb-4">
<label for="user_username" class="form-label">Username</label>
<input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username" >
                    </div>
                    <!-- Email Field -->
                    <div class="form-outline mb-4">
<label for="user_useremail" class="form-label">Email</label>
<input type="email" id="user_useremail" class="form-control" placeholder="Enter your Email" autocomplete="off" required="required" name="user_useremail" >
                    </div>
                    <!-- Image Field -->
                    <div class="form-outline mb-4">
<label for="user_userimage" class="form-label">User Image</label>
<input type="file" id="user_userimage" class="form-control" required="required" name="user_userimage" >
                    </div>
                    <!-- Password Field -->
                    <div class="form-outline mb-4">
<label for="user_userpassword" class="form-label">Password</label>
<input type="password" id="user_userpassword" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_userpassword" >
                    </div>
                    <!-- Confirm Password Field -->
                    <div class="form-outline mb-4">
<label for="user_confirmpassword" class="form-label">Confirm Password</label>
<input type="password" id="user_confirmpassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="user_confirmpassword" >
</div>
<!-- Address Field -->
<div class="form-outline mb-4">
<label for="user_address" class="form-label">Address</label>
<input type="text" id="user_address" class="form-control" placeholder="Enter your Address" autocomplete="off" required="required" name="user_address" >
                    </div>
<!-- Contact Field -->
<div class="form-outline mb-4">
<label for="user_contact" class="form-label">Contact</label>
<input type="text" id="user_contact" class="form-control" placeholder="Enter your Contact No." autocomplete="off" required="required" name="user_contact" >
                    </div>
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="register">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account ?<a href="user_login.php" class="text-danger"> Login</a> </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
<!-- PHP Code --> 
<?php
if(isset($_POST['register'])){
    $user_username=$_POST['user_username'];
    $user_useremail=$_POST['user_useremail'];
    $user_userimage=$_FILES['user_userimage']['name'];
    $user_tempimage=$_FILES['user_userimage']['temp_name'];
    $user_password=$_POST['user_userpassword'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_cpassword=$_POST['user_confirmpassword'];
    $user_address=$_POST['user_address'];
    $user_contact=$_POST['user_contact'];
    $user_ip=getIPAddress();
    //select query
    $select_query="select * from `user_table` where User_Name='$user_username' or User_Email='$user_useremail'";
    $result=mysqli_query($con,$select_query);
    $rows_count=mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and Useremail already exists!')</script>";
    }
    else if($user_password!=$user_cpassword){
        echo "<script>alert('Password do not match!')</script>";
    }
    else{
 // insert_query
 move_uploaded_file($user_tempimage,"./user_images/$user_userimages");
 $insert_query="insert into `user_table` (User_Name,User_Email,User_Password,User_Image,User_IP,User_Address,Phone_Number) values ('$user_username','$user_useremail','$hash_password','$user_userimage','$user_ip','$user_address','$user_contact')";
 $sql_execute=mysqli_query($con,$insert_query);
 if($sql_execute){
     echo "<script>alert('Data inserted successfully!')</script>";
 }else{
     die(mysqli_error($con));
 }
    }
//Selecting cart items
$select_cart_items="select * from `cart_details` where 	IP_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if ($rows_count>0){
    $_SESSION['username']=$user_username;
    echo "<script>alert('You have items in your cart!')</script>";
    echo "<script>window.open('checkout.php','_self')</script>";
}else{
    echo "<script>window.open('../index.php','_self')</script>";
}
}
?>