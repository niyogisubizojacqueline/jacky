
<?php
$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');

// Check connection
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