<?php
session_start();
include('../connect/connect.php');
var_dump($_SESSION['cart']);
if(isset($_POST['checkout'])){
    $name_customer=$_POST['name_customer'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $city=$_POST['city'];
    $district=$_POST['district'];
    $delivery=$_POST['delivery'];
}
    $sql="INSERT INTO `order_customer` (name_customer, phone, email, city, district, delivery) VALUES ('$name_customer', '$phone', '$email', '$city', '$district','$delivery')";
    if(mysqli_query($conn,$sql)){
        $last_id = mysqli_insert_id($conn);
        $sql1="INSERT INTO order_cart (last_id, name_product, number, fragant, price, subtotal) VALUES (?,?,?,?,?,?)";
        $stmt=mysqli_prepare($conn,$sql1);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt,"isiiii", $last_id, $name_product, $number, $fragant, $price, $subtotal);
            foreach($_SESSION['cart'] as $key => $values){
                $name_product=$values['name'];
                $fragant=$values['fragant'];
                $number=$values['number'];
                $price=$values['price'];
                $subtotal=$number*$price;
                mysqli_stmt_execute($stmt);
            }
            unset($_SESSION['cart']);
            header("location:../index.php");
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }
//Đóng database  
$conn->close();    
?> 