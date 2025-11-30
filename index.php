<?php require_once __DIR__ . '/php/process-forms.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CI StartUp</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <h1>Welcome to CI StartUp</h1>
    <p>This is the main page of the CI StartUp project.</p>

    <div id="general-messages">
        <?php if (!empty($generalMessages) && is_array($generalMessages)): ?>
            <?php foreach ($generalMessages as $gm): ?>
                <p style="color:<?php echo ($gm['type'] === 'success') ? 'green' : 'red'; ?>"><?php echo htmlspecialchars($gm['text']); ?></p>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <form id="myForm" method="post" novalidate>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <span class="feedback" id="name-feedback"><?php echo isset($nameFeedback) ? htmlspecialchars($nameFeedback) : ''; ?></span>
        <br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br>
        <span class="feedback" id="email-feedback"><?php echo isset($emailFeedback) ? htmlspecialchars($emailFeedback) : ''; ?></span>
        <br>
        <input type="submit" value="Submit">
    </form>

    <script src="js/process-forms.js"></script>
</body>
</html>