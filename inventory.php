<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management | APADE UMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <link rel="stylesheet" href="style.css">     
    <style>
        .inventory-container {
            display: grid;
            grid-template-columns: 250px 1fr;
            gap: 20px;
        }
        .inventory-sidebar {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .inventory-main {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .category-list {
            list-style: none;
        }
        .category-list li {
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .category-list li a {
            color: #333;
            text-decoration: none;
        }
        .category-list li a:hover {
            color: #4361ee;
        }
        .inventory-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .inventory-item {
            border: 1px solid #eee;
            border-radius: 8px;
            padding: 15px;
            transition: all 0.3s;
        }
        .inventory-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .item-image {
            height: 120px;
            background: #f5f5f5;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .item-image img {
            max-width: 100%;
            max-height: 100%;
        }
        .item-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        .item-stock {
            font-size: 12px;
            color: #666;
        }
        .stock-low {
            color: #f44336;
        }
        .stock-medium {
            color: #ff9800;
        }
        .stock-high {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Inventory Management</h1>
        </div>
        <div class="inventory-container">
            <div class="inventory-sidebar">
                <h3>Categories</h3>
                <ul class="category-list">
                    <li><a href="#">All Items</a></li>
                    <li><a href="#">Shirts</a></li>
                    <li><a href="#">Pants</a></li>
                    <li><a href="#">Skirts</a></li>
                    <li><a href="#">Sweaters</a></li>
                    <li><a href="#">Shoes</a></li>
                </ul>
            </div>
            <div class="inventory-main">
                <div class="inventory-grid">
                    <?php
                    $inventory_items = [
                        ['name' => 'White Shirt', 'category' => 'Shirts', 'stock' => 45],
                        ['name' => 'Blue Pants', 'category' => 'Pants', 'stock' => 12],
                        ['name' => 'Plaid Skirt', 'category' => 'Skirts', 'stock' => 8],
                        ['name' => 'School Sweater', 'category' => 'Sweaters', 'stock' => 23],
                        ['name' => 'Black Shoes', 'category' => 'Shoes', 'stock' => 5],
                        ['name' => 'School Tie', 'category' => 'Accessories', 'stock' => 32]
                    ];
                    foreach ($inventory_items as $item) {
                        $stock_class = '';
                        if ($item['stock'] < 10) $stock_class = 'stock-low';
                        elseif ($item['stock'] < 20) $stock_class = 'stock-medium';
                        else $stock_class = 'stock-high';
                        echo '<div class="inventory-item">
                            <div class="item-image">
                            <img src="5.jpg" alt="">
                            </div>
                            <div class="item-name">'.$item['name'].'</div>
                            <div class="item-category">'.$item['category'].'</div>
                            <div class="item-stock '.$stock_class.'">Stock: '.$item['stock'].'</div>
                        </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
                </div>
    <?php include 'footer.php'; ?>
</body>
</html>