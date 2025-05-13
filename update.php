<?php
include 'config.php';  
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    die("Invalid ID.");
}
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
if (!$student) {
    die("Student not found.");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $date = $_POST['date'];
    $class = $_POST['class'];
    $amount = floatval($_POST['amount']);
    $status = $_POST['status'];
    $update = $conn->prepare("UPDATE students SET name = ?, date = ?, class = ?, amount = ?, status = ? WHERE id = ?");
    $update->bind_param("sssisi", $name, $date, $class, $amount, $status, $id);

    if ($update->execute()) {
        echo "<script>  window.location.href = 'orders.php';</script>";
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>APADE UMS - Inventory Management</title>
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
            font-size: 28px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 25px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="file"],
        select {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
            display: inline-block;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 16px;
            background-color: white;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="file"]:focus,
        select:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        input[type="submit"] {
            width: 100%;
            background-color: rgb(0, 122, 51);
            color: white;
            padding: 14px 20px;
            margin: 20px 0 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #2980b9;
        }
        label {
            font-weight: 500;
            color: #2c3e50;
        }
        .select-container {
            margin-bottom: 20px;
        }
        .select-container label {
            display: block;
            margin-bottom: 8px;
            font-size: 16px;
        }
        .select-container select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='gray'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7' /%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 18px;
        }
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <h2>Edit Student</h2>
    <form method="post" enctype="multipart/form-data">
    <input type="text" name="name" id="name" value="<?= htmlspecialchars($student['name']) ?>" required><br>

<input type="date" name="date" id="date" value="<?= $student['date'] ?>" required><br>
<select name="class" id="class-select" required>
    <option value="" disabled>Select Class Level</option>
    <optgroup label="Lycee Levels">
        <option value="Level 3" <?= $student['class'] == 'Level 3' ? 'selected' : '' ?>>Level 3</option>
        <option value="Level 4" <?= $student['class'] == 'Level 4' ? 'selected' : '' ?>>Level 4</option>
        <option value="Level 5" <?= $student['class'] == 'Level 5' ? 'selected' : '' ?>>Level 5</option>
    </optgroup>
    <optgroup label="Groupe Levels">
        <option value="S1" <?= $student['class'] == 'S1' ? 'selected' : '' ?>>S1</option>
        <option value="S2" <?= $student['class'] == 'S2' ? 'selected' : '' ?>>S2</option>
        <option value="S3" <?= $student['class'] == 'S3' ? 'selected' : '' ?>>S3</option>
        <option value="S4" <?= $student['class'] == 'S4' ? 'selected' : '' ?>>S4</option>
        <option value="S5" <?= $student['class'] == 'S5' ? 'selected' : '' ?>>S5</option>
        <option value="S6" <?= $student['class'] == 'S6' ? 'selected' : '' ?>>S6</option>
    </optgroup>
</select>
<input type="number" name="amount" id="amount" value="<?= $student['amount'] ?>" required><br>
<select name="status" id="status" required>
    <option value="">Select Status</option>
    <option value="Fully Paid" <?= $student['status'] == 'Fully Paid' ? 'selected' : '' ?>>Fully Paid</option>
</select>
        <input type="submit" value="Save">
    </form>
</body>
</html>