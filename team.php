<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Apade Uniform Management System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="logo-APADE.2x.png" type="x-icon">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        .about-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        .page-header {
            text-align: center;
            margin-bottom: 3rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f8c537;
        }
        .page-header h1 {
            color: #1a3a6b;
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        .page-header p {
            color: #4a5568;
            font-size: 1.1rem;
            max-width: 800px;
            margin: 0 auto;
        }
        .mission-section {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin-bottom: 3rem;
        }

        .mission-section h2 {
            color: #1a3a6b;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .mission-section h2 i {
            color: #f8c537;
        }
        .team-section h2 {
            text-align: center;
            color: #1a3a6b;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .team-member {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }

        .team-member:hover {
            transform: translateY(-5px);
        }

        .member-image {
            height: 250px;
            background-color: #e2e8f0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #718096;
            font-size: 4rem;
        }

        .member-info {
            padding: 1.5rem;
        }

        .member-info h3 {
            color: #1a3a6b;
            margin-bottom: 0.5rem;
            font-size: 1.4rem;
        }

        .member-role {
            color: #f8c537;
            font-weight: 600;
            margin-bottom: 1rem;
            display: block;
        }

        .member-bio {
            color: #4a5568;
            margin-bottom: 1.5rem;
        }

        .member-social {
            display: flex;
            gap: 1rem;
        }

        .member-social a {
            color: #718096;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .member-social a:hover {
            color: #1a3a6b;
        }
        .features-section {
            margin: 4rem 0;
        }

        .features-section h2 {
            text-align: center;
            color: #1a3a6b;
            margin-bottom: 2rem;
            font-size: 2rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
        }

        .feature-card {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        .feature-icon {
            font-size: 2.5rem;
            color: #f8c537;
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            color: #1a3a6b;
            margin-bottom: 1rem;
        }

        .feature-card p {
            color: #4a5568;
        }
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            .team-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="about-container">
        <section class="page-header">
            <h1>About Apade Uniform Management System</h1>
            <p>Streamlining school uniform distribution with innovative technology solutions designed for educational institutions.</p>
        </section>
        <section class="mission-section">
            <h2><i class="fas fa-bullseye"></i> Our Mission</h2>
            <p>The Apade Uniform Management System was created to solve the challenges schools face in managing uniform inventory, orders, and distribution. Our platform provides a comprehensive solution that saves time, reduces errors, and ensures every student has access to properly fitted uniforms.</p>
            <p>By digitizing the entire uniform management process, we help schools maintain accurate records, optimize inventory levels, and provide better service to students and parents.</p>
        </section>
        <section class="team-section">
            <h2>Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="member-info">
                        <h3>Ineza Fabrice</h3>
                        <span class="member-role">Co-Founder & Lead Developer</span>
                        <p class="member-bio">Fabrice is a full-stack developer with 2 years of experience in building educational management systems. He specializes in creating intuitive user interfaces and robust backend architectures.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="member-info">
                        <h3>Gatete Frank</h3>
                        <span class="member-role">Co-Founder & System Architect</span>
                        <p class="member-bio">Frank brings expertise in database design and system integration. With a background in both education and technology, he ensures our solutions meet real-world school requirements.</p>
                        <div class="member-social">
                            <a href="#"><i class="fab fa-linkedin"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-github"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="features-section">
            <h2>System Features</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tshirt"></i>
                    </div>
                    <h3>Inventory Management</h3>
                    <p>Track uniform items by size, color, and style with real-time stock updates and low inventory alerts.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>Order Processing</h3>
                    <p>Streamline the ordering process with automated workflows and status tracking for students and parents.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-truck"></i>
                    </div>
                    <h3>Supplier Integration</h3>
                    <p>Manage relationships with uniform suppliers and automate purchase orders when stock runs low.</p>
                </div>
            </div>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const aboutLink = document.querySelector('nav a[href="about.php"]');
            if (aboutLink) {
                aboutLink.classList.add('active');
            }
        });
    </script>
</body>
</html>