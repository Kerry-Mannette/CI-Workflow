<?php

$nameFeedback = '';
$emailFeedback = '';
$generalMessages = [];
$processedData = ['name' => null, 'email' => null];

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

    if (empty($nameErrors) && empty($emailErrors)) {
        // Success: set processed data and messages
        $processedData['name'] = htmlspecialchars($name);
        $processedData['email'] = htmlspecialchars($email);
        $generalMessages[] = ['type' => 'success', 'text' => 'Form submitted successfully!'];
        $generalMessages[] = ['type' => 'success', 'text' => 'Name: ' . $processedData['name']];
        $generalMessages[] = ['type' => 'success', 'text' => 'Email: ' . $processedData['email']];
    }
}

?>
