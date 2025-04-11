<?php
session_start();
include_once 'connection.php';

// Error handling for connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Helper function to sanitize and validate inputs
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Function to check if email/username already exists
function check_existing_user($username, $email, $con) {
    $stmt = $con->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();
    return $stmt->num_rows > 0;
}

// Handle form submission
$message = '';
$show_download_button = false; // Initialize the flag for showing download button
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = sanitize_input($_POST['username']);
    $email = sanitize_input($_POST['email']);
    $password = sanitize_input($_POST['password']);
    $user_type = 'User'; // Default role

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format.";
    } elseif (strlen($password) < 6) {
        // Password should be at least 6 characters long
        $message = "Password must be at least 6 characters.";
    } else {
        // Check if username or email already exists
        if (check_existing_user($username, $email, $con)) {
            $message = "Username or Email is already taken.";
        } else {
            // Hash password securely
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Insert new user into the database
            $stmt = $con->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $username, $email, $hashed_password, $user_type);

            if ($stmt->execute()) {
                $message = "Registration successful! <a href='login.php'>Login here</a>";
                $show_download_button = true; // Set to true after successful registration
            } else {
                $message = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}

$con->close();
?>

<!-- Registration Form HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPSV Register</title>
    <link rel="icon" href="../img/rpsv.jpg"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="col-md-5 col-lg-4 col-12">
        <!-- Card for registration -->
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <img src="../img/rpsv.jpg" width="100" alt="Logo">
                </div>

                <h3 class="text-center mb-4">Create Account</h3>

                <!-- Display Message -->
                <?php if (!empty($message)) : ?>
                    <div class="alert alert-<?php echo (strpos($message, 'Error') !== false) ? 'danger' : 'success'; ?> text-center">
                        <?php echo $message; ?>
                    </div>
                <?php endif; ?>

                <!-- Registration Form -->
                <form action="index.php" method="POST" novalidate>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Enter your username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Create a password" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>

                    <div class="text-center">
                        <p class="text-muted">Already have an account? <a href="login.php">Log in</a></p>
                    </div>

                    <!-- Optional: Button for downloading users (only shown if registration is successful) -->
                    <?php if ($show_download_button) : ?>
                        <div class="text-center mt-3">
                            <a href="download.php" class="btn btn-success">Download Users as Excel</a>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
        </div>
        <!-- End of Card -->
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
