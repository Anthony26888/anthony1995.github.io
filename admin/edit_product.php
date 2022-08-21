<?php
session_start();
include('layout/header_product.html');
include('../haki/connectphp/connect.php');
if(!isset($_SESSION['edit_product'])) $_SESSION['edit_product']=[];
//lấy dữ liệu từ form
if(isset($_POST['btn_edit'])&&($_POST['btn_edit'])){
  $id=$_POST['id'];
  $tensp=$_POST['tensp'];
  $gia1=$_POST['gia1'];
  $soluong=$_POST['soluong'];
  $mota=$_POST['mota'];
  $phanloai=$_POST['phanloai'];
  $edit_product=[$id, $tensp, $gia1, $soluong, $mota, $phanloai];
  $_SESSION['edit_product']=$edit_product;
  
  
}
?>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12">
                <h2 class="tm-block-title d-inline-block">Chỉnh sửa sản phẩm</h2>
              </div>
            </div>
            <div class="row tm-edit-product-row">
              <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="database/update_product.php" method="post" class="tm-edit-product-form" enctype="multipart/form-data">
                <?php
                  $sql=mysqli_query($conn, "SELECT * FROM `sanpham`WHERE id=$id");
                  if(mysqli_num_rows($sql)>0){
                    while($row=mysqli_fetch_assoc($sql)){
                                    
                ?>
                  <div class="form-group mb-3">
                    <label for="name">Tên sản phẩm</label>
                    <input type="hidden" name="id" value="<?php echo $row['id']?>"/>
                    <input name="tensp" type="text" value="<?php echo $row['tensp']?>" class="form-control validate"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="price">Giá</label>
                    <input class="form-control validate" name="gia1" value="<?php echo $row['gia1']?>"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="quality">Số Lượng</label>
                    <input name="soluong" type="number" value="<?php echo $row['soluong']?>" class="form-control validate"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="category">Phân Loại</label>
                    <input class="form-control validate" name="phanloai" value="<?php echo $row['phanloai']?>"/>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Mô Tả</label>
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                      required
                      name="mota"
                    ><?php echo $row['mota']?></textarea>
                  </div>
                  <div class="form-group mb-3">
                    <label for="description">Chi Tiết</label>
                    <textarea                    
                      class="form-control validate tm-small"
                      rows="5"
                      required
                      name="detail"
                    ><?php echo $row['detail']?></textarea>
                  </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="custom-file mt-3 mb-3">
                  <label for="category" style=color:white>Hình ảnh 1</label>
                  <input id="fileInput" type="file" name="hinhanh1" accept="image/png, image/jpg, image/jpeg" />
                </div>
                <div class="custom-file mt-3 mb-3">
                  <label for="category" style=color:white>Hình ảnh 2</label>
                  <input id="fileInput" type="file" name="hinhanh2" accept="image/png, image/jpg, image/jpeg"/>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <label for="category" style=color:white>Hình ảnh 3</label>
                  <input id="fileInput" type="file" name="hinhanh3" accept="image/png, image/jpg, image/jpeg"/>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <label for="category" style=color:white>Hình ảnh 4</label>
                  <input id="fileInput" type="file" name="hinhanh4" accept="image/png, image/jpg, image/jpeg"/>
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase" name="update">Cập nhật</button>
              </div>
              <?php
                    }
                  }
              ?>
            </form>
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
