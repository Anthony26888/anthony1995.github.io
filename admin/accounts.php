<?php
include('../haki/connectphp/connect.php');
include('layout/header_account.html');

?>
    <form action="database/add_admin.php" class="tm-signup-form row" method="post">
      <div class="container mt-5">
        <!-- row -->
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-settings">
              <h2 class="tm-block-title">Đăng ký Tài Khoản Admin</h2>
                <select class="custom-select" name="level">
                  <option value="0">Lựa Chọn Tài Khoản</option>
                  <option value="Admin">Admin</option>
                  <option value="Quản Lý">Quản Lý</option>
                  <option value="Nhân Viên">Nhân Viên</option>
                  <option value="Lao Công">Lao Công</option>
                </select>
              
                <div class="form-group col-lg-12">
                  <label for="name">Họ và Tên</label>
                  <input
                    id="name"
                    name="fullname"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-12">
                  <label for="name">Tên Tài Khoản</label>
                  <input
                    id="name"
                    name="username"
                    type="text"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-12">
                  <label for="password">Mật Khẩu</label>
                  <input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-12">
                  <label for="email">Email</label>
                  <input
                    id="email"
                    name="email"
                    type="email"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-12">
                  <label for="phone">SĐT</label>
                  <input
                    id="phone"
                    name="phone"
                    type="tel"
                    class="form-control validate"
                  />
                </div>
                <div class="form-group col-lg-12">
                  <label class="tm-hide-sm">&nbsp;</label>
                  <input
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                    value="Cập Nhật Tài Khoản"
                    name="btn_admin"
                  >
                  </input>
                </div>
                <div class="col-12">
                  <input
                    type="submit"
                    class="btn btn-primary btn-block text-uppercase"
                    value="Xóa Tài Khoản"
                  >
                  </input>
                </div>
              
            </div>
          </div>
        </div>
    </form>
  </div>
    <?php
    include('footer.html');
    ?>
  </body>
</html>
