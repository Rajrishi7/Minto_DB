<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Minto Dashboard</title>

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />

  <!-- Chart.js & jQuery -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="styles.css">

  <!-- Custom Styles -->
  <style>
    body{
        background-color: #f5f5f5;
    }
    .card-income {
      background-color: #d5f6e0;
      color: #2f6846;
    }

    .card-expense {
      background-color: #fbe4e6;
      color: #82252d;
    }

    .card-balance {
      background-color: #e4ecfb;
      color: #244c8c;
    }

    .card h5 {
      font-weight: 600;
    }

    .display-6 {
      font-weight: bold;
    }

    .form-section select,
    .form-section input {
      font-size: 0.95rem;
    }

    .card {
    border: none;
    border-radius: 16px;
    transition: transform 0.2s ease-in-out;
    }

    .card:hover {
    transform: translateY(-3px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }

    .form-section .form-control,
    .form-section .form-select {
    border-radius: 10px;
    padding: 0.6rem 0.9rem;
    border: 1px solid #ccc;
    }

    .form-section button {
    font-weight: 500;
    }

    .card-title {
    font-size: 1.2rem;
    margin-bottom: 1rem;
    }

    canvas {
    max-height: 280px;
    }

    .bg-light {
    background-color: var(--light-gray) !important;
    }

  </style>
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    
      <!-- Brand -->
      <a class="navbar-brand fw-bold" href="home.html">Minto</a>

      <!-- Toggler for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navbar Links -->
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto align-items-center gap-3">

              <li class="nav-item">
                  <a class="nav-link" href="home.html">Dashboard</a>
              </li>

              <!-- Trackers Dropdown (Moved here) -->
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="trackersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Trackers
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="trackersDropdown">
                      <li><a class="dropdown-item" href="income.html">Income</a></li>
                      <li><a class="dropdown-item" href="expenses.html">Expenses</a></li>
                      <li><a class="dropdown-item" href="transactions.html">Transactions</a></li>
                      <li><a class="dropdown-item" href="savings.html">Savings</a></li>
                      <li><a class="dropdown-item" href="debt.html">Debt</a></li>
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

              <li class="nav-item">
                  <a class="nav-link" href="profile.html">Profile</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="settings.html">Settings</a>
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


<!-- Navigation Buttons -->
<section class="py-4">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-3 col-6">
                <a href="income.php" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-wallet-fill text-success mb-2 fs-3"></i>
                    <h5>Income Tracker</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="expenses.php" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-cash-stack text-danger mb-2 fs-3"></i>
                    <h5>Expense Tracker</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="budget.html" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-pie-chart-fill text-primary mb-2 fs-3"></i>
                    <h5>Budget</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="transaction-history.php" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-clock-history text-info mb-2 fs-3"></i>
                    <h5>Transactions</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="learn.php" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-book-fill text-warning mb-2 fs-3"></i>
                    <h5>Learn</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="profile.html" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-person-circle text-secondary mb-2 fs-3"></i>
                    <h5>Profile</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="settings.html" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-gear-fill text-dark mb-2 fs-3"></i>
                    <h5>Settings</h5>
                </a>
            </div>
            <div class="col-md-3 col-6">
                <a href="contact.html" class="btn btn-light w-100 p-4 shadow-sm rounded-4">
                    <i class="bi bi-envelope-fill text-success mb-2 fs-3"></i>
                    <h5>Contact</h5>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Quote Section -->
<section class="py-4">
    <div class="container">
      <div class="px-4 py-3 rounded-4 shadow-sm" style="background-color: #f7fcfa; border-left: 5px solid #6E9277;">
        <div class="d-flex flex-column align-items-center text-center">
          <i class="bi bi-chat-quote-fill text-success mb-2" style="font-size: 1.5rem;"></i>
          <h6 id="quoteText" class="fst-italic text-secondary" style="max-width: 700px;">
            Loading financial wisdom...
          </h6>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Dashboard Summary -->
  <div class="container my-5">
    <!-- Financial Summary -->
    <div class="row g-4 mb-4">
      <div class="col-md-4">
        <div class="card card-income shadow-sm text-center">
          <div class="card-body">
            <h5 class="card-title">Total Income</h5>
            <p id="totalIncome" class="display-6">₹0</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-expense shadow-sm text-center">
          <div class="card-body">
            <h5 class="card-title">Total Expenses</h5>
            <p id="totalExpense" class="display-6">₹0</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card card-balance shadow-sm text-center">
          <div class="card-body">
            <h5 class="card-title">Balance</h5>
            <p id="balance" class="display-6">₹0</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Enhanced Input Form -->
    <div class="row mb-5 form-section">
      <div class="col-md-3 mb-2">
        <input type="text" id="desc" class="form-control" placeholder="Description" />
      </div>
      <div class="col-md-2 mb-2">
        <input type="number" id="amount" class="form-control" placeholder="Amount" />
      </div>
      <div class="col-md-2 mb-2">
        <input type="date" id="date" class="form-control" />
      </div>
      <div class="col-md-2 mb-2">
        <select id="category" class="form-select">
          <option value="">Category</option>
          <option>Food</option>
          <option>Transport</option>
          <option>Entertainment</option>
          <option>Utilities</option>
          <option>Other</option>
        </select>
      </div>
      <div class="col-md-3 mb-2 d-flex gap-2">
        <button id="addIncome" class="btn btn-success w-50">Add Income</button>
        <button id="addExpense" class="btn btn-danger w-50">Add Expense</button>
      </div>
    </div>

    <!-- Charts -->
    <div class="row g-4">
      <div class="col-md-6">
        <div class="card shadow-sm p-3">
          <h5 class="card-title text-center">Spending Overview</h5>
          <canvas id="spendingChart"></canvas>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card shadow-sm p-3">
          <h5 class="card-title text-center">Income vs Expenses</h5>
          <canvas id="financeChart"></canvas>
        </div>
      </div>
    </div>
  </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Features</a></li>
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
            <p>© 2025 Minto. All rights reserved.</p>
        </div>
    </footer>


  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main Script -->
  <script>
      // Quote Fetcher
  $(document).ready(function () {
    $.get("https://api.quotable.io/random?tags=money|wisdom|financial", function (data) {
      $("#quoteText").text(`"${data.content}" — ${data.author}`);
    });
  });

    let income = 0;
    let expense = 0;

    const financeCtx = document.getElementById('financeChart').getContext('2d');
    const financeChart = new Chart(financeCtx, {
      type: 'doughnut',
      data: {
        labels: ['Income', 'Expenses'],
        datasets: [{
          data: [income, expense],
          backgroundColor: ['#28a745', '#dc3545'],
        }]
      },
      options: {
        plugins: {
          legend: { position: 'bottom' }
        }
      }
    });

    const spendingChart = new Chart($('#spendingChart'), {
      type: 'doughnut',
      data: {
        labels: ['Food', 'Bills', 'Leisure', 'Others'],
        datasets: [{
          data: [250, 400, 150, 100],
          backgroundColor: ['#6E9277', '#48705A', '#A9B7AC', '#B3C2B2'],
          borderColor: '#fff'
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: { position: 'bottom' }
        }
      }
    });

    function updateUI() {
      $('#totalIncome').text(`₹${income}`);
      $('#totalExpense').text(`₹${expense}`);
      $('#balance').text(`₹${income - expense}`);
      financeChart.data.datasets[0].data = [income, expense];
      financeChart.update();
    }

    $('#addIncome').click(() => {
      const amt = parseFloat($('#amount').val());
      if (!isNaN(amt)) {
        income += amt;
        updateUI();
      }
    });

    $('#addExpense').click(() => {
      const amt = parseFloat($('#amount').val());
      if (!isNaN(amt)) {
        expense += amt;
        updateUI();
      }
    });

  </script>
</body>
</html>
