<?php
    include 'servers/login-server.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <title>iSynergies Inc. | POS System</title>

        <!-- CSS -->
        <link rel="icon" type="image/x-icon" href="assets/images/isynergiesinc.png">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/login.css">

        <style>
           body {
                background: url('/POSynergies/assets/images/poslogindb.jpg') no-repeat center center fixed;
                background-size: cover;
    }
        </style>
        
        <!-- JS -->
       <script>
            document.addEventListener("wheel", function(event) {
                if (event.ctrlKey) {
                    event.preventDefault();
                }
            }, { passive: false });
        </script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

        <style>
            @import url(http://fonts.googleapis.com/css?family=Open+Sans:400,700);
            body, h1, h2, h3, h4, h5, h6{
                font-family: 'Open Sans', sans-serif;
            }

            .btn-success {
                background-color:rgb(44, 146, 187);
                border-color:rgb(44, 146, 187);
                color: white;
    transition: background-color 0.3s ease, border-color 0.3s ease;
}

.btn-success:hover {
    background-color: rgb(11, 55, 73);
    border-color: rgb(30, 100, 130);
}

        </style>

    </head>

    <body>
        <div class="container">