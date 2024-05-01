<?php


$conn = mysqli_connect("localhost", "root", "", "math");
$nazwa = $_POST["nazwa"];
$email = $_POST["email"];
$haslo = $_POST["haslo"];

$sql = "INSERT INTO `users`(id, nazwa, email, haslo) VALUES (NULL, '$nazwa',$email,$haslo)";

mysqli_query($conn, $sql);

echo "Dodano rezrwację do bazy";

mysqli_close($conn);
?>