<?php
session_start();

$host = "localhost";
$dbname = "uniformms";
$user = "root"; 
$pass = "";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM admin_user WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        $_SESSION['Apadeuniform'] = $user['username'];
        header("Location: index.php");
        exit;
    } else {
        //echo "Incorrect password.";
    }
} else {
   // echo "User not found.";
}

$conn->close();
?>
