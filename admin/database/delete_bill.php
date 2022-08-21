<?php
include('../../haki/connectphp/connect.php');
if(isset($_POST['btn_delete_bill'])){
    $id=$_POST['id'];
    $last_id=$_POST['last_id'];
}   
    //Code xử lý, insert dữ liệu vào table
    $sql = "DELETE FROM order_product WHERE id=$id";
    $sql1 = "DELETE FROM order_cart WHERE last_id=$last_id";
    
    if ($conn->query($sql) === TRUE) {
        header("location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    if ($conn->query($sql1) === TRUE) {
        header("location:../index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();  

?>