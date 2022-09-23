<?php
 
$server= "mysql:host=localhost;dbname=userdata";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
if(isset($_GET['id']))
{
$id= $_GET['id'];
$sql= "DELETE FROM user WHERE id= $id";
$stmt= $conn->prepare($sql);
if($stmt->execute(['$id=> $id ']))
{
    header('location: viewuser.php');
}

}

?>