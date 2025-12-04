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

    <h1>Welcome to CI Workflow</h1>
    <p>This is the main page of the CI Workflow project.</p>

    <!-- general-messages removed per request -->

    <!-- Hidden success marker for JS to trigger popup -->
    <?php if (!empty($successFlag)): ?>
        <div id="success-flag" data-username="<?php echo htmlspecialchars($dbUsername ?? $processedData['name'] ?? ''); ?>" style="display:none"></div>
    <?php endif; ?>

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

    <!-- Simple popup modal -->
    <div id="success-modal" class="modal" style="display:none">
        <div class="modal-content">
            <span class="close" id="modal-close" aria-label="Close">&times;</span>
            <h2>Welcome!</h2>
            <p id="modal-message"></p>
        </div>
    </div>

    <script src="js/process-forms.js"></script>
    <script src="js/success-modal.js"></script>
</body>
</html>