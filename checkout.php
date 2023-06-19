<?php 
include "header.php";
?>
<?php 
// Include the configuration file 
require_once 'config.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// If the cart is empty, redirect to the products page 
if($cart->total_items() <= 0){ 
    header("Location: product.php"); 
} 
 
// Get posted form data from session 
$postData = !empty($_SESSION['postData'])?$_SESSION['postData']:array(); 
unset($_SESSION['postData']); 
 
// Get status message from session 
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:''; 
if(!empty($sessData['status']['msg'])){ 
    $statusMsg = $sessData['status']['msg']; 
    $statusMsgType = $sessData['status']['type']; 
    unset($_SESSION['sessData']['status']); 
} 
?>
<div class="inner-block">

<div class="container">
    <h1>CHECKOUT</h1>
    <div class="col-12">
        <div class="checkout">
            <div class="row">
                <?php if(!empty($statusMsg) && ($statusMsgType == 'success')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                </div>
                <?php }elseif(!empty($statusMsg) && ($statusMsgType == 'error')){ ?>
                <div class="col-md-12">
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                </div>
                <?php } ?>
				
                <div class="col-md-4 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted"><a href="viewCart.php">Your Cart</a></span>
                        <span class="badge badge-secondary badge-pill"><?php echo $cart->total_items(); ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                    <?php 
                    if($cart->total_items() > 0){ 
                        // Get cart items from session 
                        $cartItems = $cart->contents(); 
                        foreach($cartItems as $item){ 
                    ?>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div>
                                
                                <h6 class="my-0"><?php echo $item["name"]; ?></h6>
                                <small class="text-muted"><?php echo $item["price"]; ?>(<?php echo $item["qty"]; ?>)</small>
                            </div>
                            <span class="text-muted"><?php echo $item["subtotal"]; ?></span>
                        </li>
                    <?php } } ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Total (<?php //echo CURRENCY; ?>)</span>
                            <strong><?php echo $cart->total(); ?></strong>
                        </li>
                    </ul>
                    <a href="product.php" class="btn btn-sm btn-info">+ add items</a>
                </div>
               
<div class="container">
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="prod.gif" alt="">
					<div class="caption">
						<h4 class="pull-right">₹<?php echo $cart->total(); ?></h4>
						<h4><a href="#"><?php echo $item['name']; ?></a></h4>
						<!-- <p>See more examples like this at <a target="_blank" href="https://www.phpzag.com/">phpzag</a>.</p> -->
					</div>
					<form id="checkout-selection" action="./payment_gateway/pay.php" method="POST">	
                    <div class="mb-3">
                            <label for="text">Product Name</label>
                            <input type="text" class="form-control" name="item_name" value="<?php echo $item['name'];?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="text">Customer Name</label>
                            <input type="text" class="form-control" name="cust_name" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="text">Amount</label>
                            <input type="text" class="form-control" name="amount" value="<?php echo $cart->total(); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="text">Currency</label>
                            <input type="text" class="form-control" name="currency" value="INR" required>
                        </div>
                       
                           <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" name="phone" value="" required>
                        </div>
                        <div class="mb-3">
                            <label for="last_name">Address</label>
                            <input type="text" class="form-control" name="address" value="" required>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Buy Now">					

                    




<!-- 
						<input type="text" name="item_name" value="<?php echo $item['name'];?>" >
						<input type="text" name="cust_name" value="" placeholder="Cutomer Name">		
						 <input type="text" name="item_description" value="My Test Product Description"> -->
						<!-- <input type="text" name="item_number" value="3456"> -->
						<!-- <input type="text" name="amount" value="<?php echo $item['subtotal']; ?>">
						 <input type="text" name="currency" value="INR">
                         <input type="text" name="phone" value="" placeholder="Mobile Number"/>	 -->
						<!-- <input type="text" name="address" value="ABCD Address"> -->
					
												
						<!-- <input type="text" name="email" value="" placeholder="Email ">	 -->
						
						<!-- <input type="submit" class="btn btn-primary" value="Buy Now">					 --> 
					</form>						
				</div>
			</div>
		</div>
	</div>	
</div>

            </div>
        </div>
    </div>
</div>
                        
                        <!--copy rights start here-->
<?php
include "footer.php";
?>
<!--COPY rights end here-->
</div>
</div>

<?php
include "sidebar.php";
?>
