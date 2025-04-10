<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minto - About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
/* Internal Styles for About Us Page */
:root {
    --light-gray: #f9f9f9;
    --deep-green: #48705A;
    --sage-green: #6E9277;
    --dark-gray: #333;
}

body {
    font-family: Arial, sans-serif;
    background: #d8efe1;
    color: var(--dark-gray);
}

.about-section {
    background-color: transparent;
    padding: 80px 0;
}

.about-section h2 {
    color: var(--deep-green);
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.about-section p {
    font-size: 1.1rem;
    color: var(--dark-gray);
    line-height: 1.6;
    text-align: center;
}

.mission-box, .vision-box, .values-box, .quote-box, .history-box {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 40px; /* Consistent margin for each block */
}

.mission-box h3, .vision-box h3, .values-box h3 {
    color: var(--deep-green);
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 20px;
}

.mission-box p, .vision-box p, .values-box p {
    font-size: 1.1rem;
    color: var(--dark-gray);
    line-height: 1.6;
}

.quote-box {
    background-color: var(--sage-green);
    color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    margin-bottom: 40px;
    text-align: center;
}

.quote-box p {
    font-style: italic;
    font-size: 1.3rem;
}

.team-member {
    background-color: white;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 40px; /* Consistent margin for each team member */
}

.team-member:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}

.team-member img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    margin-bottom: 20px; /* Consistent margin for the image */
}

.team-member h4 {
    color: var(--deep-green);
    font-size: 1.8rem;
    font-weight: bold;
    margin-bottom: 10px;
}

.team-member p {
    font-size: 1rem;
    color: var(--dark-gray);
    line-height: 1.6;
}

.team-member .description {
    font-style: italic;
    margin-top: 10px;
}


@media (max-width: 768px) {
    .about-section h2 {
        font-size: 2rem;
    }

    .team-member img {
        width: 100px;
        height: 100px;
    }

    .team-member h4 {
        font-size: 1.5rem;
    }

    .footer .row {
        flex-direction: column;
    }
}
</style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand fw-bold" href="home.php">Minto</a>
            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Dashboard</a>
                    </li>
                    <!-- Trackers Dropdown (Moved here) -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="trackersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Trackers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="trackersDropdown">
                            <li><a class="dropdown-item" href="income.php">Income</a></li>
                            <li><a class="dropdown-item" href="expenses.php">Expenses</a></li>
                            <li><a class="dropdown-item" href="transaction-history.php">Transactions</a></li>
                            <li><a class="dropdown-item" href="savings.php">Savings</a></li>
                            <li><a class="dropdown-item" href="debt.php">Debt</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="budget.html">Budget</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="analytics.html">Analytics</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.html">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="learn.html">Learn</a>
                    </li>
                    <!-- Profile Dropdown with Icon -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="person1.jpg" alt="User" width="30" height="30" class="rounded-circle">
                            <span>Profile</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="profile.html">View Profile</a></li>
                            <li><a class="dropdown-item" href="settings.html">Settings</a></li>
                            <li><a class="dropdown-item" href="notifications.html">Notifications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="login.html">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<!-- About Us Section -->
<section class="about-section">
    <div class="container">
        <h2 class="text-center mb-2 fw-bold">About Us</h2>
        <p class="lead text-center mb-5">
            Welcome to <strong>Minto</strong> — your trusted partner in personal finance. <br>
            We’re on a mission to simplify financial tracking and empower every individual to take control of their money, effortlessly.
        </p>
        
        <!-- Mission and Vision Blocks Side by Side -->
        <div class="row mb-1">
            <div class="col-md-6">
                <div class="p-4 bg-white shadow-sm rounded h-70 mission-box">
                    <h3 class="text-center text-success fw-semibold mb-3">Our Mission</h3>
                    <p>
                        To equip individuals and families with smart, intuitive tools and the financial knowledge they need to thrive — encouraging confidence, control, and clarity in their money matters.
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-4 bg-white shadow-sm rounded h-70 vision-box">
                    <h3 class="text-center text-success fw-semibold mb-3">Our Vision</h3>
                    <p>
                        To create a world where financial wellness is universal — where every person has access to tools that make money management easy, accessible, and empowering.
                    </p>
                </div>
            </div>
        </div>
        
        <!-- Values Box -->
        <div class="mb-5 values-box">
            <div class="p-1 bg-white  rounded">
                <h3 class="text-center text-success fw-semibold mb-3">Our Core Values</h3>
                <p><strong>🔍 Integrity:</strong> We’re committed to honesty, transparency, and trust in everything we do.</p>
                <p><strong>👥 User First:</strong> Every feature is built with simplicity, accessibility, and real user needs in mind.</p>
                <p><strong>🚀 Innovation:</strong> We embrace change and continuously evolve to meet the financial needs of today and tomorrow.</p>
                <p><strong>🌱 Community:</strong> We believe in the power of support and shared knowledge to build lasting financial confidence.</p>
            </div>
        </div>
        
        <!-- Brief History -->
        <div class="mb-5 history-box">
            <div class="p-1 bg-white rounded">
                <h3 class="text-center text-success fw-semibold mb-3">Brief History</h3>
                <p>
                    Minto was founded in 2025 by Khushi Bagaria, Ayush Anthwal, and Nishchay Shetty with the goal of making financial tracking simple and accessible. Our journey began with a shared belief that financial management should be intuitive and user-friendly, enabling individuals to take control of their financial futures. Over the years, we have expanded our team of experts in finance, technology, and user experience to deliver comprehensive financial tracking solutions. We are proud to serve a growing community of users who trust Minto to help them manage their finances effectively.
                </p>
            </div>
        </div>
        
        <!-- Meet Our Team -->
        <h2 class="mt-5 mb-4 text-center">Meet Our Team</h2>
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="images/team1.jpg" alt="Khushi Bagaria" class="mb-3">
                    <h4 class="text-success fw-semibold">Khushi Bagaria</h4>
                    <p class="fw-medium">Co-Founder</p>
                    <p class="description">
                        "My vision is to create a world where finance is accessible and empowering for everyone. At Minto, we're building tools that democratize financial literacy and control, helping users achieve financial freedom."
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="images/team2.jpg" alt="Ayush Anthwal" class="mb-3">
                    <h4 class="text-success fw-semibold">Ayush Anthwal</h4>
                    <p class="fw-medium">Co-Founder</p>
                    <p class="description">
                        "Innovation meets simplicity. I'm passionate about crafting technology that makes complex financial tasks effortless. Let's build a future where everyone can manage their finances with ease."
                    </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="team-member text-center">
                    <img src="images/team3.jpg" alt="Nishchay Shetty" class="mb-3">
                    <h4 class="text-success fw-semibold">Nishchay Shetty</h4>
                    <p class="fw-medium">Co-Founder</p>
                    <p class="description">
                        "Empowering individuals to make smart financial decisions is my passion. With Minto, we're bridging the gap between knowledge and action, helping users achieve financial freedom."
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <p>© 2025 Minto. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>