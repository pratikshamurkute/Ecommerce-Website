<?php
include "header.php";
?>
<!--inner block start here-->
<div class="inner-block">
<?php 
// Include the database connection file 
// require_once 'config.php'; 
 
// Initialize shopping cart class 
include_once 'Cart.class.php'; 
$cart = new Cart; 
 
// Fetch products from the database 

include "config.php";
        
     
        if (isset($_GET['id'])) {
            $p_id  = $_GET['id'];
            $query = "select pc.*,pi.* from product_details pc, products pi WHERE pc.p_id=pi.p_id and pc.p_id=$p_id;";
            $res = mysqli_query($con, $query);
       
if(mysqli_num_rows($res) >0 ){

    
        while($row1 = $res->fetch_assoc()){

  
      ?>  
            <div class="card" style="width: 18rem;">
              <div class="card-body">
              <img class="img-fluid w-100" id="image" src="images/<?php echo $row1['image']; ?>" alt=".." >

                <h5 class="card-title"><?php echo $row1["name"]; ?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Price: <?php echo $row1["price"]; ?></h6>
                <p class="card-text"><?php echo $row1["description"]; ?></p>
                <a href="cartAction.php?action=addToCart&id=<?php echo $row1["id"]; ?>" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
        <?php
    }
}else{
    echo "Product not found .";
}
    }
         ?>
        </div>
    </div></div>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
