<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Feedback - Minto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css" />
  <style>
    body{
      background-color:#d8efe1;
    }
    .feedback-form {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .btn-minto {
      background-color: var(--sage-green);
      color: white;
      border: none;
      transition: 0.3s;
    }

    .btn-minto:hover {
      background-color: var(--deep-green);
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
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
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

  <!-- Feedback Form Section -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4 fw-bold" style="color: rgb(16, 102, 63);">We'd Love Your Feedback!</h2>
          <div class="feedback-form">
            <form>
              <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
              </div>
              <div class="mb-3">
                <label for="rating" class="form-label fw-semibold">How would you rate Minto?</label>
                <select class="form-select" id="rating" required>
                  <option value="" disabled selected>Select a rating</option>
                  <option value="5">⭐️⭐️⭐️⭐️⭐️ - Excellent</option>
                  <option value="4">⭐️⭐️⭐️⭐️ - Very Good</option>
                  <option value="3">⭐️⭐️⭐️ - Good</option>
                  <option value="2">⭐️⭐️ - Fair</option>
                  <option value="1">⭐️ - Poor</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="comments" class="form-label fw-semibold">Comments</label>
                <textarea class="form-control" id="comments" rows="4" placeholder="Your suggestions, feedback or experience" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-minto px-4">Submit Feedback</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Company</h5>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Press</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Support</h5>
          <ul>
            <li><a href="#">Help Center</a></li>
            <li><a href="#">Contact Us</a></li>
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
      <p class="mt-4">© 2025 Minto. All rights reserved.</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
