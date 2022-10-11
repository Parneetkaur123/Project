<?php
session_start();
include "pdoconn.php";
class admin
{
 public $user;
  public $pass; 

   function login()
   {
     include "pdoconn.php";
     
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
    include "pdoconn.php";
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

         $conn->exec("INSERT INTO blog (tittle, description) VALUES('$tittle', '$description')");
         echo "record inserted";
        }
     }

    }
  function createuser()
  {
    include "pdoconn.php";
     if(isset($_POST['submit']))
       {
         if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password']))
           {
             echo "Please fill all fields";
             exit();
    
            }
            elseif($_POST['email']== "admin@gmail.com")
            {
              echo "please enter valid email";
              exit();
            }
    
         else
           {
              $name= $_POST['name'];
              $email= $_POST['email'];
              $pass= $_POST['password'];

             $sql= $conn->query("INSERT INTO users (Name, Email,Password) VALUES('$name','$email','$pass')");
              if($sql)
              {
                 echo "user created";
              }
           }
        }

    }
 function createsub()
   {
    include "pdoconn.php";
     if(isset($_POST['submit']))
      {
           $name= $_POST['username'];
            $email= $_POST['email'];
            $password= $_POST['password'];

          if(empty($name) || empty($email) ||  empty($password))
          {
              echo "please fill all fields";
          }
            elseif($_POST['email']== "admin@gmail.com")
            {
             echo "please enter valid email";
             exit();
            }

          
          else
          {
            $sql= $conn->query("insert into subadmin  (name, email, password) values('$name', '$email', '$password')");
            
            if($sql)
             {
             echo "successfully";
             }
          }
       }
    }
  function deactiveuser()
   {
    include "pdoconn.php";
     $id= $_GET['id'];
     $obj= $conn->query("SELECT * FROM users where ID='$id'");
     $run= $obj->fetchAll(PDO::FETCH_ASSOC);
     $active= $run['status'];
     if(isset($_GET['id']))
      {
          if($_GET['id']==$id)
          {
             $query=$conn->query("UPDATE users SET status = 0 WHERE ID=$id");
     

             header('location:viewuser.php');
     
           }
       }
    }
   function activeuser()
   {
    include "pdoconn.php";
      $id= $_GET['id'];
      $obj= $conn->query("SELECT * FROM users where ID='$id'");
      $run= $obj->fetchAll(PDO::FETCH_ASSOC);

       if(isset($_GET['id']))
       {
           if($_GET['id']==$id)
          {
              $query=$conn->query("UPDATE users SET status = 1 WHERE ID=$id");
              header('location:viewuser.php');
          }
       }

    }
  
    function delblog()
   {
    include "pdoconn.php";
     $id= $_GET['id'];
     $sql= "DELETE FROM blog WHERE id= $id";
     $stmt= $conn->prepare($sql);
       if($stmt->execute(['$id=> $id ']))
       {
         header('location: viewblog.php');
       }
    }
  
    function delsub()
   {
    include "pdoconn.php";
     $id= $_GET['id'];
     $sql= "DELETE FROM subadmin WHERE id= $id";
     $stmt= $conn->prepare($sql);
     
     if($stmt->execute(['$id=> $id ']))
       {
          header('location: viewsub.php');
       }
   }
   
   function deluser()
   {
    include "pdoconn.php";
     if(isset($_GET['id']))
       {
         $id= $_GET['id'];
         $sql= "DELETE FROM users WHERE id= $id";
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
    include "pdoconn.php";
     $query= $conn->query("SELECT * FROM subadmin");
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
            echo "incorrect input";
            exit();
          }
            
        }
      }

}

}


class user
{
 function userlogin()
 {
    include "pdoconn.php";
      if(isset($_POST['submit']))
     {
    
         $email= $_POST['email'];
          $password= $_POST['password'];
          $store=$conn->query('select * from users');
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
                   $_SESSION['userid']= $value['ID'];
            
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
function usersignup()
{
  include "pdoconn.php";

  if(isset($_POST['submit']))
   {
     if(empty($_POST['name']) && empty($_POST['email']) && empty($_POST['password']))
     {
         echo "Please fill all fields";
         exit();
     }
     elseif($_POST['email']== "admin@gmail.com")
      {
        echo "please enter valid email";
        exit();
      }
    
      else
      {
        $name= $_POST['name'];
         $email= $_POST['email'];
         $pass= $_POST['password'];
         
        $sql= $conn->query("INSERT INTO users (Name, Email,Password) VALUES('$name','$email','$pass')");
        if($sql)
        {
          echo "user created";
        }
      }
    }
      
    
  }
}


function like()
{
  include "pdoconn.php";
  $blogid= $_GET['id'];
  $userid= $_GET['userid'];

  $obj= $conn->query("SELECT likes FROM ratinginfo where blog_id='$blogid' and user_id= '$userid' ");
  $run= $obj->fetchAll(PDO::FETCH_ASSOC);
  

  if($_GET['likes']==1)
  {
        if(empty($run))
        {
          $conn->query("INSERT into ratinginfo VALUES($blogid, $userid,1,0)");
          header ('location: ../user/userpanel.php');
        }
        else
        {
          
          $conn->exec("UPDATE ratinginfo SET likes= '1', dislikes='0' WHERE blog_id=$blogid and user_id=$userid");
          header ('location: ../user/userpanel.php');
        }
  }
 else
  {
    if(empty($run))
        {
          $conn->query("INSERT into ratinginfo VALUES($blogid, $userid,0,1)");
          header ('location: ../user/userpanel.php');
        }
        else
        {
          $conn->exec("UPDATE ratinginfo SET likes= '0', dislikes='1' WHERE blog_id=$blogid and user_id=$userid");
          header ('location: ../user/userpanel.php');
        }
  }
}


}

?>