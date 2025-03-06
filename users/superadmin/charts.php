<?php include_once 'header.php'; ?>

			<!--MENU SIDEBAR CONTENT-->
			<nav id="sidebar">
				<div class="sidebar-header">
					<img src="../../assets/images/isynergies.png" class="img-fluid"/>
					<?php 
						
						$admin = $_SESSION['superadmin_name'];
						$sql1 = "SELECT * FROM (users INNER JOIN branches ON users.branch_id = branches.branch_id) WHERE username = '$admin'";
						$result = $conn->query($sql1);
						while($row = $result->fetch_assoc()) {
							$branch = $row['branch_description'];
							$name = $row['first_name'] . " " . $row['last_name'];
							$role = $row['role'];
						
					?>

					<div class="ml-auto" id="userInfo">
						<p class="text-right"><?php echo $name . " | " . $role; ?></p>
						<p class="text-right"><?php echo $branch; } ?></p>
					</div>
				</div>
				<ul class="list-unstyled components">
					<li class="">
						<a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
						
					</li>
						
					<!--<li class="dropdown">
						<a href="#homeSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">point_of_sale</i><span>Sales</span></a>
						<ul class="collapse list-unstyled menu" id="homeSubmenu1">
							<li>
								<a href="sales-add.php">Add New Sale</a>
							</li>
							<li>
								<a href="sales-manage.php">Manage Sales</a>
							</li>
						</ul>
					</li>-->
					<li class="dropdown">
						<a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">inventory</i><span>Products</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu2">
							<li>
								<a href="products-add.php">Add New Product</a>
							</li>
							<li>
								<a href="products-manage.php">Manage Products</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">group</i><span>Categories</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu3">
							<li>
								<a href="categories-add.php">Add New Category</a>
							</li>
							<li>
								<a href="categories-manage.php">Manage Categories</a>
							</li>
						</ul>
					</li>
					<!--<li class="dropdown">
						<a href="#pageSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">local_shipping</i><span>Branches</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu4">
							<li>
								<a href="branches-add.php">Add New Branch</a>
							</li>
							<li>
								<a href="branches-manage.php">Manage Branches</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#pageSubmenu5" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">payments</i><span>Expenses</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu5">
							<li>
								<a href="expenses-add.php">Add New Expenses</a>
							</li>
							<li>
								<a href="expenses-manage.php">Manage Expenses</a>
							</li>
						</ul>
					</li>-->
					<li class="active">
						<a href="charts.php" class="dashboard"><i class="material-icons">equalizer</i><span>Charts</span></a>
					</li>
 
					<li class="dropdown">
						<a href="#pageSubmenu7" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
						<i class="material-icons">account_circle</i><span>Manage Users</span></a>
						<ul class="collapse list-unstyled menu" id="pageSubmenu7">
							<li>
								<a href="users-add.php">Add New User</a>
							</li>
							<li>
								<a href="users-manage.php">Manage Users</a>
							</li>
						</ul>
					</li>
					<li class="logout">
						<a href="?logout='1'"><i class="material-icons">logout</i><span>Logout</span></a>
					</li>
				</ul>
			</nav>
			<div id="content">

				<!--TOP NAVBAR CONTENT-->
				<div class="top-navbar">
					<nav class="navbar  navbar-expand-lg">
						<button type="button" id="sidebar-collapse" class="back">
						<span class="material-icons"></span>
						</button>
						
						<a class="navbar-brand" href="#">Add New Branch</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
					</nav>
				</div>

                <div class="container">
    <div class="row">
        <div class="col-md-12">
            <br /><br />
            <h2 style="margin: 0 20px;">Total Sales per Branch</h2>
            <br />
        </div>
    </div>
    <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
            <div class="card" style="padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                <h4 style="text-align: center;">Branch A</h4>
                <canvas id="chartBranchA"></canvas>
            </div>
        </div>
        <!-- Second Column -->
        <div class="col-md-6">
            <div class="card" style="padding: 20px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); border-radius: 8px;">
                <h4 style="text-align: center;">Branch B</h4>
                <canvas id="chartBranchB"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart for Branch A
    const ctxA = document.getElementById('chartBranchA').getContext('2d');
    new Chart(ctxA, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Sales',
                data: [120, 150, 180, 200],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
            }
        }
    });

    // Chart for Branch B
    const ctxB = document.getElementById('chartBranchB').getContext('2d');
    new Chart(ctxB, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April'],
            datasets: [{
                label: 'Sales',
                data: [100, 130, 170, 190],
                borderColor: 'rgba(255, 99, 132, 1)',
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: true },
            }
        }
    });
</script>

                        <!-- TOTAL SALES CHART -->
                        <?php
                            // Fetch data from 'sales' table using your database connection
                            include '../../includes/config.php';

                            // Query to fetch sales data with branch descriptions and total sales
                            $sql = "SELECT branch_description, invoice_date, SUM(subtotal_amount) AS total_sales FROM sales INNER JOIN branches ON sales.branch_id = branches.branch_id GROUP BY branches.branch_id, MONTH(sales.invoice_date)";
                            $result = mysqli_query($conn, $sql);

                            // Fetch data into an associative array
                            $data = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $data[] = $row;
                            }

                            // Close database connection
                            mysqli_close($conn);
                        ?>

                        <div style="max-width: 800px; margin: 0 auto;">
                            <canvas id="branchSalesChart" style="background-color: #fff;"></canvas>
                        </div>
                    </div>

                    

                    <div class="row">
                        <div class="col-md-12">
                            <br /><br />
                            <h2 style="margin: 0 20px;">Total Expenses
                        </div>
                            <!-- TOTAL EXPENSES CHART -->
                            <?php
                            // Fetch data from 'sales' table using your database connection
                            include '../../includes/config.php';

                            // Query to fetch sales data with branch descriptions and total sales
                            $sql1 = "SELECT branch_description, date, SUM(amount) AS total_expenses FROM expenses INNER JOIN branches ON expenses.branch_id = branches.branch_id GROUP BY expenses.branch_id, MONTH(expenses.date)";
                            $result = mysqli_query($conn, $sql1);

                            // Fetch data into an associative array
                            $dataExpenses = array();
                            while ($row = mysqli_fetch_assoc($result)) {
                                $dataExpenses[] = $row;
                            }

                            // Close database connection
                            mysqli_close($conn);
                        ?>

                        <div style="max-width: 800px; margin: 0 auto;">
                            <canvas id="branchExpensesChart" style="background-color: #fff;"></canvas>
                        </div>
                    </div>
                </div>

                <script>
					/////////// TOTAL SALES CHART SCRIPT ///////////////
                    // Convert PHP data to JavaScript data for Chart.js
                    var salesData = <?php echo json_encode($data); ?>;

                    // Extract branch descriptions and sales data from data
                    var branchLabels = Array.from(new Set(salesData.map(function(item) {
                    return item.branch_description;
                    })));

                    var salesDataByBranch = branchLabels.map(function(branch) {
                    return salesData.filter(function(item) {
                        return item.branch_description === branch;
                    });
                    });

                    // Define an array of colors for the lines
                    var lineColors = ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'];

                    // Create datasets for each branch with different colors
                    var datasets = [];
                    var salesMonths = []; // Create an empty array for salesMonths
                    salesDataByBranch.forEach(function(branchData, index) {
                    var totalSalesData = branchData.map(function(item) {
                        salesMonths.push(new Date(item.invoice_date).toLocaleString('default', { month: 'long' })); // Format sales_date to month and add to salesMonths array
                        return item.total_sales;
                    });

                    datasets.push({
                        label: branchLabels[index],
                        data: totalSalesData,
                        backgroundColor: lineColors[index], // Use different colors for each line
                        borderColor: lineColors[index], // Use different colors for each line
                        borderWidth: 2
                    });
                    });

                    // Create a Chart.js line chart
                    var ctx = document.getElementById('branchSalesChart').getContext('2d');
                    var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: salesMonths, // Use the salesMonths array for x-axis labels
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        scales: {
                        x: {
                            display: true,
                            title: {
                            display: true,
                            text: 'Month' // Add x-axis title
                            }
                        },
                        y: {
                            display: true,
                            title: {
                            display: true,
                            text: 'Total Sales' // Add y-axis title
                            },
                            beginAtZero: true,
                            suggestedMax: 5000 // Update suggested max value for y-axis
                        }
                        }
                    }
                    });

					/////////// EXPENSES CHART SCRIPT ///////////////
					// Convert PHP data to JavaScript data for Chart.js
                    var expensesData = <?php echo json_encode($dataExpenses); ?>;

                    // Extract branch descriptions and sales data from data
                    var branchLabels = Array.from(new Set(expensesData.map(function(item) {
                    return item.branch_description;
                    })));

                    var expensesDataByBranch = branchLabels.map(function(branch) {
                    return expensesData.filter(function(item) {
                        return item.branch_description === branch;
                    });
                    });

                    // Define an array of colors for the lines
                    var lineColors = ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)'];

                    // Create datasets for each branch with different colors
                    var datasets = [];
                    var expensesMonths = []; // Create an empty array for salesMonths
                    expensesDataByBranch.forEach(function(branchData, index) {
                    var totalExpensesData = branchData.map(function(item) {
                        expensesMonths.push(new Date(item.date).toLocaleString('default', { month: 'long' })); // Format sales_date to month and add to salesMonths array
                        return item.total_expenses;
                    });

                    datasets.push({
                        label: branchLabels[index],
                        data: totalExpensesData,
                        backgroundColor: lineColors[index], // Use different colors for each line
                        borderColor: lineColors[index], // Use different colors for each line
                        borderWidth: 2
                    });
                    });

                    // Create a Chart.js line chart
                    var ctx = document.getElementById('branchExpensesChart').getContext('2d');
                    var chart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: expensesMonths, // Use the salesMonths array for x-axis labels
                        datasets: datasets
                    },
                    options: {
                        responsive: true,
                        scales: {
                        x: {
                            display: true,
                            title: {
                            display: true,
                            text: 'Month' // Add x-axis title
                            }
                        },
                        y: {
                            display: true,
                            title: {
                            display: true,
                            text: 'Total Sales' // Add y-axis title
                            },
                            beginAtZero: true,
                            suggestedMax: 5000 // Update suggested max value for y-axis
                        }
                        }
                    }
                    });
                </script>
            <style>
					.navbar{
					background-color:#1137a9;
					color:#fff;
				}
				</style>
<?php include_once 'footer.php'; ?>