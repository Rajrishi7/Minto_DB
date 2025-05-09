<?php
include 'db_connect.php';
// Fetch expense summary
$total_expense_query = "SELECT SUM(amount) AS total_expense FROM transactions WHERE type = 'expense'";
$net_savings_query = "SELECT SUM(CASE WHEN type = 'income' THEN amount ELSE -amount END) AS net_savings FROM transactions";
$total_expense_result = $conn->query($total_expense_query);
$net_savings_result = $conn->query($net_savings_query);
$total_expense = $total_expense_result->fetch_assoc()['total_expense'] ?? 0;
$net_savings = $net_savings_result->fetch_assoc()['net_savings'] ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minto - Expenses</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Internal Styles for Expenses Page */
        .expense-section {
            background-color: var(--light-gray);
            padding: 40px 0; /* Reduced padding to reduce space above the heading */
        }
        .expense-section h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }
        .expense-section p {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
            text-align: center; /* Center the paragraph */
        }
        .expense-summary {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .expense-summary h3 {
            color: var(--deep-green);
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .expense-summary .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .expense-summary .summary-item label {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }
        .expense-summary .summary-item span {
            font-size: 1.1rem;
            color: var(--deep-green);
            font-weight: bold;
        }
        .expense-table {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .expense-table h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .expense-table table {
            width: 100%;
            border-collapse: collapse;
        }
        .expense-table th, .expense-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--dark-gray);
        }
        .expense-table th {
            background-color: var(--deep-green);
            color: white;
        }
        .expense-table .expense-row {
            background-color: #ffe6e6; /* Light red for expense */
        }
        .expense-table .update-btn, .expense-table .delete-btn {
            background-color: var(--deep-green);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .expense-table .update-btn:hover, .expense-table .delete-btn:hover {
            background-color: var(--sage-green);
        }
        .expense-table .delete-btn {
            background-color: #ff4d4d; /* Red for delete */
        }
        .expense-table .delete-btn:hover {
            background-color: #ff1a1a; /* Darker red for hover */
        }
        .expense-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .expense-form h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .expense-form .form-group label {
            color: var(--dark-gray);
            font-weight: 500;
        }
        .expense-form .form-control {
            border: 1px solid var(--dark-gray);
            border-radius: 5px;
        }
        .expense-form .btn-primary {
            background-color: var(--deep-green);
            border-color: var(--deep-green);
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }
        .expense-form .btn-primary:hover {
            background-color: var(--sage-green);
            border-color: var(--sage-green);
        }
        .info-box {
            background-color: var(--sage-green);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
        }
        .info-box p {
            font-style: italic;
            font-size: 1.2rem;
        }
        .info-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .info-item i {
            color: var(--deep-green);
            font-size: 1.5rem;
        }
        .info-item p {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }
        .map-link {
            color: var(--dark-gray);
            text-decoration: none;
        }
        .map-link:hover {
            text-decoration: underline;
        }
        .phone-link {
            color: var(--dark-gray);
            text-decoration: none;
        }
        .phone-link:hover {
            text-decoration: underline;
        }
        .expense-chart {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .expense-chart h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .expense-chart canvas {
            max-width: 100%;
            height: auto;
        }
        /* Hover Effects for Interactive Elements */
        .expense-table .update-btn:hover {
            background-color: var(--sage-green);
        }
        .expense-table .delete-btn:hover {
            background-color: #ff1a1a;
        }
        .expense-form .form-control:focus {
            border-color: var(--sage-green);
            box-shadow: 0 0 10px rgba(0, 123, 102, 0.25); /* Sage Green Shadow */
        }
        .expense-form .btn-primary:focus {
            box-shadow: 0 0 10px rgba(0, 123, 102, 0.5); /* Sage Green Shadow */
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .expense-table table {
                font-size: 0.9rem;
            }
            .expense-form .form-control {
                font-size: 0.9rem;
            }
            .expense-form .btn-primary {
                font-size: 1rem;
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
    <!-- Expenses Section -->
    <section class="expense-section py-5 border-bottom" style="background-color: #6E9277;">
        <div class="container">
            <div class="text-center mb-4">
                <h1 class="fw-bold display-5 text-white">Expenses</h1>
                <p class="lead text-muted">Track and manage your expenses with Minto. Gain insights into your spending habits.</p>
            </div>
            <!-- Filter Form -->
            <form class="row justify-content-center g-3">
                <!-- Search Bar -->
                <div class="col-md-6 col-sm-6">
                    <input type="text" class="form-control shadow-sm" id="searchInput" placeholder="Search expenses...">
                </div>
                <!-- Category -->
                <div class="col-md-4 col-sm-6">
                    <select class="form-select shadow-sm" id="filter-category">
                        <option value="" selected>All Categories</option>
                        <option value="rent" data-type="expense">Rent</option>
                        <option value="groceries" data-type="expense">Groceries</option>
                        <option value="transport" data-type="expense">Transport</option>
                        <option value="utilities" data-type="expense">Utilities</option>
                        <option value="shopping" data-type="expense">Shopping</option>
                        <option value="entertainment" data-type="expense">Entertainment</option>
                        <option value="education" data-type="expense">Education</option>
                        <option value="healthcare" data-type="expense">Healthcare</option>
                        <option value="debt-repayment" data-type="expense">Debt Repayment</option>
                        <option value="other-expenses" data-type="expense">Other Expenses</option>
                    </select>
                </div>
            </form>
        </div>
    </section>
    <section class="expense-section">
        <div class="container">
            <!-- Expense Summary -->
            <div class="expense-summary">
                <h3>Expense Summary</h3>
                <div class="summary-item">
                    <label>Total Expenses:</label>
                    <span>Rs. <?php echo number_format($total_expense); ?></span>
                </div>
                <div class="summary-item">
                    <label>Net Savings:</label>
                    <span>Rs. <?php echo number_format($net_savings); ?></span>
                </div>
            </div>
            <!-- Expense Table -->
            <div class="expense-table">
                <h2>Expense History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Amount (Rs.)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="expenseTableBody">
                        <?php
                        // Fetch expense history
                        $expense_history_query = "SELECT * FROM transactions WHERE type = 'expense'";
                        $expense_history_result = $conn->query($expense_history_query);
                        if ($expense_history_result->num_rows > 0) {
                            while ($row = $expense_history_result->fetch_assoc()) {
                                ?>
                                <tr class="expense-row">
                                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['time']); ?></td>
                                    <td><?php echo htmlspecialchars($row['category']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo number_format($row['amount']); ?></td>
                                    <td>
                                        <a href="update_expense.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="update-btn" style="text-decoration: none;">Update</a>
                                        <form method="POST" action="delete_expense.php" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6" class="text-center">No expenses found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <!-- Expense Form -->
            <div class="expense-form">
                <h2>Add New Expense</h2>
                <form method="POST" action="add_expense.php">
                    <div class="form-group mb-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="time">Time:</label>
                        <input type="time" class="form-control" id="time" name="time" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="rent" data-type="expense">Rent</option>
                            <option value="groceries" data-type="expense">Groceries</option>
                            <option value="transport" data-type="expense">Transport</option>
                            <option value="utilities" data-type="expense">Utilities</option>
                            <option value="shopping" data-type="expense">Shopping</option>
                            <option value="entertainment" data-type="expense">Entertainment</option>
                            <option value="education" data-type="expense">Education</option>
                            <option value="healthcare" data-type="expense">Healthcare</option>
                            <option value="debt-repayment" data-type="expense">Debt Repayment</option>
                            <option value="other-expenses" data-type="expense">Other Expenses</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="e.g., Grocery Shopping" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount (Rs.):</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="e.g., 2000" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Expense</button>
                </form>
            </div>
            <!-- Expense Chart -->
            <div class="expense-chart">
                <h2>Expense Trend Chart</h2>
                <canvas id="expenseChart"></canvas>
            </div>
            <!-- Info Box -->
            <div class="info-box">
                <p>"Understanding your expenses is the first step towards financial freedom. Let Minto help you track and manage your spending."</p>
                <small>- Sam Johnson, Financial Advisor</small>
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
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Features</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;
            const hours = String(today.getHours()).padStart(2, '0');
            const minutes = String(today.getMinutes()).padStart(2, '0');
            const formattedTime = `${hours}:${minutes}`;
            document.getElementById('date').value = formattedDate;
            document.getElementById('time').value = formattedTime;
            // Fetch data for the chart
            fetch('get_expense_data.php')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('expenseChart').getContext('2d');
                    const expenseChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Expenses',
                                data: data.values,
                                backgroundColor: 'rgba(255, 102, 102, 0.2)',
                                borderColor: 'rgba(255, 102, 102, 1)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    ticks: {
                                        callback: function(value, index, values) {
                                            return 'Rs. ' + value.toLocaleString();
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed !== null) {
                                                label += 'Rs. ' + context.parsed.toLocaleString();
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching expense data:', error));
        });

        // Function to filter expenses
        function filterExpenses() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const filterCategory = document.getElementById('filter-category').value;
            const rows = document.querySelectorAll('#expenseTableBody tr');

            rows.forEach(row => {
                const descriptionCell = row.cells[3]; // Description column
                const categoryCell = row.cells[2]; // Category column

                let showRow = true;

                // Filter by search term
                if (searchInput && !descriptionCell.textContent.toLowerCase().includes(searchInput)) {
                    showRow = false;
                }

                // Filter by category
                if (filterCategory && categoryCell.textContent !== filterCategory) {
                    showRow = false;
                }

                // Show or hide the row
                row.style.display = showRow ? '' : 'none';
            });
        }

        // Add event listeners for real-time updates
        document.getElementById('searchInput').addEventListener('input', filterExpenses);
        document.getElementById('filter-category').addEventListener('change', filterExpenses);

        // Initial filter when the page loads
        filterExpenses();
    </script>
</body>
</html>