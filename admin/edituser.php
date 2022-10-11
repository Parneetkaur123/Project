<?php
include "pdoconn.php";
    
   if(isset($_GET['id']))
   {
    $id= $_GET['id'];
    $sql= $conn->query("SELECT * FROM users where ID= $id");
    $store= $sql->fetch(PDO::FETCH_ASSOC);
    $name= $store['Name'];
    $email= $store['Email'];
    $pass= $store['Password'];
   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
  
 body
    {
        background-color: #1690a7;
        justify-content: center;
        align-items: center;
        
    }
    *{
        font-family: sans-serif;
        box-sizing: border-box;
    }
    form
    {
        width: 500px;
        border: 2px solid #ccc;
        padding: 30px;
        background: #fff;
        border-radius:15px;
        margin-top: 8%;
        margin-left: 30%;
        
        
    }
    h1
    {
        text-align: center;
        margin:bottom: 40px;
    }
    input
    {
        display: block;
        border: 2px solid #ccc;
        width: 95%;
        padding: 10px;
        margin: 10px auto;
        border-radius: 5px;
    }
    label
    {
        color: 888;
        font-size: 18px;
        padding: 10px;
    }
    button
    {
        float: right;
        background: #555;
        padding: 10px 15px;
        color: #fff;
        border-radius: 5px;
        margin-right: 10px;
        border: none;
    }
    button:hover
    {
        cursor: pointer;
        background-color: red;
    }


    </style>
<body>
    <form action= "edituser.php?id= <?php echo $_GET['id'] ?>" method="post">
        <h1>Edit User</h1>
        <label>Name<label>
        <input type= "text" name="name"  value="<?php echo $name ?>"/><br><br>
        <label>Email<label>
        <input type="email" name="email"  value="<?php echo $email ?>"/><br><br>
        <label>Password</label>
        <input type="text" name="password" value="<?php echo $pass ?>"/><br><br>
        <!-- <label>Confirm Password</label>
        <input type="password" name="confirmpassword" value=""/><br><br> -->
        <button type="submit" name="submit" value="submit">Submit</button>
        <a href="viewuser.php">Back</a>
      
    </form>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    $id= $_GET['id'];
    $name= $_POST['name'];
    $email= $_POST['email'];
    $pass= $_POST['password'];
    
    if(empty($name) && empty($email) && empty($pass))
    {
        echo "all fields are mandatory";
        exit();
    }
    elseif(empty($name))
    {
        echo "name is mandatory";
        exit();
    }
    elseif(empty($email))
    {
        echo "email is mandatory";
        exit();
    }
    elseif(empty($pass))
    {
        echo "password is mandatory";
        exit();
    }
   
    else
    {
        $conn->exec("UPDATE users SET Name = '$name', Email = '$email', Password = '$pass' WHERE ID=$id");
        header('location: viewuser.php');
    }
}
?>

    
