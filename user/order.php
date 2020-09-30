<?php
include ('../includes/user-header.php'); 
	
?>


	<!-- breadcrumb -->
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Home
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Shoping Cart
			</span>
		</div>
	</div>
		

	
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Your Order
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
                                products:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
                               &nbsp&nbsp&nbsp&nbsp price
							
								</span>
							</div>
						</div>
                          
                        <?php 
				if(isset($_SESSION['cart'])){
                  $total=0;
                  foreach ($_SESSION['cart'] as $key => $value){
                      $query1="SELECT * FROM products WHERE product_id = $value";
                      $result1=mysqli_query($conn,$query1);
                      $u= mysqli_fetch_assoc($result1);
					
					 $total= $total+$u['product_price'];
                       ?>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									
                                    <li><span><?php echo $u['product_name'];?> </span></li> 
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
                                 <li>  <span><?php echo $u['product_price'] ;?> </span></li>
								
                
								<div class="p-t-15">
									

                               		
									
										
								</div>
							</div>
						</div>
                        <?php } } ?>
							
						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo $total; ?>
								</span>
							</div>
						</div>
                        <?php
                        
                        //print_r($_SESSION['cart']);
                         $id=array();
                         $price=array();
                         $name=array();
                       
                         foreach ($_SESSION['cart'] as $key => $value){
                            $query8="SELECT * FROM products WHERE product_id = $value";
                            $result8=mysqli_query($conn,$query8);
                            $p= mysqli_fetch_assoc($result8);
                            array_push($price,$p['product_price']);
                            array_push($id,$p['product_id']);
                            array_push($name,$p['product_name']);

                         }

                         $idstr = implode ("," , $id);
                         $price_str = implode ("," , $price);
                         $name_str = implode ("," , $name);
                        
                        

                         //`cus_id`, '{$_SESSION['idc']}',
                         $que="INSERT INTO `order`(`cus_id`,`product_id`, `qty`, `payment_method`, `total`) VALUES ('{$_SESSION['idcus']}','". $idstr ."','1','cash','$total')";
						mysqli_query($conn,$que);
					
                          unset($_SESSION['cart']);
                  //header('location:index.php');
                         //header('location:order.php');
                          ?>
						
					</div>
				</div>
			</div>
		</div>
	</form>
		
	
		

	<?php	include ('../includes/user-footer.php');  ?>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>