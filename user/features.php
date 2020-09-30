<?php
include ('../includes/user-header.php'); 
//include ('../config/db.php');		
?>


<!-- Product ========================= view latest -->
<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
				HOT &nbsp Product
				</h3>
			</div>

			

				

			<div class="row isotope-grid">
			<!-- start while here -->
			<?php 
			        $query="SELECT * FROM products where statuss='allowed' and feature='Yes'";
                    $result=mysqli_query($conn,$query);
                     while($product= mysqli_fetch_assoc($result)){
                       ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
					<span style="background-color:red;color:white">Hot</span>
						<div class="block2-pic hov-img0">
						<img  src="../vendores/images/<?php echo $product['product_image'];?>" width="10px" height="320px">

							
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.php?idpro=<?php echo $product['product_id']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $product['product_name']; ?>
								</a>

								<span class="stext-105 cl3">
								<?php echo $product['product_price']; ?><!--&nbsp&nbsp&nbsp&nbsp &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<span style="background-color:green;color:white">NEW</span>-->
								</span>
							</div>

							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
						</div>
					</div>
				</div><!-- col -->

					 <?php } ?>

			<!-- Load more 
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>-->
			</div><!-- row-->
		</div><!-- con -->
	</section>


<?php	include ('../includes/user-footer.php');  ?>