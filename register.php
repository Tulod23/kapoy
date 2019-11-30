<?php 
    session_start();
$db =mysqli_connect("localhost", "root", "", "authdb");
if (isset($_POST['register_btn'])){
    
    $username = mysqli_character_set_name($_POST['username']);
    $email = mysqli_character_set_name($_POST['email']);
    $password = mysqli_character_set_name($_POST['password']);
    $password2 = mysqli_character_set_name($_POST['password2']);


    if ($password == $password2){
        $password = md5($password);
        $sql = "INSERT INTO users(username,email,password) VALUES ('$username', '$email', '$password')";
        mysqli_query($db, $sql);
        $_SESSION['message'] = "You are now registered in";
        $_SESSION['username'] = $username;
        header("location: home.php");   
    }else{
        $_SESSION['message'] = "THE two passwords do not match";

    }
}

?>





<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
<link rel="stylesheet" types="text/css" href="style.css">
</head>
<body>
<div class="header">
<h1>Register Now</h1>
</div>

    <form method="post" action="register.php">
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" class="textInput"></td>
            </tr>
            <tr>
                <td>Email Address:</td>
                <td><input type="email" name="email" class="textInput"></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="Password" name="Password" class="textInput"></td>
            </tr>
            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register"></td>
            </tr>
        </table>
    </form>


</body>
</html>
