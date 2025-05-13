<?php
include 'config.php';  
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $class = $_POST['class'];
    $amount = $_POST['amount'];
    $status = $_POST['status'];
    $photoPath =$_POST ['photo'];
    if(isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $targetDir = "uploads/";
        if(!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        $fileExtension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid().'.'.$fileExtension;
        $targetFile = $targetDir . $newFileName;
        if ($_FILES['photo']['size'] > 2000000) {
            die("Sorry, your file is too large.");
        }
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        if(!in_array(strtolower($fileExtension), $allowedExtensions)) {
            die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
        }
        
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
            $photoPath = $targetFile;
        } else {
            die("Sorry, there was an error uploading your file.");
        }
    }
    
    $conn->query("INSERT INTO students (name, date, class, amount, status, photo) VALUES ('$name', '$date', '$class', '$amount', '$status', '$photoPath')");
    header("Location: orders.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
        input[type="email"],
        input[type="file"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 15px;
            display: inline-block;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="date"]:focus,
        input[type="email"]:focus,
        input[type="file"]:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 5px rgba(52, 152, 219, 0.3);
        }
        input[type="submit"] {
            width: 100%;
            background-color:rgb(0, 122, 51);
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
        .photo-preview {
            max-width: 150px;
            max-height: 150px;
            margin: 10px 0;
            display: none;
        }
        @media (max-width: 600px) {
            form {
                padding: 15px;
            }
            h2 {
                font-size: 24px;
            }
        }
.class-select-container {
    margin-bottom: 20px;
}


.class-select-container label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #2c3e50;
    font-size: 16px;
}
.class-select-container select {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 18px;
}
.class-select-container select:hover {
    border-color: #3498db;
}

.class-select-container select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}
.class-select-container optgroup {
    font-weight: 600;
    color: #7f8c8d;
    font-size: 14px;
    padding: 8px 0;
}
.class-select-container option {
    padding: 8px 12px;
    font-size: 15px;
    color: #2c3e50;
    background-color: white;
}

.class-select-container option:hover {
    background-color: #3498db;
    color: white;
}

.class-select-container option[disabled] {
    color: #95a5a6;
}
@media (max-width: 768px) {
    .class-select-container select {
        padding: 10px 12px;
        font-size: 15px;
    }
}
.status-select-container {
    margin-bottom: 20px;
}

.status-select-container label {
    display: block;
    margin-bottom: 8px;
    font-weight: 500;
    color: #2c3e50;
    font-size: 16px;
}

.status-select-container select {
    width: 100%;
    padding: 12px 15px;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 6px;
    background-color: white;
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    appearance: none;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke='gray'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 9l-7 7-7-7' /%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    background-size: 18px;
}

.status-select-container select:hover {
    border-color: #3498db;
}

.status-select-container select:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
}

.status-select-container option {
    padding: 8px 12px;
    font-size: 15px;
    color: #2c3e50;
    background-color: white;
}

.status-select-container option:hover {
    background-color: #3498db;
    color: white;
}

@media (max-width: 768px) {
    .status-select-container select {
        padding: 10px 12px;
        font-size: 15px;
    }
}

        </style>
</head>
<body>
    <h2>Add Student</h2>
    <form method="post" enctype="multipart/form-data">
        Student Name: <input type="text" name="name" required><br><br>
        Date: <input type="date" name="date" required><br><br>
        <div class="class-select-container">
    <label for="class-select">Class:</label>
    <select name="class" id="class-select" required>
        <option value="" selected disabled>Select Class Level</option>
        <optgroup label="Lycee Levels">
            <option value="Level 3">Level 3</option>
            <option value="Level 4">Level 4</option>
            <option value="Level 5">Level 5</option>
        </optgroup>
        <optgroup label="Groupe Levels">
            <option value="S1">S1</option>
            <option value="S2">S2</option>
            <option value="S3">S3</option>
            <option value="S4">S4</option>
            <option value="S5">S5</option>
            <option value="S6">S6</option>
        </optgroup>
    </select>
</div><br><br>
        Amount: <input type="number" name="amount" required><br><br>
        <div class="status-select-container">
    <label for="status">Status:</label>
    <select name="status" id="status" required>
      <option value=""> Select Status </option>
      <option value="Fully Paid">Fully Paid</option>
    </select>
</div><br><br>


        <input type="submit" value="Save">
    </form>
     
</body>
</html>