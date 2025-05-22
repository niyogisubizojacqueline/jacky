<?php
session_start();

$conn = new mysqli('localhost', 'root', '', 'dukundumurimo');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['e_id'])) {
    $e_id = filter_input(INPUT_GET, 'e_id', FILTER_VALIDATE_INT);
    
    if ($e_id) {
        // First check if the record exists
        $stmt = $conn->prepare("SELECT e_id FROM `export` WHERE e_id = ?");
        $stmt->bind_param("i", $e_id);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            // Record exists, proceed with deletion
            $stmt = $conn->prepare("DELETE FROM `export` WHERE e_id = ?");
            $stmt->bind_param("i", $e_id);
            
            if ($stmt->execute()) {
                $_SESSION['message'] = "Export record deleted successfully!";
                $_SESSION['message_type'] = "success";
            } else {
                $_SESSION['message'] = "Error deleting record: " . $stmt->error;
                $_SESSION['message_type'] = "error";
            }
        } else {
            $_SESSION['message'] = "Export record not found!";
            $_SESSION['message_type'] = "error";
        }
        $stmt->close();
    } else {
        $_SESSION['message'] = "Invalid export ID provided!";
        $_SESSION['message_type'] = "error";
    }
} else {
    $_SESSION['message'] = "No export ID provided!";
    $_SESSION['message_type'] = "error";
}

// Redirect back to the export form
header("Location: exportform.php");
exit();
?>
