<?php
    session_start();

    include_once 'includes/config.php';

    // Prevent caching
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Pragma: no-cache");
    header("Expires: 0");

    $errors = array();

    // LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($username) || empty($password)) {
            array_push($errors, "Username and password are required!");
        } else {
            $sql = "SELECT * FROM tbl_users WHERE Username = '$username'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_array($result);

                if ($row['Status'] !== 'ENABLED') {
                    array_push($errors, "Account is disabled!");
                } else {
                    if (password_verify($password, $row['Password'])) {
                        // Regenerate session ID after successful login
                        session_regenerate_id(true);
                        
                        // Fetch and store terminal number - MOVED HERE BEFORE REDIRECTS
                        $_SESSION['terminal_no'] = $row['Terminal']; // Use the data from the row we already fetched
                        
                        if ($row['Role'] == 'ADMIN/IT') {
                            $_SESSION['superadmin_name'] = $row['Username'];
                            header('location: users/superadmin/index.php');
                            exit();
                        } elseif ($row['Role'] == 'MANAGER') {
                            $_SESSION['admin_name'] = $row['Username'];
                            header('location: users/admin/index.php');
                            exit();
                        } elseif ($row['Role'] == 'CASHIER') {
                            $_SESSION['cashier_name'] = $row['Username'];
                            header('location: users/cashier/index.php');
                            exit();
                        } else {
                            array_push($errors, "Role not recognized!");
                        }
                    } else {
                        array_push($errors, "Wrong username/password!");
                    }
                }
            } else {
                array_push($errors, "Wrong username/password!");
            }
        }
    }
?>