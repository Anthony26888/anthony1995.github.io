<?php
include('../../haki/connectphp/connect.php');
$level="";
$fullname="";
$username="";
$password="";
$email="";
$address="";
$phone="";
$gender="";

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["level"])) { $level = $_POST['level']; }
    if(isset($_POST["fullname"])) { $fullname = $_POST['fullname']; }
    if(isset($_POST["username"])) { $username = $_POST['username']; }
    if(isset($_POST["password"])) { $password = $_POST['password']; }
    if(isset($_POST["email"])) { $email = $_POST['email']; }
    if(isset($_POST["address"])) { $address = $_POST['address']; }
    if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
    if(isset($_POST["gender"])) { $gender = $_POST['gender']; }
    
    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO user (level, fullname, username, password, email, phone) VALUES ('$level', '$fullname', '$username', md5('$password'), '$email', '$phone')";
    
    if ($conn->query($sql) === TRUE) {
        header("location:../accounts.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
//Đóng database
$conn->close();   

?>