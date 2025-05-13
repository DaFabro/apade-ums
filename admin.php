<?php
$host = "localhost";
$dbname = "uniformms";
$user = "root"; 
$pass = "";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}

$username = 'Apadeuniform';
$password = 'apadeuniform2025';

$sql_check = "SELECT id FROM admin_user WHERE username = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $username);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
    echo "✅ Admin user '$username' already exists. No action taken.";
} else {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql_insert = "INSERT INTO admin_user (username, password) VALUES (?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ss", $username, $hashed_password);

    if ($stmt_insert->execute()) {
        echo "✅ Admin user '$username' created successfully.";
    } else {
        echo "❌ Error inserting admin user: " . $stmt_insert->error;
    }

    $stmt_insert->close();
    
    $stmt_insert->execute();
}

$stmt_check->close();
$conn->close();
?>
