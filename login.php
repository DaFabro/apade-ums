 <?php
session_start();

$loginError = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli("localhost", "root", "", "uniformms");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $username = isset($_POST["username"]) ? trim($_POST["username"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";

    $stmt = $conn->prepare("SELECT password FROM admin_user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            header("Location: index.php");
            exit;
        } else {
            $loginError = "Incorrect username or password.";
        }
    } else {
        $loginError = "Incorrect username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>APADE Uniform Management Sytem </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    body {
        background-color: #f5f5f5;
            background-image:  linear-gradient(135deg, rgba(6, 7, 7, 0.85), rgba(9, 9, 10, 0.9)),
                url('APADE-1-20.jpg');
               
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #333;
            line-height: 1.6;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .login-container {
      background: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
      width: 450px;
    }
    .login-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    .form-group {
      margin-bottom: 15px;
      position: relative;
    }

    .form-group label {
      display: block;
      margin-bottom: 6px;
      font-weight: 500;
      color: #444;
    }

    .form-group input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 6px;
      transition: border-color 0.3s;
    }

    .form-group input:focus {
      border-color: #2575fc;
      outline: none;
    }

    .btn {
      width: 100%;
      padding: 10px;
      background-color:rgb(0, 124, 155);
      color: white;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-size: 16px;
      transition: background 0.3s;
    }

    .btn:hover {
      background-color:rgb(4, 102, 48);
    }

    .bottom-text {
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
      color: #666;
    }

    .bottom-text a {
      color: #2575fc;
      text-decoration: none;
    }

    .bottom-text a:hover {
      text-decoration: underline;
    }

    .toggle-icons {
      position: absolute;
      top: 67%;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #888;
      font-size: 1.2rem;
    }

    .toggle-icons.hash-icon {
      right: 35px;
    }
    #hashed-output {
      font-size: 12px;
      color: #555;
      word-break: break-all;
      margin-top: 10px;
      background: #f5f5f5;
      padding: 10px;
      border-radius: 6px;
      display: none;
    }
    .logo img {
       width: 70px;          
       height: auto;           
   display: block;
  margin: 0 auto 20px;    
}
  </style>
</head>
<body>

  <div class="login-container">
    <div class="logo">
      <img src="logo-APADE.2x.webp" alt="">
    </div>
    <h2>Login</h2>
    <?php if (!empty($loginError)): ?>
  <div class="alert alert-danger text-center" role="alert">
    <?php echo $loginError; ?>
  </div>
<?php endif; ?>

    <form action="" method="POST">
      <div class="form-group">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required oninput="clearHash()">
        <i class="bi bi-eye toggle-icons" onclick="togglePassword()" title="Show/Hide Password"></i>
     
      </div>

      <div id="hashed-output"></div>

      <button type="submit" class="btn">Log In</button>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById('password');
      passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
    }

    function clearHash() {
      document.getElementById('hashed-output').style.display = 'none';
      document.getElementById('hashed-output').textContent = '';
    }

    async function showHashedPassword() {
      const password = document.getElementById('password').value;
      if (!password) return;

      const encoder = new TextEncoder();
      const data = encoder.encode(password);
      const hashBuffer = await crypto.subtle.digest('SHA-256', data);
      const hashArray = Array.from(new Uint8Array(hashBuffer));
      const hashHex = hashArray.map(b => b.toString(16).padStart(2, '0')).join('');

      const output = document.getElementById('hashed-output');
      output.style.display = 'block';
      output.textContent = `SHA-256: ${hashHex}`;
    }
  </script>
</body>
</html>
<?php 
$host = "localhost";
$dbname = "uniformms";
$user = "root"; 
$pass = "";
$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$username = 'Apadeuniform';
$password = password_hash('apadeuniform2025', PASSWORD_DEFAULT); 
$sql = "INSERT INTO admin_user (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->close();
$conn->close();
?>
