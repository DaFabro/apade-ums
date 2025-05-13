<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Support - Apade Uniform Management System</title>
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
        .contact-container {
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

        /* Contact Grid Layout */
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        /* Contact Methods */
        .contact-method {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .contact-method:hover {
            transform: translateY(-5px);
        }

        .contact-icon {
            font-size: 2.5rem;
            color: #f8c537;
            margin-bottom: 1.5rem;
        }

        .contact-method h3 {
            color: #1a3a6b;
            margin-bottom: 1rem;
        }

        .contact-method p {
            color: #4a5568;
            margin-bottom: 1.5rem;
        }

        .contact-link {
            display: inline-block;
            background-color: #1a3a6b;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            transition: background-color 0.3s;
        }

        .contact-link:hover {
            background-color: #2a5a8a;
        }

        /* Contact Form */
        .contact-form-section {
            background-color: white;
            border-radius: 8px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            margin: 3rem 0;
        }

        .contact-form-section h2 {
            color: #1a3a6b;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #1a3a6b;
            font-weight: 500;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            font-size: 1rem;
            transition: border-color 0.3s;
        }

        .form-group input:focus,
        .form-group textarea:focus,
        .form-group select:focus {
            outline: none;
            border-color: #f8c537;
        }

        .form-group textarea {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background-color: #f8c537;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #e0b030;
        }
        .faq-section {
            margin: 3rem 0;
        }

        .faq-section h2 {
            color: #1a3a6b;
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 2rem;
        }

        .faq-item {
            background-color: white;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .faq-question {
            color: #1a3a6b;
            font-weight: 600;
            margin-bottom: 0.5rem;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .faq-question::after {
            content: '+';
            font-size: 1.5rem;
            color: #f8c537;
        }
        .faq-item.active .faq-question::after {
            content: '-';
        }
        .faq-answer {
            color: #4a5568;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
        }
        .faq-item.active .faq-answer {
            max-height: 500px;
            padding-top: 1rem;
        }
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 2rem;
            }
            .contact-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <?php include 'header.php'; ?>
    <main class="contact-container">
        <section class="page-header">
            <h1>Contact Support</h1>
            <p>Our team is ready to assist you with any questions about the Apade Uniform Management System. Choose your preferred contact method below.</p>
        </section>
        <div class="contact-grid">
            <div class="contact-method">
                <div class="contact-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3>Phone Support</h3>
                <p>Speak directly with our support team during business hours</p>
                <p><strong>+250 788 506 669</strong></p>
                <a href="tel:+250788123456" class="contact-link">Call Now</a>
            </div>
            <div class="contact-method">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Support</h3>
                <p>Send us your questions and we'll respond within 24 hours</p>
                <p><strong>support@apade.rw</strong></p>
                <a href="mailto:support@apade.rw" class="contact-link">Email Us</a>
            </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactLink = document.querySelector('nav a[href="contact.php"]');
            if (contactLink) {
                contactLink.classList.add('active');
            }
            const faqQuestions = document.querySelectorAll('.faq-question');
            faqQuestions.forEach(question => {
                question.addEventListener('click', () => {
                    const faqItem = question.parentElement;
                    faqItem.classList.toggle('active');
                    faqQuestions.forEach(q => {
                        if (q !== question && q.parentElement.classList.contains('active')) {
                            q.parentElement.classList.remove('active');
                        }
                    });
                });
            });
            const liveChatBtn = document.getElementById('live-chat-btn');
            if (liveChatBtn) {
                liveChatBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    alert('Our live chat is currently available Monday-Friday, 9am-5pm CAT. Please try during those hours or use our email/phone support.');
                });
            }
        });
    </script>
</body>
</html>