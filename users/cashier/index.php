<?php include_once 'header.php'; ?>

<!--MENU SIDEBAR CONTENT-->
<nav id="sidebar">
    <div class="sidebar-header">
        <img src="../../assets/images/isynergiesinc.png" class="img-fluid"/>
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
            <p class="text-right"><?php  } ?></p>
        </div>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="#" class="dashboard"><i class="material-icons">edit</i><span>Edit Item</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">add</i><span>Add To Pending</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">pending</i><span>Pending Transaction</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">search</i><span>Search Product</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">keyboard_return</i><span>Return</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">delete</i><span>Void Item</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">attach_money</i><span>Cash Tender</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">delete_forever</i><span>Void All</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">loyalty</i><span>Customer Points</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">credit_card</i><span>Other Payment Type</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">discount</i><span>Apply Discount</span></a>
        </li>
        <li class="">
            <a href="#" class="dashboard"><i class="material-icons">price_check</i><span>Price Check</span></a>
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
            </button>
            
            <a class="navbar-brand" href="#">Point of Sale</a>
            <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
            data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle">
                <span class="material-icons">menu</span>
            </button>
            
        </nav>
    </div>	  

    <!--DASHBOARD CONTENT-->
    <div class="main-content">
        <div class="row">
            <!-- Left Side - Product Data Entry Form -->
            <div class="col-md-8" style="margin-top: -15px;">
                <div class="card">
                    <div class="card-header bg-success text-white text-center"></div>
                    <div class="card-body" style="padding: 0px;">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12" style="margin-bottom: 0;">
                                    <input type="text" class="form-control" id="#" style="padding: 5px; margin: 0;">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card" style="margin-top: -1px; margin-bottom: 0px;">
                        <div class="card-body" style="background-color: black; color: white; font-family: Arial, sans-serif; padding: 10px;">
                            <div class="row">
                                <!-- Left Section: TOTAL and RETAIL -->
                                <div class="col-md-3">
                                    <div style="font-size: 28px; font-weight: bold; color: yellow;">TOTAL</div>
                                    <div style="font-size: 28px; font-weight: bold; color: white; margin-top: -15px;">RETAIL</div>
                                </div>

                                <!-- Divider -->
                                <div class="col-md-1" style="border-left: 2px solid white; height: 100%;"></div>

                                <!-- Right Section: Value -->
                                <div class="col-md-8 text-right d-flex justify-content-end" style="font-size: 48px; font-weight: bold; color: white;">
                                    0.00
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="margin-top: -15px; height: calc(80vh - 100px);">
                    <div class="card-body">
                        <div class="table-responsive" style="height: calc(80vh - 130px); overflow-y: auto;">
                            <h5 style="position: sticky; top: 0; background-color: white; z-index: 3; margin-bottom: 0; padding: 10px; border-bottom: 1px solid #ddd;">
                                Item Details</h5>
							<table class="table" style="margin-top: 10px;" id="table-bold">
                            <thead class="card-header bg-dark opacity-60 text-white"
                                    style="position: sticky; top: 42px; z-index: 2; border-top: 2px solid black; border-bottom: 2px solid black;">
                                    <tr>
                                        <th style="width: 50%;">Items</th>
                                        <th>Qty</th>
                                        <th>Price</th>
                                        <th>Price</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                    <tr>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                        <td>Sample</td>
                                    </tr>
                                </tbody>
						    </table>
					    </div>
				    </div>
                </div>
            </div>

            <!-- Right Side - Additional Table -->
            <div class="col-md-4" style="margin-top: -15px;">
                <div class="card" style="height: calc(87.8vh);">
                    <div class="card-body">
                        <h5>Transaction Details</h5>
                        <hr>
                        <div class="col-md-12">
							<div class="card">
							    <div class="card-body">
									<div class="table-responsive" style="height: calc(80vh - 130px); overflow-y: auto; margin-top: -40px; margin-bottom: -15px;">
										<table class="table table-borderless">
											<tbody>
												<tr>
													<th style="width: 50%;">Terminal No:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">Transaction No:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;"># of Item(s):</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">Amount:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">Discount:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">BSC Points:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">TOTAL:</th>
													<td id="#"> </td>
												</tr>
											</tbody>
									    </table>
                                        <hr>
                                        <table class="table table-borderless">
											<tbody>
												<tr>
													<th style="width: 50%;">Tender:</th>
													<td id="#"> </td>
												</tr>
                                                <tr>
													<th style="width: 50%;">Change:</th>
													<td id="#"> </td>
												</tr>
											</tbody>
									    </table>
                                    </div>
								</div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>

    </script>

<style>
	.navbar{
        background: linear-gradient(to right,rgb(235, 110, 110),rgb(142, 188, 225),rgb(128, 135, 141));
                background-size: 1550px 870px;
                background-position: center;
                background-repeat: no-repeat;
    }
    #table-bold thead th {
						font-weight: bold;
						font-style: italic;
					}
				</style>
</style>



<?php include_once 'footer.php'; ?>