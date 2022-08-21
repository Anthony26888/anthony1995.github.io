	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ Hàng
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<table class="table">
					<tr class="table_head">
						<th>Sản Phẩm</th>
						<th>Số Lượng</th>
						<th>Giá</th>
					</tr>
					<?php
					foreach ($_SESSION['cart'] as $key => $value){
					?>
					<tr class="table_row">
						<td><?php echo $value['name']?></td>
						<td><?php echo $value['number']?></td>
						<td><?php echo number_format($value['price'])?></td>
						
					</tr>
					<?php
						}
					?>
				</table>
				
				<div class="w-full">
					<?php
					$subtotal=0;
					foreach ($_SESSION['cart'] as $key => $value){
						$total=($value['price']*$value['number']);
						$subtotal+=$total;								
					?>
					<div class="header-cart-total w-full p-tb-40">
						Tổng Cộng: <?php echo number_format($subtotal). " vnđ"?>
					</div>
					<?php
						}
					?>
					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Xem Giỏ Hàng
						</a>
						
						<a href="checkout.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Thanh Toán
						</a>
						
					</div>
				</div>
			</div>
			</form>
		</div>
	</div>