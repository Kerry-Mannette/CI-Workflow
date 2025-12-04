<?php
$isCI = getenv("CI") === "true";

if ($isCI) {
    // Mock connection for CI environment
    class MockConnection {
        public function prepare($query) {
            return new class {
                public function bind_param() {}
                public function execute() { return true; }
                public function close() {}
                public $error = '';
            };
        }
        public function close() {}
        public $connect_error = '';
    }

    $conn = new MockConnection();
} else {
    // Real connection for production
    $servername = getenv("DB_SERVER") ?: "localhost";
    $username   = getenv("DB_USERNAME") ?: "YOUR_VPANEL_USERNAME";
    $password   = getenv("DB_PASSWORD") ?: "YOUR_VPANEL_PASSWORD";
    $database   = getenv("DB_NAME")     ?: "YOUR_VPANEL_DATABASE";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>
