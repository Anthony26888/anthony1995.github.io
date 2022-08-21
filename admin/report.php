<?php
include('layout/header_report.html');
include('../haki/connectphp/connect.php');

?>
<body>
        <div class="container mt-10">
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
                <div class="tm-bg-primary-dark tm-block tm-block-products">
                    <h2 class="tm-block-title">PHẢN HỒI CỦA KHÁCH HÀNG</h2>
                    <div class="tm-product-table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Họ và Tên</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tiêu đề</th>
                                    <th scope="col">Phản hồi</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $sql=mysqli_query($conn, "SELECT * FROM `report`");
                                if(mysqli_num_rows($sql)>0){
                                    while($row=mysqli_fetch_assoc($sql)){
                                    
                            ?>
                                <tr>
                                    <td><?php echo$row["fullname"]?></td>
                                    <td><b><?php echo$row["email"]?></b></td>
                                    <td><b><?php echo$row["title"]?></b></td>
                                    <td><b><?php echo$row["message"]?></b></td>
                                    <td><?php echo date("d/m/Y")." ".date("h:i");?></td>
                                    <form action="database/delete_report.php" method="post">
                                    <td>
                                        <input type="hidden" name="id" value="<?php echo$row["id"]?>"></input>
                                        <input type="submit" class="btn btn-primary" name="btn_delete_report" value="Xóa"></input>
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
                </div>
            </div>
        </div>
        <?php
    include('layout/footer.html');
    ?>
</body>

</html>