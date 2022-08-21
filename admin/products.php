<?php
session_start();
include('../haki/connectphp/connect.php');
include('layout/header_product.html');
?>
<body>
    <div class="container mt-10">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <h2 class="tm-block-title">TẤT CẢ SẢN PHẨM</h2>
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-large tm-product-table">
                <thead>
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Sản Phẩm</th>
                    <th scope="col">GIÁ</th>
                    <th scope="col">Số Lượng</th>
                    <th scope="col">Mô Tả</th>
                    <th scope="col">Loại</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $sql=mysqli_query($conn, "SELECT * FROM `sanpham`");
                  if(mysqli_num_rows($sql)>0){
                    while($row=mysqli_fetch_assoc($sql)){
                                    
                ?>
                  <tr>
                    <th scope="row"></th>
                    
                    <td><?php echo $row["tensp"]?></td>
                    <td><?php echo number_format($row["gia1"])?></td>
                    <td><?php echo $row["soluong"]?></td>
                    <td><?php echo $row["mota"]?></td>
                    <td><?php echo $row["phanloai"]?></td>
                    <form action="edit_product.php" method="post">
                      <input type="hidden" name="id" value="<?php echo $row["id"]?>">
                      <input type="hidden" name="tensp" value="<?php echo $row["tensp"]?>">
                      <input type="hidden" name="gia1" value="<?php echo $row["gia1"]?>">
                      <input type="hidden" name="soluong" value="<?php echo $row["soluong"]?>">
                      <input type="hidden" name="mota" value="<?php echo $row["mota"]?>">
                      <input type="hidden" name="phanloai" value="<?php echo $row["phanloai"]?>">
                    <td>
                      <input type="submit" class="btn btn-primary" name="btn_edit" value="Chỉnh sửa"></input>
                    </td>
                    </form>
                    <form action="database/delete_product.php" method="post">
                    <td>
                      <input type="hidden" name="id" value="<?php echo $row["id"]?>"> 
                      <input type="submit" class="btn btn-primary" name="btn_delete" value="Xóa"></input>
                    </td>
                    </form>
                  </tr>
                <?php
                    }
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="add-product.php"
              class="btn btn-primary btn-block text-uppercase mb-3">Thêm Sản Phẩm Mới</a>
          </div>
        </div>
      </div>
    </div>

    <?php
    include('layout/footer.html');
    ?>
  </body>
</html>