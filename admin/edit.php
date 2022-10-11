<?php
include "pdoconn.php";
  if(isset($_GET['id']))
 {
 $id= $_GET['id'];
 $data = $conn->query( "SELECT * FROM blog WHERE id= $id");
 $fetch = $data->fetch(PDO::FETCH_ASSOC);
 $tittle= $fetch['Tittle'];
 $des= $fetch['Description'];
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit blog</title>
</head>
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
    
<form action="edit.php?id= <?php echo $_GET['id'] ?>" method="post">

<h1>Edit Blog</h1>
<label>Add Tittle</label>
<input  type="text" name="tittle" value="<?php echo $tittle ?>" /><br><br>
<label>Add Description</label>
<input  type="text" name="description" value="<?php  echo $des ?>" /><br><br>
<button type="submit" name="submit" value="submit"/>Submit</button><br><br>
<a href="viewblog.php">Back</a>
</form>
</body>
</html>

<?php 
   if(isset($_POST['submit']))
    {
      $id= $_GET['id'];
      $tittle= $_POST['tittle'];
      $description= $_POST['description'];
      if(empty($tittle) && empty($description))
      {
        echo "please fill both fields";
        exit();
      }
      elseif(empty($_POST['tittle']))
      {
        echo "tittle is mandatory";
        exit();
      }
      elseif(empty ($_POST['description']))
      {
        echo "description is mandatory";
        exit();
      }
    else
    {
      $conn->exec("UPDATE blog SET Tittle= '$tittle', Description= '$description' where ID='$id'");
      header('location: viewblog.php');
    }
    }
 

?> 

       
       



