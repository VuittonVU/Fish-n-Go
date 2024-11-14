<?php

include 'db.php';

$error = "";

// Handle form submission for login
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if user exists and password matches
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username AND password = :password");
    $stmt->execute(['username' => $username, 'password' => $password]);
    
    if ($stmt->rowCount() > 0) {
        header("Location: welcome.php"); // Redirect to a welcome page after successful login
        exit();
    } else {
        $error = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="halamansignin.css">
    <link rel="stylesheet" href="bubble/style.css">
    <title>Login</title>
</head>
<body>

<a href="../index.html">
  <button class="back-button"><b>></b></button>
</a>

<!-- Login Form -->
<div class="login-container">
    <form action="halamansignin.php" method="POST">
        <div class="form-item">
            <label>Username</label>
            <div class="input-wrapper">
                <input type="text" name="username" id="username" autocomplete="off" required />
            </div>
        </div>

        <div class="form-item">
            <label>Password</label>
            <div class="input-wrapper">
                <input type="password" name="password" id="password" autocomplete="off" required />
                <button type="button" id="eyeball">
                    <div class="eye"></div>
                </button>
                <div id="beam"></div>
            </div>
        </div>

        <button type="submit" id="submit" name="login">Log in</button>
    </form>
    <a href="halamansignup.php" class="signuplink">Don't have an account?</a>

    <!-- Display error message -->
    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>
</div>

<div id="anglerfish"></div>

<audio id="click-sound" src="/BGM/mouse.mp3" preload="auto"></audio>

<script src="../BGM/Clicksfx.js"></script>
<script src="halamansignin.js"></script>
<script src="bubble/script.js"></script>

</body>
</html>
