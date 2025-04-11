<?php
// index.php
session_start();
include_once 'connection.php';


// Handle form submission
$message = '';
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $user_type = 'User'; // default role

    // Check if username or email already exists
    $check = $con->prepare("SELECT id FROM users WHERE username = ? OR email = ?");
    $check->bind_param("ss", $username, $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        $message = "Username or Email already taken.";
    } else {
        // Insert new user
        $stmt = $con->prepare("INSERT INTO users (username, email, password, user_type) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $email, $password, $user_type);

        if ($stmt->execute()) {
            $message = "Registration successful! <a href='index.php'>Login here</a>";
        } else {
            $message = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    $check->close();
}
?>

<!-- Registration Form HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RPSV Register</title>

    <link rel="icon" class="icon" href="../img/rpsv.jpg"/>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- External CSS -->
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

                <?php if (!empty($message)) : ?>
                    <div class="alert alert-warning text-center"><?php echo $message; ?></div>
                <?php endif; ?>

                <form action="index.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-3">Sign Up</button>
                    <div class="text-center">
                        <p class="text-muted">Already have an account? <a href="#">Log in</a></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- End of Card -->
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
