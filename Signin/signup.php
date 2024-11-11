<?php
include('connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        // Check if the password and confirm password match
        if ($password !== $confirm_password) {
            echo "Password dan konfirmasi password tidak cocok.";
        } else {
            // Check if the username already exists
            $checkUsername = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($checkUsername);

            if ($result->num_rows > 0) {
                echo "Username sudah terdaftar, silakan gunakan username lain.";
            } else {
                // Insert new user if username is available
                $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

                if ($conn->query($sql) === TRUE) {
                    // Redirect to login page with a success message in the URL
                    header("Location: halamansignin.html?signup=success");
                    exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
    } else {
        echo "Username, password, atau konfirmasi password tidak diisi.";
    }
}
?>
