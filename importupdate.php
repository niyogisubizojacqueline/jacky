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
            <h1></h1>
        <label>food_id:</label>
        <input type="text"name="food_id"require><br>
        <label>import_date:</label>
        <input type="date"name="import_date"require><br>
        <label>quantity:</label>
        <input type="text"name="quantity"require><br>
        <div class="btn">
            <button name="update">update</button>
        </div>
</form>
    </div>
    <div class="a">
            <button><a href="exportform.php">Go Back</a></button>
        </div>
</body>
</html>

<?php
$conn= new mysqli('localhost','root','','dukundumurimo');
if(isset($_POST['update'])) {
    $food_id=$_POST['food_id'];
    $import_date=$_POST['import_date'];
    $quantity=$_POST['quantity'];

    $sql="UPDATE `import` SET  `food_id`=`$food_id`,`import_date`='$import_date',`quantity`='$quantity' WHERE i_id='$_GET[i_id]'";
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "data updated successfully";
          header('location:importform.php');
    }else{
        echo "data not updated";
    }
}

?>
