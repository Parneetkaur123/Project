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
    header("location:home.php");
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
function userlogin()
{
    
$server= "mysql:host=localhost;dbname=userdata";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
    if(isset($_POST['submit']))
{
    
    $email= $_POST['email'];
    $password= $_POST['password'];
    $store=$conn->query('select * from user');
    $fetch= $store->fetchAll(PDO::FETCH_ASSOC);
    $msg=0;
    $count=0;
    if(empty($email) && empty($password))
    {
        echo "please fill both fields";
    }
    else
    {
    foreach($fetch as $key=>$value)
    {
        if($email==$value['Email'] && $password==$value['Password'])
        {
            if($value['status']==1)
            {
                header('location: userpanel.php');
            }
            else
            {
                $count++;
            }
        }
        else
        {
            $msg++;
        }
  
    }
    if($count>0)
    {
        echo "Inactive User ";
        exit();
    }
    if($msg>0)
    {
        echo "Invalid user";
    }
   }  
}

}
function usersignup()
{
    $server= "mysql:host=localhost;dbname=userdata";
    $username= "root";
    $password= "";
   
   $conn= new PDO($server, $username, $password);
   if(isset($_POST['submit']))
   {
     if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password']))
     {
         echo "Please fill all fields";
         exit();
     
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

}
?>