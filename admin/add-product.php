<?php
include('../haki/connectphp/connect.php');
include('layout/header_product.html');
?>
   
<body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Thêm Sản Phẩm Mới</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="database/add_product.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                  <div class="form-group mb-3">
                    <label for="name">Tên sản phẩm</label>
                    <input name="tensp" type="text" value="" class="form-control validate"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Giá</label>
                    <input class="form-control validate" name="gia1" value=""/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Số Lượng</label>
                    <input name="soluong" type="number" value="" class="form-control validate"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="name">Phân Loại</label>
                    <input name="phanloai" type="text" value="" class="form-control validate"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Mô Tả</label>
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                      required
                      name="mota"
                    ></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Chi Tiết</label>
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                      required
                      name="detail"
                    ></textarea>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                  <div class="custom-file mt-3 mb-3">
                    <label for="category" style=color:white>Hình ảnh 1</label>
                    <input id="fileInput" type="file" name="hinhanh1" accept="image/png, image/jpg, image/jpeg" required/>
                  </div>
                  <div class="custom-file mt-3 mb-3">
                    <label for="category" style=color:white>Hình ảnh 2</label>
                    <input id="fileInput" type="file" name="hinhanh2" accept="image/png, image/jpg, image/jpeg" required/>
                  </div>
                  <div class="custom-file mt-3 mb-3">
                    <label for="category" style=color:white>Hình ảnh 3</label>
                    <input id="fileInput" type="file" name="hinhanh3" accept="image/png, image/jpg, image/jpeg" required/>
                  </div>
                  <div class="custom-file mt-3 mb-3">
                    <label for="category" style=color:white>Hình ảnh 4</label>
                    <input id="fileInput" type="file" name="hinhanh4" accept="image/png, image/jpg, image/jpeg" required/>
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block text-uppercase" name="add_product">Cập nhật</button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php
    include('layout/footer.html');
    ?>
  </body>
</html>
