<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
<div class="form" >
        <form action=""method="POST">
            <h1>register</h1>
       
        <label>food_name:</label>
        <input type="text"name="food_name"require><br><br>
        <label>food_ownername:</label>
        <input type="text"name="food_ownername"require><br><br>
        <div class="btn">
            <button name="update">update</button>
        </div>
        
</form>

    </div>
</body>
</html>
<?php
$conn= new mysqli('localhost','root','','dukundumurimo');
if(isset($_POST['update'])) {
    $food_name=$_POST['food_name'];
    $food_ownername=$_POST['food_ownername'];
    $sql="UPDATE `food` SET `food_name`='$food_name',`food_ownername`='$food_ownername'
     WHERE food_id='$_GET[food_id]'"; 
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "data updated successfully";
          header('location:foodform.php');

    }else{
        echo "data not updated";
    }
}

?>
