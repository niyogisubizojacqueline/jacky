<?php
$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = '';
$row = null;

if (isset($_GET['e_id'])) {
    $e_id = filter_input(INPUT_GET, 'e_id', FILTER_VALIDATE_INT);
    if ($e_id) {
        $stmt = $conn->prepare("SELECT e.*, f.food_name FROM `export` e LEFT JOIN `food` f ON e.food_id = f.food_id WHERE e.e_id = ?");
        $stmt->bind_param("i", $e_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        
        if (!$row) {
            $message = '<div class="message error">Export record not found.</div>';
        }
    } else {
        $message = '<div class="message error">Invalid export ID.</div>';
    }
}

if (isset($_POST['update']) && isset($_POST['e_id'])) {
    $e_id = filter_input(INPUT_POST, 'e_id', FILTER_VALIDATE_INT);
    $food_id = filter_input(INPUT_POST, 'food_id', FILTER_VALIDATE_INT);
    $export_date = filter_input(INPUT_POST, 'export_date');
    $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_FLOAT);

    if ($e_id && $food_id && $export_date && $quantity) {
        $stmt = $conn->prepare("UPDATE `export` SET food_id = ?, export_date = ?, quantity = ? WHERE e_id = ?");
        $stmt->bind_param("isdi", $food_id, $export_date, $quantity, $e_id);
        
        if ($stmt->execute()) {
            $message = '<div class="message success">Export record updated successfully!</div>';
            header("refresh:2;url=exportform.php");
        } else {
            $message = '<div class="message error">Error updating record: ' . $stmt->error . '</div>';
        }
        $stmt->close();
    } else {
        $message = '<div class="message error">Please provide valid input for all fields.</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Export</title>
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
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .current-food {
            color: #666;
            font-size: 0.9em;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <?php echo $message; ?>
    
    <?php if ($row): ?>
    <div class="form">
        <h2>Update Export Record</h2>
        <form method="POST">
            <input type="hidden" name="e_id" value="<?php echo htmlspecialchars($row['e_id']); ?>">
            
            <div class="form-group">
                <label for="food_id">Food ID:</label>
                <input type="number" id="food_id" name="food_id" value="<?php echo htmlspecialchars($row['food_id']); ?>" required>
                <?php if (!empty($row['food_name'])): ?>
                    <div class="current-food">Current Food: <?php echo htmlspecialchars($row['food_name']); ?></div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="export_date">Export Date:</label>
                <input type="date" id="export_date" name="export_date" value="<?php echo htmlspecialchars($row['export_date']); ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" step="0.01" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>
            </div>

            <div class="btn">
                <button type="submit" name="update">Update Record</button>
            </div>
        </form>
    </div>
    <?php endif; ?>

    <div class="a">
        <button><a href="exportform.php">Go Back</a></button>
    </div>
</body>
</html>
