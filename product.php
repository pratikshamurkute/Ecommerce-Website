<?php
include "header.php";
?>
<!--inner block start here-->
<div class="inner-block">
    <div class="col-sm-4">
    	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
		Add Product Info
	  </button>

	  <!-- Modal -->
	  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="exampleModalLabel">Fill the Product Details</h5>
			  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
			  <!-- form Details -->
			  <form method="POST" enctype="multipart/form-data">
				<div class="mb-3">
				  <label for="formGroupExampleInput" class="form-label">Product Name </label>
				  <input type="text" class="form-control" id="formGroupExampleInput" name="prod_name"
					placeholder="">
				</div>
				<div class="mb-3">
				  <label for="formGroupExampleInput2" class="form-label">Product Price</label>
				  <input type="text" class="form-control" id="formGroupExampleInput2" name="prod_price"
					placeholder="  ">
				</div>
				
				<div class="mb-3">
				  <label for="formGroupExampleInput2" class="form-label">Photo</label>
				  <img id="preview_img" src="images/download.png" name="photo" height="100" width="100" />
				  <input type="file" id="image" name="photo" class="fileinput" accept=" .png, .jpg, .jpeg " />
				</div>
				<div>
				  <button type="submit" class="btn btn-primary" name="btn_submit">Save </button>

				</div>
			  </form>
			  <!-- form end -->
			</div>

			<div class="modal-footer">
			  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		  </div>
		</div>
	  </div>
      </div>

  </div>

    <div class="product-block">
    	<div class="pro-head">
    	<center>
        	<h2>Products</h2>
</center>
    	</div>
    	
    <?php
	include "config.php";
	$view = mysqli_query($con, "select * from product_details") or die(mysqli_error($con));

	?>

<?php while($row=mysqli_fetch_array($view)){
?>
<div class="col-md-3 product-grid">
	<div class="product-items">
			<div class="project-eff">
				<div id="nivo-lightbox-demo"> <p> <a href="images/<?php echo $row['photo']; ?>"data-lightbox-gallery="gallery1" id="nivo-lightbox-demo"><span class="rollover1"> </span> </a></p></div>     
					<img class="img-responsive" src="images/<?php echo $row['photo']; ?>" alt="">
			</div>
		<div class="produ-cost">
			<h4><?php echo $row['prod_name']; ?></h4>
			<h5><?php echo $row['prod_price']; ?></h5>
			<a href="price.php?id=<?php echo $row['p_id'] ?>" style="color:white;">Product Details</a>
		</div>
	</div>
</div>
<?php } ?>

<div class="clearfix"> </div>
</div>
</div>
<!--inner block end here-->
<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#nivo-lightbox-demo a').nivoLightbox({ effect: 'fade' });
		});
		</script>

<!--copy rights start here-->
<?php
include "footer.php";
?>
<!--COPY rights end here-->

</div>

<?php
include "sidebar.php";
?>
<!-- insert  data  -->

<?php

if (isset($_POST['btn_submit'])) {
//  extract($_POST);
$prod_name = $_POST['prod_name'];
$prod_price = $_POST['prod_price'];


// photo insert query start...
$name = $_FILES['photo']['name'];
$type = $_FILES['photo']['type'];
$size = $_FILES['photo']['size'];
$temp = $_FILES['photo']['tmp_name'];
if ($name) {

$upload = "images/";
$imgExt = strtolower(pathinfo($name, PATHINFO_EXTENSION));
$valid_ext = array('jpg', 'png', 'jpeg');
$photo = rand(1000, 1000000) . "." . $imgExt;
move_uploaded_file($temp, $upload . $photo);
}

// photo insert query end..

$demo = mysqli_query($con,"INSERT INTO product_details(`prod_name`, `prod_price`, `photo`) VALUES ('$prod_name','$prod_price','$photo')") or die(mysqli_error($con));


if ($demo) {
echo "<script>;";
echo "alert('Data Inserted');";
header("location:product.php");
echo "</script>";
} else {
echo "<script>;";
echo "alert('Data Inserted Error')";
// echo "window.location.href = 'index.php';";
echo "</script>";
}
}

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function () {

$("#image").change(function () {
readImageData(this);
});
});

function readImageData(imgData) {
if (imgData.files && imgData.files[0]) {
var readerObj = new FileReader();

readerObj.onload = function (element) {

$('#preview_img').attr('src', element.target.result);
}

readerObj.readAsDataURL(imgData.files[0]);

}
}
</script>