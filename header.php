<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apade School Uniform Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f5f5f5;
        }
        header {
            background: linear-gradient(135deg,rgb(0, 132, 155),rgb(8, 83, 88));
            color: white;
            padding: 1rem 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        .header-container {
            max-width: 1400px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .logo img {
            height: 60px;
        }
        .logo h1 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .logo h1 a {
            color: white;
            text-decoration: none;
            transition: color 0.3s;
        }
        .logo h1 a:hover {
            color: #f8c537;
        }
        nav {
            display: flex;
            align-items: center;
        }
        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
            margin-right: 2rem;
        }
        nav li {
            position: relative;
        }
        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            font-size: 1.1rem;
            padding: 0.5rem 0;
            transition: all 0.3s ease;
            position: relative;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        nav a:hover {
            color: #f8c537;
        }

        nav a.active {
            color: #fff;
            font-weight: 600;
        }

        nav a.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #f8c537;
        }

        nav a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #f8c537;
            transition: width 0.3s ease;
        }

        nav a:hover::after {
            width: 100%;
        }
        .dropdown-card {
            position: absolute;
            top: 100%;
            left: 50%;
            transform: translateX(-50%) translateY(10px);
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            min-width: 280px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 100;
        }

        .dropdown-card::before {
            content: '';
            position: absolute;
            bottom: 100%;
            left: 50%;
            transform: translateX(-50%);
            border-width: 8px;
            border-style: solid;
            border-color: transparent transparent white transparent;
        }

        nav li:hover .dropdown-card {
            opacity: 1;
            visibility: visible;
            transform: translateX(-50%) translateY(0);
        }

        .dropdown-card h3 {
            color: #1a3a6b;
            margin-bottom: 1rem;
            font-size: 1.2rem;
            border-bottom: 1px solid #eee;
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dropdown-card ul {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .dropdown-card a {
            color: #4a5568;
            font-size: 1rem;
            padding: 0.25rem 0;
            transition: all 0.2s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .dropdown-card a:hover {
            color: #2a5a8a;
            padding-left: 5px;
        }

        .dropdown-card p {
            color: #4a5568;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .stats-card {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .stat-item {
            background-color: #f8f9fa;
            padding: 0.75rem;
            border-radius: 6px;
            text-align: center;
        }

        .stat-value {
            font-weight: 700;
            color: #1a3a6b;
            font-size: 1.2rem;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #718096;
        }
        .search-container {
            position: relative;
        }

        .search-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 30px;
            padding: 0.5rem 1rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .search-box i {
            color: #718096;
            margin-right: 0.5rem;
        }

        .search-box input {
            border: none;
            outline: none;
            padding: 0.5rem;
            width: 250px;
            font-size: 0.9rem;
        }

        .search-box button {
            background:rgb(0, 132, 165);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            cursor: pointer;
            font-weight: 500;
            transition: background 0.3s;
        }

        .search-box button:hover {
            background:rgb(0, 131, 148);
        }
        .menu-toggle {
            display: none;
            cursor: pointer;
            font-size: 1.5rem;
            color: white;
        }
        @media (max-width: 1024px) {
            .header-container {
                flex-direction: column;
                align-items: stretch;
                gap: 1rem;
            }

            nav {
                order: 3;
                width: 100%;
                margin-top: 1rem;
            }

            .logo {
                margin-bottom: 0.5rem;
            }

            .search-container {
                order: 2;
                width: 100%;
                margin: 0.5rem 0;
            }
            .search-box {
                width: 100%;
            }

            .search-box input {
                width: 100%;
            }
        }
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 0;
                display: none;
                width: 100%;
                margin-right: 0;
            }
            nav ul.active {
                display: flex;
            }
            nav li {
                padding: 0.75rem 0;
                border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            }
            .dropdown-card {
                position: static;
                transform: none;
                opacity: 1;
                visibility: visible;
                display: none;
                width: 100%;
                margin-top: 0.5rem;
                box-shadow: none;
                background-color: rgba(0, 0, 0, 0.1);
                border-radius: 4px;
            }

            nav li.active .dropdown-card {
                display: block;
            }

            .dropdown-card::before {
                display: none;
            }

            .menu-toggle {
                display: block;
                position: absolute;
                top: 1.5rem;
                right: 2rem;
            }

            .stats-card {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="index.php"> <img src="logo-APADE.2x.webp" alt="Apade Logo"></a> 
                <h1><a href="index.php">Apade School Uniform</a></h1>
            </div
            <div class="search-container">
                <form method="get" action="search.php" class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" name="search" placeholder="Search by name, ID or class..." required>
                    <button type="submit">Search</button>
                </form>
            </div>
            <nav>
                <ul id="main-menu">
                    <li>
                        <a href="index.php" <?php echo ($current_page == 'index.php') ? 'class="active"' : ''; ?>>
                            <i class="fas fa-home"></i> Home
                        </a>
                    </li>
                    <li>
                        <a href="inventory.php" <?php echo ($current_page == 'inventory.php') ? 'class="active"' : ''; ?>>
                            <i class="fas fa-tshirt"></i> Inventory
                        </a>
                        <div class="dropdown-card">
                            <h3><i class="fas fa-tshirt"></i> Uniform Inventory</h3>
                            <p>Manage your school uniform stock levels, sizes, and variants.</p>
                            <ul>
                                <li><a href="inventory.php"><i class="fas fa-list"></i> View All Items</a></li>
                            </ul>
                            <div class="stats-card">
                                <div class="stat-item">
                                    <div class="stat-value">1,250</div>
                                    <div class="stat-label">Items in Stock</div>
                                </div>
                                <div class="stat-item">
                                    <div class="stat-value">28</div>
                                    <div class="stat-label">Low Stock Items</div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <a href="orders.php" <?php echo ($current_page == 'orders.php') ? 'class="active"' : ''; ?>>
                            <i class="fas fa-shopping-cart"></i> Orders
                        </a>
                        <div class="dropdown-card">
                            <h3><i class="fas fa-shopping-cart"></i> Order Management</h3>
                            <p>Process and track uniform orders from students and parents.</p>
                            <ul>
                                <li><a href="orders.php"><i class="fas fa-plus"></i> New Order</a></li>
                                 
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="suppliers.php" <?php echo ($current_page == 'suppliers.php') ? 'class="active"' : ''; ?>>
                            <i class="fas fa-truck"></i> Suppliers
                        </a>
                        <div class="dropdown-card">
                            <h3><i class="fas fa-truck"></i> Supplier Network</h3>
                            <p>Manage relationships with uniform manufacturers and distributors.</p>
                            <ul>
                                <li><a href="suppliers.php"><i class="fas fa-building"></i> Active Suppliers</a></li>
                                <li><a href="orders.php"><i class="fas fa-file-invoice-dollar"></i> Purchase Orders</a></li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="about.php" <?php echo ($current_page == 'about.php') ? 'class="active"' : ''; ?>>
                            <i class="fas fa-info-circle"></i> About
                        </a>
                        <div class="dropdown-card">
                            <h3><i class="fas fa-info-circle"></i> About Our System</h3>
                            <p>The Apade Uniform Management System helps schools efficiently manage uniform inventory, orders, and distribution.</p>
                            <ul>
                                <li><a href="team.php
                                "><i class="fas fa-users"></i> Our Team</a></li>
                                <li><a href="contact.php"><i class="fas fa-phone"></i> Contact Support</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="menu-toggle" id="menu-toggle">☰</div>
            </nav>
        </div>
    </header>
    <script>
        document.getElementById('menu-toggle').addEventListener('click', function() {
            const menu = document.getElementById('main-menu');
            menu.classList.toggle('active');
        });
        if (window.innerWidth <= 768) {
            const navItems = document.querySelectorAll('nav li');
            navItems.forEach(item => {
                if (item.querySelector('.dropdown-card')) {
                    item.addEventListener('click', function(e) {
                        if (e.target.tagName === 'A' && e.target.parentElement.parentElement.classList.contains('dropdown-card')) {
                            return;
                        }
                        this.classList.toggle('active');
                        e.stopPropagation();
                    });
                }
            });
            document.addEventListener('click', function() {
                navItems.forEach(item => {
                    item.classList.remove('active');
                });
            });
        }
    </script>
</body>
</html>