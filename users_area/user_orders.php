<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$username=$_SESSION['username'];
$get_user="Select * from `user_table` where User_Name='$username'";
$result=mysqli_query($con,$get_user);
$row_fetch=mysqli_fetch_array($result);
$user_id=$row_fetch['User_ID'];
//echo $user_id;
?>
<h3 class='text-success'>All my orders</h3>
<table class="table table-bordere mt-5">
    <thead class="bg-info">
    <tr>
        <th>Serial No.</th>
        <th>Amount Due</th>
        <th>Total Products</th>
        <th>Invoice Number</th>
        <th>Date</th>
        <th>Complete/Incomplete</th>
        <th>Status</th>
        
    </tr>
    </thead>
    <tbody class="bg-secondary text-light">
        <?php
$get_orders_details="select * from `users_orders` where User_ID=$user_id";
$result_orders=mysqli_query($con,$get_orders_details);
while($row_orders=mysqli_fetch_assoc($result_orders)){
    $oid=$row_orders['Order_ID'];
    $amount_due=$row_orders['Amount_Due'];
    $total_products=$row_orders['Total_Products'];
    $invoice=$row_orders['Invoice_Number'];
    $order_status=$row_orders['Order_status'];
    if($order_status=='pending'){
        $order_status='Incomplete';
    }else{
        $order_status='Complete';
    }
    $date=$row_orders['Order_date'];
    $number=1;
    echo" <tr>
            <td>$number</td>
            <td>$amount_due</td>
            <td>$total_products</td>
            <td>$invoice</td>
            <td>$date</td>
            <td>$order_status</td>";
            ?>
<?php
if($order_status=='Complete'){
    echo "<td>Paid</td>";
}else{
           echo "<td><a href='confirm_payment.php?order_id=$oid'>Confirm</a></td></tr>";
        }
        
    $number++;
}

?>
       
    </tbody>
</table>
</body>
</html>