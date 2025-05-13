<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --primary-dark: #3a56d4;
            --primary-light: rgba(67, 97, 238, 0.1);
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --success-light: rgba(76, 201, 240, 0.1);
            --danger:rgb(0, 139, 63);
            --danger-light: rgba(247, 37, 133, 0.1);
            --warning: #ffbe0b;
            --warning-light: rgba(255, 190, 11, 0.1);
            --info: #4895ef;
            --info-light: rgba(72, 149, 239, 0.1);
            --dark: #2b2d42;
            --dark-light: #343a40;
            --light: #f8f9fa;
            --body-bg: #f5f7fa;
            --border-color: rgba(0, 0, 0, 0.05);
            --spacing-xs: 0.5rem;
            --spacing-sm: 1rem;
            --spacing-md: 1.5rem;
            --spacing-lg: 2rem;
            --spacing-xl: 3rem;
            --radius-sm: 4px;
            --radius-md: 8px;
            --radius-lg: 12px;
            --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.07);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.1);
            --transition-fast: 0.2s ease;
            --transition-normal: 0.3s ease;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        body {
            background-color: var(--body-bg);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: var(--spacing-lg) auto;
            padding: var(--spacing-lg);
            background-color: white;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-lg);
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: var(--spacing-lg);
            padding-bottom: var(--spacing-sm);
            border-bottom: 1px solid var(--border-color);
        }

        .page-title {
            font-size: 1.8rem;
            font-weight: 600;
            color: var(--dark);
            letter-spacing: -0.5px;
        }

        .add-button i span {
            display: inline-flex;
            align-items: center;
            background-color:rgb(0, 170, 182);
            color: white;
            padding: 0.8rem 1.4rem;
            border: none;
            border-radius: var(--radius-md);
            font-weight: 500;
            text-decoration: none;
            transition: all var(--transition-normal);
            box-shadow: var(--shadow-md);
            gap: var(--spacing-xs);
        }

        .add-button:hover {
            background-color: var(--primary-dark);
            transform: translateY(-2px);
            box-shadow: var(--shadow-lg);
        }

        .students-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: var(--spacing-md);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
        }

        .students-table th,
        .students-table td {
            padding: var(--spacing-md);
            text-align: left;
        }

        .students-table thead tr th {
            background-color:rgb(0, 170, 182);
            font-weight: 600;
            color: #fff;
            border-bottom: 2px solid var(--border-color);
            position: relative;
            white-space: nowrap;
        }

        .students-table th:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(to right, var(--primary), var(--info));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform var(--transition-normal);
        }

        .students-table th:hover:after {
            transform: scaleX(1);
        }

        .students-table tr {
            transition: all var(--transition-normal);
        }

        .students-table tr:nth-child(even) {
            background-color: var(--light);
        }

        .students-table tr:hover {
            background-color: var(--primary-light);
        }

        .students-table td {
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
            font-weight: 500;
            border-radius: 50px;
            gap: 0.5rem;
        }

        .status-badge i {
            font-size: 0.75rem;
        }

        .status-paid {
            background-color: var(--success-light);
            color: var(--success);
        }

        .status-pending {
            background-color: var(--warning-light);
            color: var(--warning);
        }

        .status-overdue {
            background-color: var(--danger-light);
            color: var(--danger);
        }

        .action-buttons {
            display: flex;
            gap: var(--spacing-xs);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            padding: 0.6rem;
            border-radius: var(--radius-sm);
            border: none;
            transition: all var(--transition-fast);
            font-size: 0.9rem;
            width: 36px;
            height: 36px;
        }

        .btn-edit {
            background-color: var(--info-light);
            color: var(--info);
        }

        .btn-edit:hover {
            background-color: var(--info);
            color: white;
            transform: translateY(-2px);
        }

        .btn-delete {
            background-color: var(--danger-light);
            color: var(--danger);
        }

        .btn-delete:hover {
            background-color: var(--danger);
            color: white;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: var(--spacing-xl) 0;
            color: var(--dark-light);
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: var(--spacing-md);
            color: var(--border-color);
        }

        .empty-state p {
            font-size: 1.1rem;
            color: var(--dark-light);
        }

        @media (max-width: 768px) {
            .container {
                width: 95%;
                padding: var(--spacing-sm);
                margin: var(--spacing-sm) auto;
            }

            .page-header {
                flex-direction: column;
                gap: var(--spacing-sm);
                align-items: flex-start;
            }

            .students-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
                -webkit-overflow-scrolling: touch;
            }

            .students-table th,
            .students-table td {
                padding: var(--spacing-sm);
            }

            .action-buttons {
                flex-direction: row;
            }

            .status-badge {
                padding: 0.4rem 0.8rem;
            }
        }
    </style>
     <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Student Management</h1>
            <a href="create.php" class="add-button">
                <i class="fas fa-plus"></i>
                <span>Add Student</span>
            </a>
        </div>
        
        <?php
        $result = $conn->query("SELECT * FROM students");
        if ($result->num_rows > 0) {
        ?>
        <table class="students-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Date</th>
                    <th>Class</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    $statusClass = '';
                    $statusIcon = '';
                    switch(strtolower($row['status'])) {
                        case 'paid':
                            $statusClass = 'Fully Paid';
                            $statusIcon = 'fas fa-check-circle';
                            break;
                        case 'pending':
                            $statusClass = 'Paid Partially';
                            $statusIcon = 'fa-clock';
                            break;
                        default:
                            $statusClass = 'status-overdue';
                            $statusIcon = ' fas fa-check-circle';
                    }
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                    <td><?php echo htmlspecialchars($row['class']); ?></td>
                    <td><?php echo number_format($row['amount'], 2); ?> RWF</td>
                    <td>
                        <span class="status-badge <?php echo $statusClass; ?>">
                            <i class="fas <?php echo $statusIcon; ?>"></i>
                            <?php echo htmlspecialchars($row['status']); ?>
                        </span>
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-edit" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-delete" title="Delete" 
                               >
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } else { ?>
        <div class="empty-state">
            <i class="fas fa-user-graduate"></i>
            <p>No students found. Add your first student to get started!</p>
        </div>
        <?php } ?>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>
