<?php
$server= "mysql:host=localhost;dbname=userdata";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$id= $_GET['id'];
$obj= $conn->query("SELECT * FROM user where ID='$id'");
$run= $obj->fetchAll(PDO::FETCH_ASSOC);
$active= $run['status'];
if(isset($_GET['id']))
{
    if($_GET['id']==$id)
    {
     $query=$conn->query("UPDATE user SET status = 0 WHERE ID=$id");
     

     header('location:viewuser.php');
     
    }
}
?>