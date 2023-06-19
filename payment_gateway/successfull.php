<?php


if(isset($_GET['id'])){ 
    // header("Location: price.php"); 
} 
// $order_id = base64_decode($_GET['razorpayOrderId']); 
$razorpayOrderId = $_GET['id'];


$con=mysqli_connect("localhost","root","","e_commerce_project") or die(mysqli_error($con));
	// Fetch order details from the database 
$sqlQ = "select a.*,b.* from orders a, customers b WHERE a.id=b.id and b.id=a.id; "; 
$stmt = $con->prepare($sqlQ); 
// $stmt->bind_param("i", $db_id); 
$db_id = $razorpayOrderId;

$stmt->execute(); 
$result = $stmt->get_result(); 
 
if($result->num_rows > 0){ 
    $orderInfo = $result->fetch_assoc(); 
?>


    
<!-- Order status & shipping info -->
<div class="row col-lg-12 ord-addr-info">
    <div class="hdr">Order Info</div>
    <p><b>Reference ID:</b> <?php echo $razorpayOrderId; ?></p>
    <p><b>Total:</b> <?php echo $orderInfo['grand_total']; ?></p>
    <p><b>Placed On:</b> <?php echo $orderInfo['created']; ?></p>
    <p><b>Buyer Name:</b> <?php echo $orderInfo['first_name'].' '.$orderInfo['last_name']; ?></p>
    <p><b>Email:</b> <?php echo $orderInfo['email']; ?></p>
    <p><b>Phone:</b> <?php echo $orderInfo['phone']; ?></p>
    <p><b>Address:</b> <?php echo $orderInfo['address']; ?></p>
</div>
<?php
}else{ 
    // header("Location: price.php"); 
} 

	?>
