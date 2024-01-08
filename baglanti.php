<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "feedback"; 


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}


$name = mysqli_real_escape_string($conn, $_POST["name"]);
$mail = mysqli_real_escape_string($conn, $_POST["mail"]);
$message = mysqli_real_escape_string($conn, $_POST["message"]);


$sql = "INSERT INTO iletisim (name, mail, message) VALUES ('$name', '$mail', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Veriler başarıyla kaydedildi.";
} else {
    echo "Hata: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>
