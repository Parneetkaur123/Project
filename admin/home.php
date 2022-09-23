<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
</head>
<style>
    body
    {
        background: #1690A7;
    }
    h1
    {
        text-align: center;
        background: white;
    }
    box
    {
        border: 1px solid #ccc;
        background: white;
        width: 20%;
        font-family: sans-serif;
    }
    li{
        background: white;
        margin-right: 80%;
        border-radius: 5px;
        box-shadow: white;
    }
    button
    {
        background: red;
        color: white;
        float: right;
        padding: 10px 15px;
        border-radius: 5px;
        margin-right: 10px;
        border: none;
        margin-left: 90%;
        font-size: large;
    }
</style>
<body>
    <h1>Welcome to the Admin Page</h2>
    <ul id="box">
        <h2><li><a href="createblog.php">Create Blog</a></li><br><br>
        <li><a href="viewblog.php">View Blog</a></li><br><br>
        <li><a href="createuser.php">Create User</a></li><br><br>
        <li><a href="viewuser.php">View User</a></li><br><br>
        <li><a href="createsub.php">Create Sub Admin</a></li><br><br>
        <li><a href="viewsub.php">View Sub admin</a></li><br><br></h2>
</ul>
<button><a href="adminlogin.php">Logout</a></button>
</body>
</html>