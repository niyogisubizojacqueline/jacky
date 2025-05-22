<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export Management</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .message {
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
        .action-links a {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
            margin: 0 5px;
        }
        .update-link {
            background-color: #007bff;
            color: white;
        }
        .delete-link {
            background-color: #dc3545;
            color: white;
        }
    </style>
</head>
<body>
<div class="form">
    <h2>Add New Export</h2>
    <form action="" method="POST">
        <label for="food_id">Food ID:</label>
        <input type="number" id="food_id" name="food_id" required><br>

        <label for="export_date">Export Date:</label>
        <input type="date" id="export_date" name="export_date" required><br>

        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" step="0.01" required><br>

        <div class="btn">
            <button type="submit" name="submit">Submit</button>
        </div>
    </form>
</div>

<div class="a">
    <button><a href="nav.php">Go Back</a></button>
</div>

<?php
$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');
if ($conn->connect_error) {
    die('<div class="message error">Connection failed: ' . $conn->connect_error . '</div>');
}

if(isset($_POST['submit'])) {
    $food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
    $export_date = filter_input(INPUT_POST, 'export_date');
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);

    if ($food_id && $export_date && $quantity) {
        $stmt = $conn->prepare("INSERT INTO `export` (food_id, export_date, quantity) VALUES (?, ?, ?)");
        $stmt->bind_param("isd", $food_id, $export_date, $quantity);
        
        if($stmt->execute()) {
            echo '<div class="message success">Export record added successfully!</div>';
        } else {
            echo '<div class="message error">Error: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    } else {
        echo '<div class="message error">Please provide valid input for all fields.</div>';
    }
}

// Display existing exports
$sql = "SELECT e.*, f.food_name 
        FROM `export` e 
        LEFT JOIN `food` f ON e.food_id = f.food_id 
        ORDER BY e.export_date DESC";
$result = $conn->query($sql);
?>

<div class="table-container">
    <h2>Export Records</h2>
    <table>
        <tr>
            <th>Export ID</th>
            <th>Food Name</th>
            <th>Export Date</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['e_id']) . "</td>";
                echo "<td>" . htmlspecialchars($row['food_name'] ?? 'Unknown Food') . "</td>";
                echo "<td>" . htmlspecialchars($row['export_date']) . "</td>";
                echo "<td>" . htmlspecialchars($row['quantity']) . "</td>";
                echo "<td class='action-links'>
                        <a href='exportupdate.php?e_id=" . $row['e_id'] . "' class='update-link'>Update</a>
                        <a href='exportdelete.php?e_id=" . $row['e_id'] . "' class='delete-link' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a>
                      </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>No export records found</td></tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
