<?php
session_start();
include('layout/header_product.php');
include('cart.php');
include('connect/connect.php');

?>
<style>
	.product .box {
		display: grid;
    	grid-gap: 5px;
    	grid-template-columns: repeat(auto-fill, minmax(20rem, 5fr));
	}
	.product .box .w3-card .block2_pic .img{
		width: 100%;
    	height: 100%;
    	object-fit: cover;
	}
</style>

<body>	
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<?php
			include('filter.php');
			?>
			<section class="product">
				<div class="box">
					
					<!-- Block2 -->
					<?php
						if(isset($_GET['action']) && ($_GET['action']=='0')){
							$sql=mysqli_query($conn, "SELECT * FROM `product`");
						}elseif(isset($_GET['action']) && ($_GET['action']=='1')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` WHERE type='nến thơm'");
						}elseif(isset($_GET['action']) && ($_GET['action']=='2')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` WHERE type='tinh dầu'");
						}elseif(isset($_GET['action']) && ($_GET['action']=='3')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` WHERE type='Thiết bị khuyếch tán'");
						}elseif(isset($_GET['action']) && ($_GET['action']=='4')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` WHERE type='nhang thảo mộc'");
						}elseif(isset($_GET['action']) && ($_GET['action']=='5')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` ORDER BY name ASC");
						}elseif(isset($_GET['action']) && ($_GET['action']=='6')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` ORDER BY name DESC");
						}elseif(isset($_GET['action']) && ($_GET['action']=='7')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` ORDER BY price ASC");
						}elseif(isset($_GET['action']) && ($_GET['action']=='8')){
							$sql=mysqli_query($conn, "SELECT * FROM `product` ORDER BY price DESC");
						}else{
							$sql=mysqli_query($conn, "SELECT * FROM `product`");
						}
						if(mysqli_num_rows($sql)>0){
							while($row=mysqli_fetch_assoc($sql)){
					?> 
					<div class="w3-card-4 w3-margin">
						<!--picture-->
						<div class="block2-pic hov-img0">
							<img src="image_product/<?php echo $row['picture1']?>" alt="IMG-PRODUCT" style:width="100%" height="300px"> 
							<button type="submit" name="quickview" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
								Quick View
							</button>						
						</div>
					
						<!--title and price-->
						<form id="form_index" action="product-detail.php" method="post">
							<div class="w3-container w3-center">
								<input type="hidden" name="id" value="<?php echo $row['id']?>">
								<button class="btn btn-default" type="submit" name="quick_view"><?php echo $row['name']?></button>
							</div>	
							<div class="w3-container w3-center">
								<span class="stext-105 cl3 container">
									<?php echo number_format($row['price']) . " vnđ"?>
								</span>
							</div>
						</form>	
					</div>
					<?php
					include('modal.php');
							}
						}
						
					?>
				</div>
			</section>
			
			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</div>
<?php
include('layout/footer.html');
include('modal.php');
?>

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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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