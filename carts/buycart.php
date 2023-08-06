
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<title>Cart</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../adminassets/styles/bootstrap4/bootstrap.min.css">
<link href="../adminassets/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../adminassets/styles/cart_styles.css">
<link rel="stylesheet" type="text/css" href="../adminassets/styles/cart_responsive.css">

</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	
	<!-- Cart -->

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Shopping Cart</div>
						<div class="cart_items">
							<ul class="cart_list">
                                <?php 
                                include '../include/connect.php';

                                $sql = "select * from `quantities`";
                                $result = mysqli_query($con,$sql);
                                $data = array();
                                while($row = mysqli_fetch_assoc($result) ){
                                     $data[] = $row;
                                }
foreach($data as $dt) {
    $product_id=$dt['product_id'];
    $stmt = "select * from `products` where product_id='$product_id'";
    $check = mysqli_query($con, $stmt);
    $products = array();

    while($product = mysqli_fetch_assoc($check)) {
        //   $products[] = $product;


        ?>
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="../admin/products/photos/<?php echo $product['photo'] ?>" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Name</div>
											<div class="cart_item_text"><?php echo $product['product'] ?></div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Color</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Quantity</div>
											<div class="cart_item_text"><?php echo $dt['quantity'] ?></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Price</div>
											<div class="cart_item_text">$<?php echo $dt['price'] ?></div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">$<?php echo $dt['price'] * $dt['quantity'] ?></div>
										</div>
									</div>
								</li>
							    <?php }
    }?>
                            </ul>
						</div>
						
						<!-- Order Total -->
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Order Total:</div>
								<?php  $asd = "select * from `quantities`";
                                $dfg = mysqli_query($con,$sql);
                                $qwe = array();
								while($bnm = mysqli_fetch_assoc($dfg)) {
									$qwe[] = $bnm['price'] * $bnm['quantity'];
									echo $bnm['price'];
									// echo
								}

                                 ?>
								<div class="order_total_amount">$<?php echo array_sum($qwe) ?></div>
							<?php  ?>
							</div>
						</div>

						<div class="cart_buttons">
						<form action="" method="POST" enctype="multipart/form-data">
							<?php 
							for($i=0;$i<count($qwe);$i++){ ?>
							<input type="text" value="<?php echo $qwe['product_id'] ?>">
							<!-- <button type="button" class="button cart_button_clear">Add to Cart</button> -->
						<?php } ?>
						<button type="submit" class="button cart_button_checkout">Add to Cart</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Newsletter -->

	

	<!-- Footer -->

	
		
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="js/cart_custom.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

</body>


</html>