
</main>
<footer>
    <div class="footer-container">
        <div class="footer-section about">
            <h3>School Uniform System</h3>
            <p>Streamlining uniform orders and payments for schools</p>
            <div class="social-icons">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="index.php"><i class="fas fa-angle-right"></i> Home</a></li>
                <li><a href="orders.php"><i class="fas fa-angle-right"></i> Add Student</a></li>
                <li><a href="search.php"><i class="fas fa-angle-right"></i> Search Student</a></li>
            </ul>
        </div>
        <div class="footer-section contact">
            <h3>Contact</h3>
            <p><i class="fas fa-store"></i> Apade Tailor Shop</p>
            <p><i class="fas fa-phone"></i> +250 788 506 669</p>
            <p><i class="fas fa-envelope"></i> info@apadetailor.com</p>
        </div>
        <div class="footer-section creators">
            <h3>Creators</h3>
            <ul>
                <li><i class="fas fa-user-circle"></i> Ineza Fabrice</li>
                <li><i class="fas fa-user-circle"></i> Gatete Frank</li>
            </ul>
        </div>
       

    </div>
    <div class="copyright">
        <p>&copy; <?php echo date('Y'); ?> Apade Uniform Management System. All rights reserved.</p>
    </div>
</footer>
<style>
footer {
    background-color:rgb(0, 136, 160);
    color: #fff;
    padding-top:0 40px ;
    margin-top: 50px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    padding:  20px ;
    padding-left:50px;
    padding-right: 50px;
}
.footer-section {
    margin-bottom: 20px;
}
.footer-section h3 {
    color: #ffd700;
    font-size: 1.2rem;
    margin-bottom: 15px;
    padding-bottom: 10px;
    position: relative;
    font-weight: 600;
}
.footer-section h3::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 50px;
    height: 2px;
    background-color: #ffd700;
}

.footer-section p {
    margin-bottom: 10px;
    color: #e0e0e0;
    line-height: 1.6
}
.footer-section ul {
    list-style: none;
}
.footer-section ul li {
    margin-bottom: 10px;
}
.footer-section ul li a {
    color: #e0e0e0;
    text-decoration: none;
    transition: color 0.3s;
    display: inline-block;
}

.footer-section ul li a:hover {
    color: #ffd700;
    transform: translateX(5px);
}
.footer-section i {
    margin-right: 8px;
    width: 16px;
    text-align: center;
}
.social-icons {
    margin-top: 15px;
    display: flex;
    gap: 15px;
}
.social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 36px;
    height: 36px;
    color: #fff;
    transition: all 0.3s;
    text-decoration: none;
}
.social-icons a:hover {
    background-color: #ffd700;
    color: #1a4b8c;
    text-decoration:none;
}
.copyright {
    background-color: rgba(0, 0, 0, 0.2);
    text-align: center;
    padding: 15px 0;
    font-size: 0.9rem;
}
@media (max-width: 768px) {
    .footer-container {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    .footer-section {
        margin-bottom: 20px;
    }
}
</style>
</body>
</html>