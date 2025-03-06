<?php
    session_start();

    include_once 'includes/config.php';

    // initializing variables
    $errors = array();

    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username) || empty($password)) {
            array_push($errors, "Username and password are required!");
        } else {
            // Query user information based on the username
            $sql = "SELECT * FROM users WHERE username = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);

                // Verify the hashed password
                if (password_verify($password, $row['password'])) {
                    // Set session variables based on user role
                    if ($row['role'] == 'superadmin') {
                        $_SESSION['superadmin_name'] = $row['username'];
                        header('location: users/superadmin/index.php');
                    } elseif ($row['role'] == 'admin') {
                        $_SESSION['admin_name'] = $row['username'];
                        $_SESSION['branch'] = $row['branch_id'];
                        header('location: users/admin/index.php');
                    } elseif ($row['role'] == 'accountant') {
                        $_SESSION['accountant_name'] = $row['username'];
                        header('location: users/accountant/index.php');
                    } elseif ($row['role'] == 'cashier') {
                        $_SESSION['cashier_name'] = $row['username'];
                        header('location: users/cashier/index.php');
                    }
                } else {
                    // Password does not match
                    array_push($errors, "Wrong username/password!");
                }
            } else {
                // Username does not exist
                array_push($errors, "Wrong username/password!");
            }
        }
    }
?>
