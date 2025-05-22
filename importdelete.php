<?php
$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['i_id'])) {
    $i_id = $_GET['i_id'];


    $sql = "DELETE FROM `import` WHERE i_id = '$i_id'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        echo "Record deleted successfully!";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

header("Location: importform.php");
exit();
?>
