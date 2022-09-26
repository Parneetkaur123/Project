<?php
 include "pdoconnec.php";
class admin
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
 function createsub()
   {
     $server= "mysql:host=localhost;dbname=subusers";
     $username= "root";
     $password= "";
   
     $conn= new PDO($server, $username, $password);
     if(isset($_POST['submit']))
      {
           $name= $_POST['username'];
            $email= $_POST['email'];
            $password= $_POST['password'];

          if(empty($name) || empty($email) ||  empty($password))
          {
              echo "please fill all fields";
          }
          else
          {
             $query=$conn->query("INSERT INTO subuser (name, email, password) VALUES ('$name', '$email', '$password');");
             echo "Sub admin created";
          }
       }
    }
  function deactiveuser()
   {
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
    }
   function activeuser()
   {
       $server= "mysql:host=localhost;dbname=userdata";
      $username= "root";
     $password= "";

      $conn= new PDO($server, $username, $password);
      $id= $_GET['id'];
      $obj= $conn->query("SELECT * FROM user where ID='$id'");
      $run= $obj->fetchAll(PDO::FETCH_ASSOC);

       if(isset($_GET['id']))
       {
           if($_GET['id']==$id)
          {
              $query=$conn->query("UPDATE user SET status = 1 WHERE ID=$id");
              header('location:viewuser.php');
          }
       }

    }
  
    function delblog()
   {
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
    }
  
    function delsub()
   {
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
   }
   
   function deluser()
   {
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

   }
  
}


class subadmin
{
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


class user
{
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

function like()
{
  $server= "mysql:host=localhost;dbname=blog";
  $username= "root";
  $password= "";

  $conn= new PDO($server, $username, $password);
  $id= $_GET['id'];
  $obj= $conn->query("SELECT * FROM blogs where ID='$id'");
  $run= $obj->fetchAll(PDO::FETCH_ASSOC);
  $likes= $run['likes'];
  if(isset($_GET['id']))
  {
      if($_GET['id']==$id)
      {
    
           $query= $conn->query("UPDATE blogs SET likes= likes+1 where ID= $id");
      
          header('location: userpanel.php');
        
     }
}
}

function dislike()
{
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
}
}
?>