<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supplier Management | APADE UMS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <style>
        <?php include 'style.css'; ?>
        .suppliers-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .supplier-card {
            background: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        .supplier-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .supplier-header {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        .supplier-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #4361ee;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 20px;
            margin-right: 15px;
        }
        .supplier-name {
            font-weight: 600;
            font-size: 18px;
        }
        .supplier-contact {
            margin-top: 5px;
            font-size: 14px;
            color: #666;
        }
        .supplier-details {
            margin-top: 15px;
        }
        .detail-row {
            display: flex;
            margin-bottom: 8px;
            font-size: 14px;
        }
        .detail-label {
            width: 100px;
            color: #666;
        }
        .detail-value {
            flex: 1;
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <div class="suppliers-grid">
            <?php
            $suppliers = [
                [
                    'name' => 'Icyangwe Inc.',
                    'contact' => 'Irakoze Olga',
                    'email' => 'irakozeolga4@gmail.com',
                    'phone' => '(250) 788-123456',
                    'items' => 'Shirts, Pants, Sweaters',
                    'lead_time' => '2 weeks'
                ],
                [
                    'name' => 'Icyangwe Inc.',
                    'contact' => 'Higiro Oscar',
                    'email' => 'higirooscar12@gmail.com',
                    'phone' => '(250) 788-654321',
                    'items' => 'Skirts, Ties, Belts',
                    'lead_time' => '1 week'
                ],
                [
                    'name' => 'Icyangwe Inc.',
                    'contact' => 'Ishimwe Jasmine',
                    'email' => 'ishimwejasmine@gmail.com',
                    'phone' => '(250) 788-987654',
                    'items' => 'Shoes, Socks',
                    'lead_time' => '3 weeks'
                ]
            ];
            foreach ($suppliers as $supplier) {
                $initials = '';
                $name_parts = explode(' ', $supplier['name']);
                foreach ($name_parts as $part) {
                    $initials .= strtoupper(substr($part, 0, 1));
                }
                echo '<div class="supplier-card">
                    <div class="supplier-header">
                        <div class="supplier-avatar">'.$initials.'</div>
                        <div>
                            <div class="supplier-name">'.$supplier['name'].'</div>
                            <div class="supplier-contact">'.$supplier['contact'].'</div>
                        </div>
                    </div>
                    <div class="supplier-details">
                        <div class="detail-row">
                            <div class="detail-label">Email:</div>
                            <div class="detail-value">'.$supplier['email'].'</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Phone:</div>
                            <div class="detail-value">'.$supplier['phone'].'</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Items:</div>
                            <div class="detail-value">'.$supplier['items'].'</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Lead Time:</div>
                            <div class="detail-value">'.$supplier['lead_time'].'</div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
    <?php include 'footer.php'; ?>
</body>
</html>