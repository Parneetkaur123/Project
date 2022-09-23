<?php
$server= "mysql:host=localhost;dbname=userdata";
$username= "root";
$password= "";

$conn= new PDO($server, $username, $password);
$obj= $conn->query("SELECT * FROM user");
$run= $obj->fetchAll(PDO::FETCH_ASSOC)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View User</title>
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
    <h1>View User</h1>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Password</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Active</th>
            <th>Inactive</th>
            <th>Status</th>
        </tr>
        
        <?php
          foreach($run as $key=>$value)
          {
        ?>
        <tr>
            <td><?php echo $value['Name'] ?></td>
            <td><?php echo $value['Email'] ?></td>
            <td><?php echo $value['Password'] ?></td>
            <td><button1><?php echo "<a href=\"edituser.php?id=".$value['ID']."\">Edit</a>"?></button></td>
            <td><button2><?php echo "<a href=\"deluser.php?id=".$value['ID']."\">Delete</a>"?></button></td>
            <td><button1><?php echo "<a href=\"active.php?id=".$value['ID']."\">Active</a>"?></button></td>
            <td><button2><?php echo "<a href=\"deactive.php?id=".$value['ID']."\">Deactive</a>"?></button></td>
            <td>
                <?php 
                // echo $value['status']
                if($value['status']==0)
                {
                    echo "deactive";
                }
                if($value['status']==1)
                {
                    echo "active";
                }
                ?>
                </td>
        </tr>
        <?php
         }
        ?>


    </table>
    <a href="home.php">Back to home Page</a>
</body>
</html>