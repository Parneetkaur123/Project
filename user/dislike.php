<?php
$server= "mysql:host=localhost;dbname=blog";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$id= $_GET['id'];
$obj= $conn->query("SELECT * FROM blogs where ID='$id'");
$run= $obj->fetchAll(PDO::FETCH_ASSOC);


if(isset($_GET['id']))
{
    if($_GET['id']==$id)
    {
        $query= $conn->query("UPDATE blogs SET dislikes= likes-1 where ID= $id");
        header('location: userpanel.php');
       
       
    }
}
?>