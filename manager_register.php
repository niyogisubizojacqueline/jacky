<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-cont" >
        <form action=""method="POST">
            <h1>Register here</h1>
        <label>username:</label>
        <input type="text"name="username"require><br><br>
        <label>password:</label>
        <input type="password"name="password"require><br><br>
        <div class="btn">
            <input type="submit"name="submit"value="submit">
            <button><a href="manager_login.php">go to the logon form</a></button>
        </div>
</form>
    </div>
</body>
</html>
<?php
$conn=mysqli_connect("localhost","root","","dukundumurimo");
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query="INSERT INTO `manager`(username,password)VALUES('$username','$password')";
    $result=mysqli_query($conn,$query);
    if($result){
        echo "data inserted";
    }else{
        echo "data not inserted";
    }
}
