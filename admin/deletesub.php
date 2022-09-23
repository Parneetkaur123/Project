<?php
$server= "mysql:host=localhost;dbname=subusers";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$id= $_GET['id'];
$sql= "DELETE FROM subuser WHERE id= $id";
$stmt= $conn->prepare($sql);
if($stmt->execute(['$id=> $id ']))
{
    header('location: viewsub.php');
}

?>