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
    $servername = getenv("DB_SERVER") ?: "sql103.byethost7.com";
    $username   = getenv("DB_USERNAME") ?: "b7_40556162";
    $password   = getenv("DB_PASSWORD") ?: "deploymenT1234";
    $database   = getenv("DB_NAME")     ?: "b7_40556162_deployment";


    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
?>
