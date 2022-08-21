<?php
include('../../haki/connectphp/connect.php');
if(isset($_POST['add_product'])){
    $tensp=$_POST['tensp'];
    $gia1=$_POST['gia1'];
    $soluong=$_POST['soluong'];
    $mota=nl2br($_POST['mota']);
    $phanloai=$_POST['phanloai'];
    $detail=nl2br($_POST['detail']);
    //hình ảnh 1
    $hinhanh1=$_FILES['hinhanh1']['name'];
    $hinhanh1_tmp_name=$_FILES['hinhanh1']['tmp_name'];
    $hinhanh1_folder='../../image_product/'.$hinhanh1;
    //hình ảnh 2
    $hinhanh2=$_FILES['hinhanh2']['name'];
    $hinhanh2_tmp_name=$_FILES['hinhanh2']['tmp_name'];
    $hinhanh2_folder='../../image_product/'.$hinhanh2;
    //hình ảnh 3
    $hinhanh3=$_FILES['hinhanh3']['name'];
    $hinhanh3_tmp_name=$_FILES['hinhanh3']['tmp_name'];
    $hinhanh3_folder='../../image_product/'.$hinhanh3;
    //hình ảnh 4
    $hinhanh4=$_FILES['hinhanh4']['name'];
    $hinhanh4_tmp_name=$_FILES['hinhanh4']['tmp_name'];
    $hinhanh4_folder='../../image_product/'.$hinhanh4;
    
    
}
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO sanpham (tensp, gia1, soluong, mota, hinhanh1, hinhanh2, hinhanh3, hinhanh4, detail, phanloai) VALUES ('$tensp', '$gia1', '$soluong', '$mota', '$hinhanh1', '$hinhanh2', '$hinhanh3', '$hinhanh4', '$detail', '$phanloai')";
    
    if ($conn->query($sql) === TRUE) {
        move_uploaded_file($hinhanh1_tmp_name, $hinhanh1_folder);
        move_uploaded_file($hinhanh2_tmp_name, $hinhanh2_folder);
        move_uploaded_file($hinhanh3_tmp_name, $hinhanh3_folder);
        move_uploaded_file($hinhanh4_tmp_name, $hinhanh4_folder);
        header("location:../products.php");
    } else {
        $message[] = 'could not add the product';
    }

//Đóng database
$conn->close();   


?>