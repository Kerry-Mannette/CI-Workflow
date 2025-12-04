<?php
session_start();

// Check if success data exists in session
if (!isset($_SESSION['success_data'])) {
    header("Location: ./index.php");
    exit;
}

$name = $_SESSION['user_name'];
$email = $_SESSION['user_email'];


// Clear success data from session after displaying
unset($_SESSION['success_data']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - CI StartUp</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="success-container">
        <h1>Successfully Submitted!</h1>
        <div class="success-message">
            <p>Hello, <strong><?php echo htmlspecialchars($name); ?></strong>!</p>
            <p>Your form has been successfully submitted with the following information:</p>
            <ul>
                <li><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></li>
                <li><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></li>
            </ul>
            <a href="index.php" class="btn-home">Submit Another</a>
        </div>
    </div>
</body>
</html>
