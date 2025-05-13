<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<?php
session_start();
if (!isset($_SESSION['Apadeuniform'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APADE Uniform Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        html, body {
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        body {
            background-color: #f5f5f5;
            background-image: 
                linear-gradient(135deg, rgba(6, 7, 7, 0.85), rgba(9, 9, 10, 0.9)),
                url('CklddbDUoAABptK.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            color: #333;
            line-height: 1.6;
        }
        .main-content {
            flex: 1;
            padding: 20px 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        .welcome-box {
            background-color: rgba(0, 131, 131, 0.9);
            color: white;
            padding: 30px;
            border-radius: 8px;
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .welcome-text h1 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .welcome-text p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .date-display {
            font-size: 1rem;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px 15px;
            border-radius: 4px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-item {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            transition: transform 0.3s;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            font-size: 2rem;
            margin-bottom: 15px;
            color: #1a3a6b;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: bold;
            color: #1a3a6b;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #4a5568;
        }

        .dashboard {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background-color: #1a3a6b;
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background-color: #e9f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            color: #1a3a6b;
            font-size: 1.5rem;
        }

        .card h2 {
            color: #1a3a6b;
            margin-bottom: 15px;
            font-size: 1.3rem;
        }

        .card p {
            color: #4a5568;
            margin-bottom: 20px;
            font-size: 0.95rem;
        }

        .card-footer {
            display: flex;
            justify-content: flex-end;
        }

        .btn {
            background-color: #1a3a6b;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #2a5a8a;
        }

        .recent-activity {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
        }

        .recent-activity h2 {
            color: #1a3a6b;
            margin-bottom: 20px;
            font-size: 1.5rem;
        }

        .activity-list {
            list-style: none;
        }

        .activity-item {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            background-color: #e9f5e9;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #1a3a6b;
            font-size: 1rem;
        }

        .activity-details {
            flex: 1;
        }

        .activity-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: #1a3a6b;
        }

        .activity-time {
            font-size: 0.85rem;
            color: #718096;
        }

        .activity-status {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 600;
        }

        .status-completed {
            background-color: #e8f5e9;
            color: #2e7d32;
        }

        .status-pending {
            background-color: #fff8e1;
            color: #ff8f00;
        }

        .status-cancelled {
            background-color: #ffebee;
            color: #c62828;
        }
        @media (max-width: 768px) {
            .welcome-box {
                flex-direction: column;
                text-align: center;
            }

            .date-display {
                margin-top: 15px;
            }

            .stats {
                grid-template-columns: 1fr 1fr;
            }

            .card {
                padding: 20px;
            }
        }

        @media (max-width: 480px) {
            .stats {
                grid-template-columns: 1fr;
            }

            .welcome-text h1 {
                font-size: 1.5rem;
            }

            .welcome-text p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>

    <main class="main-content">
        <div class="container">
            <div class="welcome-box">
                <div class="welcome-text">
                    <h1>Welcome to APADE Uniform Management System</h1>
                    <p>Track, manage, and distribute school uniforms efficiently</p>
                </div>
                <div class="date-display">
                    <i class="fas fa-calendar-alt"></i> <?php echo date('F j, Y'); ?>
                </div>
            </div>

            <div class="stats">
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <div class="stat-value">2,584</div>
                    <div class="stat-label">Total Uniforms</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-value">1,250</div>
                    <div class="stat-label">Students Assigned</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <div class="stat-value">86</div>
                    <div class="stat-label">Pending Orders</div>
                </div>
                <div class="stat-item">
                    <div class="stat-icon">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="stat-value">14</div>
                    <div class="stat-label">Low Stock Items</div>
                </div>
            </div>

            <div class="recent-activity">
                <h2><i class="fas fa-history"></i> Recent Activity</h2>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-plus"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-title">New Uniform Stock Added</div>
                            <div class="activity-time">Today, 10:30 AM - 200 units of Shirts (Size M) were added to inventory</div>
                        </div>
                        <span class="activity-status status-completed">Completed</span>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-exchange-alt"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-title">Uniform Distribution</div>
                            <div class="activity-time">Yesterday, 2:15 PM - 45 uniforms distributed to Grade 10 students</div>
                        </div>
                        <span class="activity-status status-completed">Completed</span>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-title">Order Placed with Supplier</div>
                            <div class="activity-time">May 05, 2025 - Order #UMS-2025-057 placed with TextilePro Inc.</div>
                        </div>
                        <span class="activity-status status-pending">Pending</span>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-times"></i>
                        </div>
                        <div class="activity-details">
                            <div class="activity-title">Order Cancellation</div>
                            <div class="activity-time">May 03, 2025 - Order #UMS-2025-054 cancelled due to quality issues</div>
                        </div>
                        <span class="activity-status status-cancelled">Cancelled</span>
                    </li>
                </ul>
            </div>

            <div class="dashboard">
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h2>Inventory Management</h2>
                    <p>Manage uniform stock levels, categories, sizes, and check inventory status.</p>
                    <div class="card-footer">
                        <a href="inventory.php" class="btn">Manage Inventory</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h2>Supplier Management</h2>
                    <p>Manage uniform suppliers, track orders, and maintain supplier relationships.</p>
                    <div class="card-footer">
                        <a href="suppliers.php" class="btn">Manage Suppliers</a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-icon">
                        <i class="fas fa-clipboard-list"></i>
                    </div>
                    <h2>Order Management</h2>
                    <p>Create and manage uniform orders, track deliveries, and handle returns.</p>
                    <div class="card-footer">
                        <a href="orders.php" class="btn">Manage Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.getElementById('menu-toggle');
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    const menu = document.getElementById('main-menu');
                    menu.classList.toggle('active');
                });
            }
            const currentPage = '<?php echo $current_page; ?>';
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.classList.add('active');
                }
            });
        });
    </script>
</body>
</html>