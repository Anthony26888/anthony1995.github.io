<?php
include('../connect/connect.php');
if(isset($_POST['report'])){
    $email=$_POST['email'];
    $content=$_POST['content'];
    $title=$_POST['title'];
}

$sql="INSERT INTO report (email, title, content) VALUES ('$email', '$title', '$content')";
if (mysqli_query($conn, $sql)){
    header("location:../contact.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
?>