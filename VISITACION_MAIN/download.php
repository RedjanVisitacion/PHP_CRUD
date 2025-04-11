<?php
// download_users.php
include_once 'connection.php';

// Set headers to download as an Excel-compatible file
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=users_data.xls");
header("Pragma: no-cache");
header("Expires: 0");

// Query only username, email, and password
$result = $con->query("SELECT username, email, password FROM users");

if ($result->num_rows > 0) {
    // Column headers
    echo "Username\tEmail\tPassword\n";

    // Output each row
    while ($row = $result->fetch_assoc()) {
        echo $row['username'] . "\t" . $row['email'] . "\t" . $row['password'] . "\n";
    }
} else {
    echo "No records found.";
}
?>
