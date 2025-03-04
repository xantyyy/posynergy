<?php include_once 'header.php'; ?>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergies.png" class="img-fluid"/>
        <?php 
            $admin = $_SESSION['cashier_name'];
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
        <li class="active">
            <a href="index.php" class="dashboard"><i class="material-icons">dashboard</i><span>Dashboard</span></a>
        </li>
        <li class="dropdown">
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
        </li>
        <li class="">
            <a href="charts.php" class="dashboard"><i class="material-icons">equalizer</i><span>Charts</span></a>
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
            
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
            
        </nav>
    </div>	  

    <!--DASHBOARD CONTENT-->
    <div class="main-content">

        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-warning">
                            <span class="material-icons">equalizer</span>
                        </div>
                    </div>

                    <?php 
                        include '../../includes/config.php';

                        $sql = "SELECT COUNT(name) AS total_products FROM products";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                    ?>

                    <div class="card-content">
                        <p class="category"><strong>No. of Products</strong></p>
                        <h4 class="card-title"><?php echo $row['total_products']; ?></h4>
                    </div>

                    <?php 
                            }
                        }

                        $conn->close();
                    ?>

                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons text-info">info</i>
                            <a href="products-manage.php">See detailed report</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-rose">
                            <span class="material-icons">shopping_cart</span>
                        </div>
                    </div>

                    <?php 
                        // Include the database connection
                        include '../../includes/config.php';

                        // Check if a daily sale entry exists for today
                        $today = date('Y-m-d'); // Current date in 'Y-m-d' format
                        $sql = "SELECT * FROM cashier_monitor WHERE date = '$today'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // Daily sale already recorded for today
                            $saleRecorded = true;
                            $row = $result->fetch_assoc();
                            $dailySale = $row['daily_sale']; // Fetch the daily sale value
                            $saleDate = $row['date']; // Fetch the date
                        } else {
                            // No daily sale recorded for today
                            $saleRecorded = false;
                            $dailySale = 0; // Default value if no records are found
                            $saleDate = null; // Default value for date
                        }

                        // Close the database connection
                        $conn->close();
                    ?>

                    <div class="card-content">
                        <p class="category">
                            <strong>Sales (<?php echo isset($saleDate) ? date("F j, Y", strtotime($saleDate)) : 'N/A'; ?>)</strong>
                        </p>
                        <h4 class="card-title">
                            ₱<?php echo number_format($dailySale, 2); ?>
                        </h4>
                    </div>

                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">local_offer</i>
                            product-wise sales
                        </div>
                    </div>
                    
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-success">
                            <span class="material-icons">attach_money</span>
                        </div>
                    </div>

                    <?php 
						include '../../includes/config.php';

							$today = date('Y-m-d');
							$sql = "SELECT * FROM cashier_monitor WHERE date = '$today'";
							$result = $conn->query($sql);

							if ($result->num_rows > 0) {
								$capitalAdded = true;
								$row = $result->fetch_assoc();
								$capital = $row['capital'];
								$capitalDate = $row['date'];
							} else {
								$capitalAdded = false;
								$capital = 0;
								$capitalDate = null;
							}

							$conn->close();
							?>

							<div class="card-content">
								<p class="category">
									<strong>Capital (<?php echo isset($capitalDate) ? date("F j, Y", strtotime($capitalDate)) : 'N/A'; ?>)</strong>
								</p>
								<h4 class="card-title">
									₱<?php echo number_format($capital, 2); ?>
								</h4>
							</div>

							<div class="card-footer">
								<div class="stats">
									<i class="material-icons text-info">info</i>
								<?php if ($capitalAdded): ?>
									<span style="color: gray; text-decoration: none;">Capital Already Added</span>
								<?php else: ?>
								<a href="add-capital.php">Add Daily Capital</a>
							<?php endif; ?>
						</div>
					</div>
                    
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header">
                        <div class="icon icon-info">
                            <span class="material-icons">follow_the_signs</span>
                        </div>
                    </div>

                    <?php 
                        include '../../includes/config.php';

                        $admin = $_SESSION['cashier_name'];
                        $sql1 = "SELECT * FROM users WHERE username = '$admin'";
                        $result = $conn->query($sql1);
                        while($row = $result->fetch_assoc()) {
                            $branch = $row['branch_id'];
                            $user_id = $row['user_id'];
                        }

                        $sql = "SELECT COUNT(user_id) AS total_users FROM users WHERE branch_id = '$branch' AND user_id = '$user_id'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {

                    ?>
                    <div class="card-content">
                        <p class="category"><strong>No. of Users</strong></p>
                        <h3 class="card-title">+<?php echo $row['total_users']; ?></h3>
                    </div>

                    <?php 
                            }
                        }

                        $conn->close();
                    ?>

                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">update</i>
                            just Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--SECOND ROW OF DASHBOARD CONTENT-->
        
        <div class="row">
            <div class="col-lg-7 col-md-18">
                <div class="card" style="min-height:485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Total Sales (<?php echo date("F"); ?>)</h4>
                    </div>

                    <div class="filter pull-right" style="margin: 20px;">
                        <label for="filter">Filter by:</label>
                        <select id="filter" class="form-select">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="quarterly">Quarterly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>

                    <div style="margin: 20px;">
                        <canvas id="sales-chart"></canvas>
                    </div>

                </div>
            </div>
            <div class="col-lg-5 col-md-18">
                <div class="card" style="min-height:485px">
                    <div class="card-header card-header-text">
                        <h4 class="card-title">Trending Products</h4>
                    </div>

                    <div class="filter pull-right" style="margin: 20px;">
                        <select id="branch_filter" class="form-select" hidden>
                            <option selected value="all">All branches</option>
                            <?php 
                                include '../../includes/config.php';

                                $sql = "SELECT * FROM branches";
                                $result = $conn->query($sql);
                                
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['branch_id'] . "'>" . $row['branch_description']  . "</option>";
                                }

                                $conn->close();
                            ?>
                        </select>
                    </div>
                    <br/><br/>

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="products_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Sold</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var filter = 'weekly';

        var salesChart = new Chart($('#sales-chart'), {
            type: 'line',
            data: {
                labels: [],
                datasets: [{
                    label: 'Total Sales',
                    data: [],
                    fill: false,
                    borderColor: 'rgb(75, 192, 192)',
                    pointBackgroundColor: 'rgb(75, 192, 192)',
                    pointRadius: 3,
                    pointHoverRadius: 7
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        $('#filter').on('change', function() {
            filter = $(this).val();
            updateChart();
        });

        function updateChart() {
            $.ajax({
                url: 'get-data.php',
                type: 'POST',
                data: {filter: filter},
                dataType: 'json',
                success: function(data) {
                    salesChart.data.labels = data.labels;
                    if (filter === 'monthly') {
                        salesChart.options.scales.xAxes = [{
                            type: 'category',
                            labels: data.labels
                        }];
                    } else {
                        salesChart.options.scales.xAxes = [{
                            type: 'time',
                            time: {
                                unit: 'day'
                            }
                        }];
                    }
                    salesChart.data.datasets[0].data = data.values;
                    salesChart.update();
                }
            });
        }

        updateChart();

        //SCRIPT FOR THE HIGHEST SELLING PRODUCTS
        $(document).ready(function() {
            // Add event listener to branch filter
            $('#branch_filter').change(function() {
                // Get selected branch filter value
                var branch_filter = $(this).val();

                // Make AJAX request to get products data
                $.ajax({
                    url: 'get-products.php',
                    data: {
                        'branch_filter': branch_filter
                    },
                    success: function(data) {
                        // Replace table content with new data
                        $('#products_table tbody').html(data);
                    }
                });
            });

            // Load initial data
            $('#branch_filter').trigger('change');
        });
    </script>

<?php include_once 'footer.php'; ?>