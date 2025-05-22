<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "dukundumurimo");
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query = "SELECT * FROM manager WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION['username'] = $username;
        header('location: nav.php');
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script type="text/javascript">
        function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
    </script>
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <div class="form-cont" >
        <form action="" method="POST">
            <h1>login</h1>
        <label>username:</label>
        <input type="text" name="username" required><br><br>
        <label>password:</label>
        <input type="password" name="password" required><br><br>
        <div class="btn">
            <input type="submit" name="submit" value="submit">
           
        </div>
        
                <button> <a href="manager_register.php"> Your are manager if does not have account create account</a></button>
           
</form>
</body>
</html>