<?php
include('../includes/connect.php');
include('../functions/common_function.php');
if(isset($_GET['User_ID'])){
    $user_id=$_GET['User_ID'];
}

//Getting total items and total price
$get_ip_address=getIPAddress();
$total_price=0;
$cart_query_price="select * from `cart_details` where IP_address='$get_ip_address'";
$result_cart_price=mysqli_query($con,$cart_query_price);
$invoice_number=mt_rand();
$status='pending';
$count_products=mysqli_num_rows($result_cart_price);
while($row_price=mysqli_fetch_array($result_cart_price)){
    $product_id=$row_price['Product_ID'];
    $select_product="select * from `products` where Product_ID=$product_id";
    $run_price=mysqli_query($con,$select_product);
    while($row_product_price=mysqli_fetch_array($run_price)){
        $product_price=array($row_product_price['Product_Price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}
//Getting Quantity
$get_cart="select * from `cart_details` ";
$run_cart=mysqli_query($con,$get_cart);
$get_item_quantity=mysqli_fetch_array($run_cart);
$quantity=$get_item_quantity['Quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}
$insert_order="Insert into `users_orders`(User_ID,Amount_Due,Invoice_Number	,Total_Products,Order_date,Order_status) values ($user_id,$subtotal,$invoice_number,$count_products,NOW(),'$status')";
$result_query=mysqli_query($con,$insert_order);
if($result_query){
    echo "<script>alert('Orders are submitted successfully!')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//Oredrs pending
$insert_pending_order="Insert into `order_pending`(User_ID,Invoice_Number,Product_ID,Qunatity,Order_status) values ($user_id,$invoice_number,$product_id,$quantity,'$status')";
$result_pending_orders=mysqli_query($con,$insert_pending_order);

//Delete items from cart
$empty_query="Delete from  `cart_details` where IP_address='$get_ip_address'";
$result_delete_orders=mysqli_query($con,$empty_query);

?>