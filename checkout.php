
<?php
  session_start();
  include('layout/header_checkout.php');
?>
<style>
  .payment{
    display:flex;
    justify-content: space-between;
  }
</style>  
  <body class="bg-light">
    <form action="database/checkout.php" method="post">
    <div class="container">
      <div class="py-5 text-center">
        <h1>Thanh Toán</h1>
      </div>
      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Giỏ Hàng</span>
            <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['cart'])?></span>
          </h4>
          <table class="table">
            <tr class="table_head">
              <th>Sản Phẩm</th>
              <th>Mùi Hương</th>
              <th>Số Lượng</th>
              <th>Giá</th>
            </tr>
            <?php
            $subtotal=0;
            foreach ($_SESSION['cart'] as $key => $value){
              $total=$value['number']*$value['price'];
              $subtotal+=$total;
            ?>
            <tr class="table_row">
              <td><?php echo $value['name']?></td>
              <td><?php echo $value['fragant']?></td>
              <td><?php echo $value['number']?></td>
              <td><?php echo number_format($subtotal)?></td>
            </tr>
            <?php
              }
            ?>
				  </table>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Thông Tin Khách Hàng</h4>
            <div class="mb-3">
              <label for="username">Họ và Tên</label>
              <div class="input-group">
                <input type="text" class="form-control" name="name_customer" placeholder="Nguyên Văn A" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Vui lòng nhập họ và tên.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Số Điện Thoại</label>
              <div class="input-group">
                <input type="text" class="form-control" name="phone" placeholder="090xxxxx" required>
                <div class="invalid-feedback" style="width: 100%;">
                  Vui lòng nhập số điện thoại.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" name="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Vui lòng nhập Email.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Địa Chỉ</label>
              <input type="text" class="form-control" name="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Vui lòng nhập địa chỉ.
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="country">Tỉnh/Thành Phố</label>
                <select class="custom-select d-block w-100" name="calc_shipping_provinces" required="">
                  <option value="">Lựa chọn...</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Tỉnh/Thành Phố.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="state">Quận/Huyện</label>
                <select class="custom-select d-block w-100" name="calc_shipping_district" required="">
                  <option value="">Lựa Chọn...</option>
                </select>
                <div class="invalid-feedback">
                  Vui lòng chọn Quận/Huyện.
                </div>
              </div>
              <input class="billing_address_1" name="city" type="hidden" value="">
							<input class="billing_address_2" name="district" type="hidden" value="">
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div>
            <hr class="mb-4">
              <h4 class="mb-3">Phương Thức Thanh Toán</h4>
              <div class="payment ">
                <div class="radio">
                  <input type="radio" name="delivery" checked value="COD" checked><span class="w3-margin-left">Thanh toán khi nhận hàng</span>
                </div>
                <div class="radio">
                  <input type="radio" name="delivery" value="BANK"><span class="w3-margin-left">Thanh toán chuyển khoản</span>
                  <p><span class="w3-margin">STK: 10278277388</span></p>
									<p><span class="w3-margin">Tên: NGUYEN HAI DANG</span></p>
									<p><span class="w3-margin">Ngân Hàng: VIETCOMBANK</span></p>
									<p><span class="w3-margin">Nội Dung Chuyển Khoản: tên người chuyển</span></p>
                </div>
              </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="checkout">Thanh Toán</button>
          </form>
        </div>
      </div>

      
    </div>
    <footer class="my-5 pt-5 text-muted text-center text-small">
        <?php
        include('layout/footer.html');
        ?>
      </footer>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="../../../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<script src='https://cdn.jsdelivr.net/gh/vietblogdao/js/districts.min.js'></script>
	<script>//<![CDATA[
	if (address_2 = localStorage.getItem('address_2_saved')) {
	$('select[name="calc_shipping_district"] option').each(function() {
		if ($(this).text() == address_2) {
		$(this).attr('selected', '')
		}
	})
	$('input.billing_address_2').attr('value', address_2)
	}
	if (district = localStorage.getItem('district')) {
	$('select[name="calc_shipping_district"]').html(district)
	$('select[name="calc_shipping_district"]').on('change', function() {
		var target = $(this).children('option:selected')
		target.attr('selected', '')
		$('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
		address_2 = target.text()
		$('input.billing_address_2').attr('value', address_2)
		district = $('select[name="calc_shipping_district"]').html()
		localStorage.setItem('district', district)
		localStorage.setItem('address_2_saved', address_2)
	})
	}
	$('select[name="calc_shipping_provinces"]').each(function() {
	var $this = $(this),
		stc = ''
	c.forEach(function(i, e) {
		e += +1
		stc += '<option value=' + e + '>' + i + '</option>'
		$this.html('<option value="">Tỉnh / Thành phố</option>' + stc)
		if (address_1 = localStorage.getItem('address_1_saved')) {
		$('select[name="calc_shipping_provinces"] option').each(function() {
			if ($(this).text() == address_1) {
			$(this).attr('selected', '')
			}
		})
		$('input.billing_address_1').attr('value', address_1)
		}
		$this.on('change', function(i) {
		i = $this.children('option:selected').index() - 1
		var str = '',
			r = $this.val()
		if (r != '') {
			arr[i].forEach(function(el) {
			str += '<option value="' + el + '">' + el + '</option>'
			$('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>' + str)
			})
			var address_1 = $this.children('option:selected').text()
			var district = $('select[name="calc_shipping_district"]').html()
			localStorage.setItem('address_1_saved', address_1)
			localStorage.setItem('district', district)
			$('select[name="calc_shipping_district"]').on('change', function() {
			var target = $(this).children('option:selected')
			target.attr('selected', '')
			$('select[name="calc_shipping_district"] option').not(target).removeAttr('selected')
			var address_2 = target.text()
			$('input.billing_address_2').attr('value', address_2)
			district = $('select[name="calc_shipping_district"]').html()
			localStorage.setItem('district', district)
			localStorage.setItem('address_2_saved', address_2)
			})
		} else {
			$('select[name="calc_shipping_district"]').html('<option value="">Quận / Huyện</option>')
			district = $('select[name="calc_shipping_district"]').html()
			localStorage.setItem('district', district)
			localStorage.removeItem('address_1_saved', address_1)
		}
		})
	})
	})
	//]]></script>
  </body>
</html>
