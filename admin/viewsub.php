<?php
include "pdoconn.php";

$query= $conn->query("SELECT * FROM subadmin");
$fetch= $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body{
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
    td
    {
        border: 2px solid black;
        background: white;
        font-size: large;
    }
    th
    {
        border: 4px solid black;
        font-size: large;
        color: white;
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
    button2
    {
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
<h1>View Subser</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
        
        <?php
          foreach($fetch as $keys=>$values)
          {
        ?>
        <tr>
            <td><?php echo $values['name'] ?></td>
            <td><?php echo $values['email'] ?></td>
            <td><?php echo $values['password'] ?></td>
            <td><button1><?php echo "<a href=\"editsub.php?id=".$values['ID']."\">Edit</a>"?></button></td>
            <td><button2><?php echo "<a href=\"deletesub.php?id=".$values['ID']."\">Delete</a>"?></button></td>
        </tr>
        <?php
         }
        ?>


    </table>
    <a href="home.php">Back to home Page</a>
</body>
</html>
