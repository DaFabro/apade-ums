<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | APADE Uniform Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        <?php include 'style.css'; ?>
        .about-container {
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .about-header {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .about-header h1 {
            font-size: 2.5rem;
            color: #1e4620;
            margin-bottom: 15px;
        }
        
        .about-header p {
            font-size: 1.1rem;
            color: #555;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .about-section {
            margin-bottom: 40px;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }
        
        .about-section h2 {
            color: #1e4620;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e0e0e0;
        }
        
        .about-section p {
            line-height: 1.8;
            margin-bottom: 15px;
            color: #444;
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        
        .feature-card {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            border-left: 4px solid rgb(2, 119, 128);
            transition: transform 0.3s;
        }
        
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .feature-card i {
            font-size: 2rem;
            color:rgb(0, 110, 129);
            margin-bottom: 15px;
        }
        
        .feature-card h3 {
            margin-bottom: 10px;
            color: #1e4620;
        }
        
        .team-members {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        
        .team-card {
            background: white;
            width: 200px;
            padding: 20px;
            text-align: center;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .team-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 3px solid rgb(0, 131, 136);
        }
        
        .team-card h3 {
            margin-bottom: 5px;
            color: #1e4620;
        }
        
        .team-card p {
            color: #666;
            font-size: 0.9rem;
        }
        
        .contact-info {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .contact-method {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .contact-method i {
            width: 40px;
            height: 40px;
            background:rgb(0, 124, 155);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.2rem;
        }
        
        .contact-method div h3 {
            margin-bottom: 5px;
            color: #1e4620;
        }
        
        .contact-method div p {
            color: #666;
        }
        
        .version-info {
            background: #f5f5f5;
            padding: 15px;
            border-radius: 8px;
            margin-top: 30px;
            font-size: 0.9rem;
            color: #666;
        }
    </style>
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
</head>
<body>
    <?php include 'header.php'; ?>
    
    <div class="container">
        <div class="about-container">
            <div class="about-header">
                <h1>About APADE Uniform Management System</h1>
                <p>Streamlining uniform distribution and management for APADE School to ensure every student has proper attire with minimal administrative effort.</p>
            </div>
            
            <div class="about-section">
                <h2>Our Mission</h2>
                <p>The APADE Uniform Management System was developed to modernize and simplify the process of uniform distribution, inventory management, and payment tracking for our school community. Our mission is to ensure that every student has access to proper school attire while reducing the administrative burden on school staff.</p>
                <p>By digitizing what was previously a manual process, we aim to improve efficiency, reduce errors, and provide better visibility into uniform inventory and distribution across all grade levels.</p>
            </div>
            
            <div class="about-section">
                <h2>Key Features</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <i class="fas fa-user-graduate"></i>
                        <h3>Student Management</h3>
                        <p>Track all student uniform assignments, sizes, and payment status in one centralized system.</p>
                    </div>
                    
                    <div class="feature-card">
                        <i class="fas fa-tshirt"></i>
                        <h3>Inventory Control</h3>
                        <p>Real-time tracking of uniform stock levels with automatic low-stock alerts and reordering suggestions.</p>
                    </div>
                    
                    <div class="feature-card">
                        <i class="fas fa-shopping-cart"></i>
                        <h3>Order Processing</h3>
                        <p>Streamlined order processing with digital receipts and payment tracking for parents and administrators.</p>
                    </div>
                    
                    <div class="feature-card">
                        <i class="fas fa-chart-line"></i>
                        <h3>Reporting</h3>
                        <p>Comprehensive reporting tools for analyzing uniform usage, financials, and distribution patterns.</p>
                    </div>
                    
                    <div class="feature-card">
                        <i class="fas fa-mobile-alt"></i>
                        <h3>Mobile Friendly</h3>
                        <p>Responsive design that works on all devices, allowing access from anywhere at any time.</p>
                    </div>
                    
                    <div class="feature-card">
                        <i class="fas fa-shield-alt"></i>
                        <h3>Secure Data</h3>
                        <p>Enterprise-grade security protecting all student and financial information with regular backups.</p>
                    </div>
                </div>
            </div>
            
            <div class="about-section">
                <h2>Development Team</h2>
                <p>This system was developed by APADE's IT department in collaboration with school administrators to create a solution tailored specifically to our school's needs.</p>
                
                <div class="team-members">
                    <div class="team-card">
                        <h3>Ineza Fabrice</h3>
                        <p>Lead Developer</p>
                    </div>

                    <div class="team-card">
                        <h3>Gatete Frank</h3>
                        <p>System Architect</p>
                    </div>
                </div>
            </div>
            
            <div class="about-section">
                <h2>Contact Us</h2>
                <p>For support, feature requests, or any questions about the Uniform Management System, please contact our team:</p>
                <div class="contact-info">
                    <div>
                        <div class="contact-method">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h3>Our Location</h3>
                                <p>APADE School Campus<br>Kigali, Rwanda</p>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <i class="fas fa-phone"></i>
                            <div>
                                <h3>Phone Support</h3>
                                <p>+250 788 506 669 456<br>Mon-Fri, 8am-5pm</p>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <div class="contact-method">
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h3>Email Support</h3>
                                <p>uniform-support@apade.edu.rw<br>Response within 24 hours</p>
                            </div>
                        </div>
                        
                        <div class="contact-method">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <h3>Training Sessions</h3>
                                <p>Monthly training available<br>Sign up through the office</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="version-info">
                <p><strong>APADE Uniform Management System</strong> | Version 2.1.0 | Last updated: May 2025</p>
                <p>© 2025 APADE School. All rights reserved.</p>
            </div>
        </div>
    </div>
    
    <?php include 'footer.php'; ?>
</body>
</html>