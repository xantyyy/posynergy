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
					<li class="">
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
					<li class="active">
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
						
						<a class="navbar-brand" href="#">Manage Categories</a>
						<button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
						data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
							<span class="material-icons">menu</span>
						</button>
					</nav>
				</div>

                <div class="container py-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="text-3xl font-bold text-gray-800"><b>total Sales Overview</b></h2>
            <p class="text-gray-600">Analyze top-performing products and their sales data</p>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="bg-white shadow-lg rounded-lg p-5">
                <h3 class="text-xl font-semibold text-gray-700 text-center mb-4"><b>Sales Distribution</b></h3>
                <div class="flex justify-center">
                    <canvas id="myChart" class="w-48 h-48"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="bg-white shadow-lg rounded-lg p-5">
                <h3 class="text-xl font-semibold text-gray-700 text-center mb-4"><b>Top Products</b></h3>
                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2 text-left">Product</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Percentage Sold</th>
                            <th class="border border-gray-300 px-4 py-2 text-right">Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include '../../includes/config.php';

                            $admin = $_SESSION['cashier_name'];
                            $sql1 = "SELECT * FROM users WHERE username = '$admin'";
                            $result = $conn->query($sql1);
                            while($row = $result->fetch_assoc()) {
                                $branch = $row['branch_id'];
                            }

                            $query = "SELECT products.name, SUM(sales.quantity) AS total, SUM(sales.subtotal_amount) AS total_sales_amount
                                      FROM sales 
                                      INNER JOIN products ON sales.product_id = products.product_id 
                                      WHERE sales.branch_id = '$branch' 
                                      GROUP BY sales.product_id 
                                      ORDER BY total_sales_amount DESC 
                                      LIMIT 10";

                            $result = mysqli_query($conn, $query);

                            $data = array();
                            $total = 0;
                            while($row = mysqli_fetch_assoc($result)) {
                                $data[$row['name']] = $row['total'];
                                $total += $row['total'];
                                $total_sales_amount[$row['name']] = $row['total_sales_amount'];
                            }

                            $percentages = array();
                            foreach ($data as $key => $value) {
                                $percentage = ($value / $total) * 100;
                                $percentages[$key] = $percentage;
                                echo "<tr class='hover:bg-gray-50'><td class='border border-gray-300 px-4 py-2'>$key</td><td class='border border-gray-300 px-4 py-2 text-center'>" . number_format($percentage, 2) . "%</td><td class='border border-gray-300 px-4 py-2 text-right'>₱" . number_format($total_sales_amount[$key], 2) . "</td></tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


                <script>
    var data = <?php echo json_encode($percentages); ?>;
    var labels = Object.keys(data);
    var values = Object.values(data);

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: values,
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)',
                    'rgb(255, 159, 64)'
                ],
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Sales Report'
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var value = data.datasets[0].data[tooltipItem.index];
                        var label = data.labels[tooltipItem.index];
                        return label + ': ' + value.toLocaleString() + '%';
                    }
                }
            }
        }
    });
</script>
<style>
	.navbar{
	background-color:#2DAA9E;
	color:#fff;
}
</style>

<?php include_once 'footer.php'; ?>