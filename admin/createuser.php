<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
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
    <form action= "" method="post">
        <h1>Create User</h1>
        <label>Name<label>
        <input type= "text" name="name" placeholder="enter name"/><br><br>
        <label>Email<label>
        <input type="email" name="email" placeholder="enter email"/><br><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="enter Password"/><br><br>
        <button type="submit" name="submit" value="submit">Submit</button>
        <a href="home.php">Back to home page</a>
    </form>
</body>
</html>
<?php
include "controller.php";
$obj= new admin();
$obj->createuser();
?>