<?php
class adlog
{
  public $user;
  public $pass; 

function login()
{

$server= "mysql:host=localhost;dbname=admin";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$sql= $conn->query("SELECT * FROM adminlogin");
$data= $sql->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{
$user= $_POST['username'];
$pass= $_POST['password'];

if(!empty($_POST['username']) && !empty($_POST['password']))
{
if($user==$data[0]['username'] && $pass==$data[0]['password'])
{
    header("location:../admin/home.php");
}
else
{
    echo "Username or Password is incorrect";
}
}
}
}
function createblog()
{
 $server= "mysql:host=localhost;dbname=blog";
 $username= "root";
 $password= "";

 $conn= new PDO($server, $username, $password);
 if(isset($_POST['submit']))
 {
    if(empty($_POST['tittle']) && empty($_POST['description']))
    {
        echo "please fill both fields";
    }
 else
    {
     $tittle= $_POST['tittle'];
     $description= $_POST['description'];

     $conn->exec("INSERT INTO blogs (tittle, description) VALUES('$tittle', '$description')");
     echo "record inserted";
    }
 }

}
function createuser()
{
    $server= "mysql:host=localhost;dbname=userdata";
   $username= "root";
   $password= "";

  $conn= new PDO($server, $username, $password);
  if(isset($_POST['submit']))
 {
    if(empty($_POST['name']))
    {
        echo "Please enter your name";
    
    }
    elseif(empty($_POST['email']))
    {
        echo "please enter your email";
    }
    elseif(empty($_POST['password']))
    {
        echo "password is must";
    }
   else
    {
      $name= $_POST['name'];
      $email= $_POST['email'];
      $pass= $_POST['password'];

      $sql= $conn->query("INSERT INTO user (Name, Email,Password) VALUES('$name','$email','$pass')");
      if($sql)
      {
          echo "user created";
      }
    }
 }

}
function sublogin()
{
    $server= "mysql:host=localhost;dbname=subusers";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$query= $conn->query("SELECT * FROM subuser");
$fetch= $query->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['submit']))
{
    $uname= $_POST['Email'];
    $pass= $_POST['password'];
    foreach($fetch as $key=>$value)
    {
        
    if($uname==$value['email'] && $pass==$value['password'])
    {
        echo "login";
        header('location: ../admin/home.php');
    }
    else
    {
        echo "incorrect  input";
    }
    }
}

}

}
?>