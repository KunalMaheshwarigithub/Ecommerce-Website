<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
     <!-- bootstrap CSS link -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

     <style>
        body{
            overflow-x:hidden;
        }
     </style>
     
</head>
<body>
    <div class="container-fluid my-3">
        <h2 class="text-center">
         User Login
        </h2>
        <div class="row d-flex align-items-center justify-content-center mt-5">
            <div class="col-lg-12 col-xl-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Username Field -->
                    <div class="form-outline mb-4">
<label for="user_username" class="form-label">Username</label>
<input type="text" id="user_username" class="form-control" placeholder="Enter your Username" autocomplete="off" required="required" name="user_username" >
                    </div>
                  
                    <!-- Password Field -->
                    <div class="form-outline mb-4">
<label for="user_userpassword" class="form-label">Password</label>
<input type="password" id="user_userpassword" class="form-control" placeholder="Enter your Password" autocomplete="off" required="required" name="user_userpassword" >
                    </div>
                   
                    <div class="mt-4 pt-2">
                        <input type="submit" value="Login" class="bg-info py-2 px-3 border-0" name="login">
                        <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account ?<a href="user_registration.php" class="text-danger"> Register </a> </p>
                    </div>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
<?php
if(isset($_POST['login'])){
    $user_username=$_POST['user_username'];
    $user_userpassword=$_POST['user_userpassword'];
    $select_query="select * from `user_table` where User_Name='$user_username' ";
    $result=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($result);
    $row_data=mysqli_fetch_assoc($result);
$user_ip=getIPAddress();
    // cart item

    $select_query_cart="select * from `cart_details` where IP_address='$user_ip' ";
    $select_cart=mysqli_query($con,$select_query_cart);
    $row_count_cart=mysqli_num_rows($select_cart);

    if($row_count>0){
        $_SESSION['username']=$user_username;
        if(password_verify($user_userpassword,$row_data['User_Password'])){
            //echo "<script>alert('You are logged in!')</script>";
            if($row_count==1 and $row_count_cart==0){
                $_SESSION['username']=$user_username;
                echo "<script>alert('You are logged in!')</script>";
                echo "<script>window.open('profile.php','_self')</script> ";
            }else{
                $_SESSION['username']=$user_username;
                echo "<script>alert('You are logged in!')</script>";
                echo "<script>window.open('payment.php','_self')</script> ";
            }
        }else{
            echo "<script>alert('Invalid credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid credentials')</script>";
    }

}



?>