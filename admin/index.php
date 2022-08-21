<?php
include('layout/header.html');
include('../haki/connectphp/connect.php');

?>
<body>
        <div class="container mt-10">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <h2 class="tm-block-title">DANH SÁCH ĐƠN HÀNG</h2>
                    <div class="tm-product-table-container">
                        <form action="database/delete_bill.php" method="post">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Mã Khách Hàng</th>
                                    <th scope="col">Tên</th>
                                    <th scope="col">SĐT</th>
                                    <th scope="col">Số Nhà</th>
                                    <th scope="col">Quận/Huyện</th>
                                    <th scope="col">Thành phố</th>
                                    <th scope="col">Ghi Chú</th>
                                    <th scope="col">Thanh toán</th>
                                    <th scope="col">Thời Gian</th>
                                    <th scope="col">Tổng đơn</th>
                                    <th scope="col">Đơn hàng</th>
                                    <th scope="col"></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql=mysqli_query($conn, "SELECT * FROM `order_product`");
                                if(mysqli_num_rows($sql)>0){
                                    while($row=mysqli_fetch_assoc($sql)){
                                        $id_cart=$row["id"];
                                    
                            ?>
                                <tr>
                                    <th scope="row"><b><?php echo$row["id"]?></b></th>
                                    <td><b><?php echo$row["fullname"]?></b></td>
                                    <td><b><?php echo$row["phone"]?></b></td>
                                    <td><?php echo$row["address"]?></td>
                                    <td><?php echo$row["district"]?></td>
                                    <td><?php echo$row["city"]?></td>
                                    <td><?php echo$row["note"]?></td>
                                    <td><?php echo$row["delivery"]?></td>
                                    <td><?php echo date("d/m/Y")." ".date("h:i");?></td>
                                    <td><?php echo number_format($row["sub_total"])?></td>
                                    <input type="hidden" name="id" value="<?php echo$row["id"]?>"></input>
                                    
                                    <td>
                                        <table class="table-text-center">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Sản Phẩm</th>
                                                    <th scope="col">Số Lượng</th>
                                                    <th scope="col">Thành Tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql1=mysqli_query($conn, "SELECT * FROM `order_cart` WHERE last_id=$id_cart");
                                                if(mysqli_num_rows($sql1)>0){
                                                    while($row=mysqli_fetch_assoc($sql1)){
                                                    
                                                ?>
                                                <tr>
                                                <tr>
                                                    <td><b><?php echo$row["tensp"]?></b></td>
                                                    <td><b><?php echo$row["soluong"]?></b></td>
                                                    <td><?php echo number_format($row["thanhtien"])?></td>
                                                    
                                                </tr>
                                                <input type="hidden" name="last_id" value="<?php echo$row["last_id"]?>"></input>
                                                <?php        
                                                    }
                                                }

                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </td>
                                    <td>
                                        <input type="submit" class="btn btn-primary" name="btn_delete_bill" value="Xóa"></input>
                                    </td>
                                    </form>
                                </tr>
                            </tbody>
                            <?php        
                                    }
                                }

                            ?>
                            
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>
    <?php
    include('layout/footer.html');
    ?>
</body>

</html>