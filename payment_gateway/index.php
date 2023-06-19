<?php 
include('header.php');
?>
<title>phpzag.com : Demo Razorpay Payment Gateway Integration in PHP</title>
<?php include('container.php');?>
<div class="container">
	<div class="row">		
		<div class="col-sm-12">	
			<h2>Example: Razorpay Payment Gateway Integration in PHP</h2>
			<br><br>
			<div class="col-sm-4 col-lg-4 col-md-4">
				<div class="thumbnail">
					<img src="prod.gif" alt="">
					<div class="caption">
						<h4 class="pull-right">₹49.99</h4>
						<h4><a href="#">My Test Product"</a></h4>
						<p>See more examples like this at <a target="_blank" href="https://www.phpzag.com/">phpzag</a>.</p>
					</div>
					<form id="checkout-selection" action="pay.php" method="POST">		
						<input type="text" name="item_name" value="Customer Name">
						<input type="text" name="cust_name" value="phpzag">		
						<!-- <input type="text" name="item_description" value="My Test Product Description"> -->
						<!-- <input type="text" name="item_number" value="3456"> -->
						<input type="text" name="amount" value="50">
						 <input type="text" name="currency" value="INR">
						<!-- <input type="text" name="address" value="ABCD Address"> -->
						<!--	
												
						<input type="text" name="email" value="test@phpzag.com">	
						<input type="text" name="contact" value="9999999999">								 -->
						<input type="submit" class="btn btn-primary" value="Buy Now">					
					</form>						
				</div>
			</div>
		</div>
	</div>	
</div>
<?php include('footer.php');?>