<?php
$server= "mysql:host=localhost;dbname=blog";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$id= $_GET['id'];
$sql= "DELETE FROM blogs WHERE id= $id";
$stmt= $conn->prepare($sql);
if($stmt->execute(['$id=> $id ']))
{
    header('location: viewblog.php');
}

?>