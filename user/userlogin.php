<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
</head>
<style>
    body
    {
        background: #1690A7;
        /* display: flex; */
        justify-content: center;
        align-items: center;
        height: 100vh;
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
        margin-top: 10%;
        margin-left: 30%;
        
        
    }
    h2
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
<form action="userlogin.php?$status=$_GET['status']" method="post">
    <h2>User Login</h2>
    <label>User Email<label>
    <input type="email" name="email" />
    <label>Password</label>
    <input type="password" name="password"/>
    <button type="submit" name="submit" value="submit">Submit</button>
</form>

</body>
</html>
<?php
include "../admin/controller.php";
include "../admin/validations.php";
$validation= new validation();
$validation->valid();
$obj= new user();
$obj->userlogin();
?>
