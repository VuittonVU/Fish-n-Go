<?php
session_start();
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query to check username and password
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Successful login
            $_SESSION['username'] = $username;
            echo "Login berhasil!";
            header("Location: /Fish%20n%20Go/index.html"); // Redirect to homepage after login
            exit();
        } else {
            // Login failed
            echo "Username atau password salah.";
        }
    } else {
        echo "Username atau password tidak diisi.";
    }
}
?>
