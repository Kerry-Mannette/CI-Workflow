<?php
session_start();
require_once __DIR__ . "/db_connect.php";  // include the connection file

$nameFeedback = '';
$emailFeedback = '';
$generalMessages = [];
$processedData = ['name' => null, 'email' => null];
$dbUsername = null;

if ($_SERVER["REQUEST_METHOD"] === 'POST') {
    $name  = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';

    $nameErrors = [];
    $emailErrors = [];

    // Validate name
    if ($name === '') {
        $nameErrors[] = 'Name is required.';
    } elseif (strlen($name) < 3) {
        $nameErrors[] = 'Name must be at least 3 characters long.';
    } elseif (!preg_match('/^[a-zA-Z\s]+$/', $name)) {
        $nameErrors[] = 'Name can only contain letters and spaces.';
    }

    // Validate email
    if ($email === '') {
        $emailErrors[] = 'Email is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErrors[] = 'Invalid email format.';
    }

    if (!empty($nameErrors)) {
        $nameFeedback = implode(' ', $nameErrors);
    }
    if (!empty($emailErrors)) {
        $emailFeedback = implode(' ', $emailErrors);
    }

    // If no validation errors, insert into database
    if (empty($nameErrors) && empty($emailErrors)) {
        $processedData['name'] = htmlspecialchars($name);
        $processedData['email'] = htmlspecialchars($email);

        $stmt = $conn->prepare("INSERT INTO submissions (name, email) VALUES (?, ?)");
        if ($stmt) {
            $stmt->bind_param("ss", $name, $email);
            if ($stmt->execute()) {
                // Store success data in session
                $_SESSION['success_data'] = [
                    'name' => $processedData['name'],
                    'email' => htmlspecialchars($email),
                    'username' => ''
                ];

                // Try to read username from a users table using the email
                if ($conn) {
                    $u = $conn->prepare("SELECT username FROM users WHERE email = ? LIMIT 1");
                    if ($u) {
                        $u->bind_param("s", $email);
                        if ($u->execute()) {
                            $res = $u->get_result();
                            if ($res && $row = $res->fetch_assoc()) {
                                $_SESSION['success_data']['username'] = $row['username'];
                            }
                            if ($res) { $res->free(); }
                        }
                        $u->close();
                    }
                }
                
                // Redirect to success page
                $conn->close();
                header("Location: php/success.php");
                exit;
            } else {
                $generalMessages[] = ['type' => 'error', 'text' => 'Database error: ' . $stmt->error];
            }
            $stmt->close();
        } else {
            $generalMessages[] = ['type' => 'error', 'text' => 'Failed to prepare database statement.'];
        }
    }
}

$conn->close();
// Expose $successFlag and $dbUsername for index.php
?>
