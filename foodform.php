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
            <input type="submit"name="submit"value="submit">
        </div>

</form>
    </div>
    <div class="a">
            <button><a href="nav.php">Go Back</a></button>
        </div>
</body>
</html>
<?php
$conn= new mysqli('localhost','root','','dukundumurimo');
if(isset($_POST['submit'])) {
    $food_name=$_POST['food_name'];
    $food_ownername=$_POST['food_ownername'];
    $sql="INSERT INTO `food`(`food_name`, `food_ownername`) VALUES ('$food_name','$food_ownername')"; 
    $res=mysqli_query($conn,$sql);
    if($res){
        echo "data inserted successfully";
    }else{
        echo "data not inserted";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php
   $conn= new mysqli('localhost','root','','dukundumurimo');
   $sql="SELECT * FROM `food`";
   $res=mysqli_query($conn,$sql);
   ?> 

   <table border="2">
<tr>
    <th>food_id</th>
    <th>food_name</th>
    <th>food_ownername</th>
    <th colspan="2">action</th>
</tr>
<tr>
<?php
while($row=mysqli_fetch_assoc($res)){
    ?>
    <td><?php echo $row['food_id'];?></td>
    <td><?php echo $row['food_name'];?></td>
    <td><?php echo $row['food_ownername'];?></td>
    <td><a href="foodupdate.php?food_id=<?php echo $row['food_id'];?>">update</a></td>
    <td><a href="fooddelete.php?food_id=<?php echo $row['food_id'];?>">delete</a></td>
</tr>
<?php
}
?>
</tr>
   </table>
</body>
</html>