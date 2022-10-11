<?php
include "pdoconn.php";
  $store= $conn->query("SELECT * FROM blog");
 $fetch= $store->FetchAll(PDO::FETCH_ASSOC);

?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog</title>
</head>
<style>
    body
    {
        background:#1690A7;
    }
    h1
    {
        text-align: center;
        Background: white;
    }
    table
    {
        border: 3px solid black;
        width: 100%;
    }
    th,td{
        border: 3px solid black;
        background: white;
        font-size: large;
    }
    button1
    {
        background: #4FFF33;
        color: white;
        float: right;
        padding: 10px 15px;
       border-radius: 5px;
        margin-right: 10px;
        border: none;


    }
    button2{
        background: red;
        color: white;
        float: right;
        padding: 10px 15px;
        border-radius: 5px;
        margin-right: 10px;
        border: none;

    }
   
</style>
<body>
    <h1>View Blog</h1>
    <table>
        <tr>
        
            <th>Tittle</th>
            <th>Description</th>
            <th>Edit</th>
            <th>Delete</th>
          
       </tr>
       <?php
         foreach($fetch as $key=>$value)
         {
        ?>
       <tr>
            <td><?php echo $value['Tittle']; ?></td>
            <td><?php echo $value['Description'] ?></td>
            <td><button1><?php echo "<a href=\"edit.php?id=".$value['ID']."\">Edit</a>"?></button></td>
            <td><button2><?php echo "<a href=\"delete.php?id=".$value['ID']."\">Delete</a>"?></button></td>
         
        </tr>
        <?php
         }
        ?>
     
</table>

<a href="home.php">Back to home Page</a>
</body>
</html>



