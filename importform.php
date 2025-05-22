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
$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['submit'])) {
    $food_id = $_POST['food_id'];
    $import_date = $_POST['import_date'];
    $quantity = $_POST['quantity'];

    $sql = "INSERT INTO `import` (food_id, import_date, quantity) VALUES ('$food_id', '$import_date', '$quantity')";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Data inserted successfully!";
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
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
   $sql="SELECT * FROM `import`";
   $res=mysqli_query($conn,$sql);
   ?> 
   <table border="1">
<tr>
    <th>i_id</th>
    <th>food_id</th>
    <th>import_date</th>
    <th>quantity</th>
    <th colspan="2">action</th>
</tr>
<tr>
<?php
while($row=mysqli_fetch_assoc($res)){
    ?>
    <td><?php echo $row['i_id'];?></td>
    <td><?php echo $row['food_id'];?></td>
    <td><?php echo $row['import_date'];?></td>
    <td><?php echo $row['quantity'];?></td>
    <td><a href="importupdate.php?i_id=<?php echo $row['i_id'];?>">update</a></td>
    <td><a href="importdelete.php?i_id=<?php echo $row['i_id'];?>">delete</a></td>
</tr>
<?php
}
?>
</tr>
   </table>
</body>
</html>