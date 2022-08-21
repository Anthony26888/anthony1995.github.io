<?php
include('../../haki/connectphp/connect.php');
if(isset($_POST['btn_delete_report'])){
    $id=$_POST['id'];
}   
    //Code xử lý, insert dữ liệu vào table
    $sql = "DELETE FROM report WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("location:../report.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

//Đóng database
$conn->close();   


?>