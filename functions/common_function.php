<?php
// including connect file
 // include('./includes/connect.php');
//Getting Products
    function getproducts(){
        global $con;
        // Condition to check isset or not
        if(!isset($_GET['categories'])){
            if(!isset($_GET['brand'])){
        $select_query="select * from  `products` order by rand() LIMIT 0,10";
        $result_query=mysqli_query($con,$select_query);
        //$row=mysqli_fetch_assoc($result_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['Product_ID'];
          $product_title=$row['Product_Title'];
          $product_description=$row['Product_Description'];
          //$product_keyword=$row['Product_Keywords'];
          $product_image1=$row['product_img_1'];
          $product_price=$row['Product_Price'];
          $category_id=$row['category_ID'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' >
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='product_details.php?Product_ID=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
            </div>";
      }
    }
    }
}
// Getting all Products
function get_all_products(){
    global $con;
    // Condition to check isset or not
    if(!isset($_GET['categories'])){
        if(!isset($_GET['brand'])){

    $select_query="select * from  `products` order by rand()";
    $result_query=mysqli_query($con,$select_query);
    //$row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['Product_ID'];
      $product_title=$row['Product_Title'];
      $product_description=$row['Product_Description'];
     
      //$product_keyword=$row['Product_Keywords'];
      $product_image1=$row['product_img_1'];
      $product_price=$row['Product_Price'];
      $category_id=$row['category_ID'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
               <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='product_details.php?Product_ID=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
        </div>";
  }
}
}
}
// Getting unique categories
function get_unique_categories(){
global $con;
    if(isset($_GET['categories'])){
    $category_id=$_GET['categories'];
    $select_query="select * from  `products` where category_ID=$category_id";
    $result_query=mysqli_query($con,$select_query);
    $num_of_rows=mysqli_num_rows($result_query);
    if($num_of_rows==0){
        echo "<H2 class='text-center text-danger'> No stock for this category! </h2>";
    }
    //$row=mysqli_fetch_assoc($result_query);
    while($row=mysqli_fetch_assoc($result_query)){
      $product_id=$row['Product_ID'];
      $product_title=$row['Product_Title'];
      $product_description=$row['Product_Description'];
      //$product_keyword=$row['Product_Keywords'];
      $product_image1=$row['product_img_1'];
      $product_price=$row['Product_Price'];
      $category_id=$row['category_ID'];
      $brand_id=$row['brand_id'];
      echo "<div class='col-md-4 mb-2'>
      <div class='card' >
          <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
          <div class='card-body'>
              <h5 class='card-title'>$product_title</h5>
              <p class='card-text'>$product_description</p>
              <p class='card-text'>Price: $product_price/-</p>
              <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
              <a href='product_details.php?Product_ID=$product_id' class='btn btn-secondary'>View More</a>
          </div>
        </div>
        </div>";
  }
}
}
// Getting unique Brands
function get_unique_brands(){
    global $con;
        if(isset($_GET['brand'])){
        $brand_id=$_GET['brand'];
        $select_query="select * from  `products` where brand_id=$brand_id";
        $result_query=mysqli_query($con,$select_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<H2 class='text-center text-danger'> This Brand is not available now! </h2>";
        }
        //$row=mysqli_fetch_assoc($result_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['Product_ID'];
          $product_title=$row['Product_Title'];
          $product_description=$row['Product_Description'];
          //$product_keyword=$row['Product_Keywords'];
          $product_image1=$row['product_img_1'];
          $product_price=$row['Product_Price'];
          $category_id=$row['category_ID'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' >
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='product_details.php?Product_ID=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
            </div>";
      }
    }
}


// Displaying Brands in sidenav
function getbrands(){
    global $con;
    
     $select_brands="Select * from `brands` ";
          $result_brands=mysqli_query($con,$select_brands);
          
          while($row_data=mysqli_fetch_assoc($result_brands)){
            $brand_title=$row_data['brand_title'];
            $brand_id=$row_data['brand_id'];
            echo "<li class='nav-item '><a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a></li>";
          }
}

//Displaying Categories in sidenav
function getcategories(){
    global $con;
    $select_categories="Select * from `categories` ";
          $result_categories=mysqli_query($con,$select_categories);
          
          while($row_data=mysqli_fetch_assoc($result_categories)){
            $category_title=$row_data['category_title'];
            $category_ID=$row_data['category_ID'];
            echo "<li class='nav-item '><a href='index.php?categories=$category_ID' class='nav-link text-light'> $category_title</a></li>";
          }
}
// Searching products function
function search_product(){
  global $con;
        if(isset($_GET['search_data_product'])){
          $search_data_value=$_GET['search_data'];
        $search_query="Select * from `products` where Product_Title like '%$search_data_value%'";
        $result_query=mysqli_query($con,$search_query);
        //$row=mysqli_fetch_assoc($result_query);
        $num_of_rows=mysqli_num_rows($result_query);
        if($num_of_rows==0){
            echo "<H2 class='text-center text-danger'> No results match. No products found in this category! </h2>";
        }
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['Product_ID'];
          $product_title=$row['Product_Title'];
          $product_description=$row['Product_Description'];
          //$product_keyword=$row['Product_Keywords'];
          $product_image1=$row['product_img_1'];
          $product_price=$row['Product_Price'];
          $category_id=$row['category_ID'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' >
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='product_details.php?Product_ID=$product_id' class='btn btn-secondary'>View More</a>
              </div>
            </div>
            </div>";
      }
    }
  }
//View Details function
function view_details(){
  global $con;
        // Condition to check isset or not
        if(isset($_GET['Product_ID'])){
        if(!isset($_GET['categories'])){
            if(!isset($_GET['brand'])){
              $product_id=$_GET['Product_ID'];
        $select_query="Select * from  `products` where Product_ID=$product_id";
        $result_query=mysqli_query($con,$select_query);
        while($row=mysqli_fetch_assoc($result_query)){
          $product_id=$row['Product_ID'];
          $product_title=$row['Product_Title'];
          $product_description=$row['Product_Description'];
          $product_image1=$row['product_img_1'];
          $product_image2=$row['product_img_2'];
          $product_image3=$row['product_img_3'];
          $product_price=$row['Product_Price'];
          $category_id=$row['category_ID'];
          $brand_id=$row['brand_id'];
          echo "<div class='col-md-4 mb-2'>
          <div class='card' >
              <img src='./admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
              <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_description</p>
                  <p class='card-text'>Price: $product_price/-</p>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart</a>
                  <a href='index.php' class='btn btn-secondary'>Go Home</a>
              </div>
            </div>
            </div>
            <div class='col-md-8'>
            <div class='row'>
            <div class='col-md-12'>
                <h4 class='text-center text-info mb-5'>Related Products</h4>
            </div>
            <div class='col-md-6'>
           <img src='./admin_area/product_images/$product_image2' class='card-img-top' alt='$product_title'>
            </div>
            <div class='col-md-6'>
            <img src='./admin_area/product_images/$product_image3' class='card-img-top' alt='$product_title'>
            </div>
         </div>
    </div>";
    }
    }
    }
}
}

// Get IP Function
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
/*$ip = getIPAddress();  
echo 'User Real IP Address - '.$ip;  */

//Cart Function
function cart(){
if(isset($_GET['add_to_cart'])){
  global $con;
  $get_ip_address = getIPAddress(); 
  $get_product_id=$_GET['add_to_cart'];
  $select_query="select * from `cart_details` where IP_address='$get_ip_address' and Product_ID=$get_product_id";
  $result_query=mysqli_query($con,$select_query);
  $num_of_rows=mysqli_num_rows($result_query);
  if($num_of_rows>0){
    echo "<script>alert('This item is already present inside cart')</script>";
    echo "<script>window.open('index.php','_self')</script>";
}
else{
  $insert_query="insert into `cart_details` (Product_ID,IP_address,Quantity) values ($get_product_id,'$get_ip_address',0)";
  $result_query=mysqli_query($con,$insert_query);
  echo "<script>alert('Item is added to cart')</script>";
  echo "<script>window.open('index.php','_self')</script>";
}
}
}
// Function to get cart item numbers
function cart_item(){
  if(isset($_GET['add_to_cart'])){
    global $con;
    $get_ip_address = getIPAddress(); 
    
    $select_query="select * from `cart_details` where IP_address='$get_ip_address' ";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  else{
    global $con;
    $get_ip_address = getIPAddress(); 
    
    $select_query="select * from `cart_details` where IP_address='$get_ip_address' ";
    $result_query=mysqli_query($con,$select_query);
    $count_cart_items=mysqli_num_rows($result_query);
  }
  echo $count_cart_items;
  }

//Total Price Function
function total_cart_price(){
  global $con;
  $get_ip_address = getIPAddress(); 
  $total=0;
  $cart_query="Select * from `cart_details` where IP_address='$get_ip_address'";
  $result=mysqli_query($con,$cart_query);
  while($row=mysqli_fetch_array($result)){
    $product_id=$row['Product_ID'];
    $select_products="Select * from `products` where Product_ID='$product_id'";
    $result_products=mysqli_query($con,$select_products);
    while($row_product_price=mysqli_fetch_array($result_products)){
        $product_price=array($row_product_price['Product_Price']);
        $product_values=array_sum($product_price);
        $total+=$product_values;
    }
  }
  echo $total;
}
//Get user order details
function get_user_order_details(){
  global $con;
  $user_username=$_SESSION['username'];
  $get_details="select * from `user_table` where User_Name='$user_username'";
  $result_query=mysqli_query($con,$get_details);
  while($row_query=mysqli_fetch_array( $result_query)){
    $user_id=$row_query['User_ID'];
    
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
          $get_orders="Select * from `users_orders` where User_ID=$user_id and Order_status='pending'";
          $result_order_query=mysqli_query($con,$get_details);
          $row_count=mysqli_num_rows($result_order_query);
          if($row_count>0){
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_count</span> pending orders</h3>";
            echo "<p class='text-center'><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
          }else{
            echo "<h3 class='text-center text-success mt-5 mb-2'>You have zero pending orders</h3>  <p class='text-center'><a href='../index.php' class='text-dark'>Explore Products</a></p>";
          }
        }
      }
    }
  }


?>