<?php
session_start();
?>
<html>
<head>
    <title>Booking Successful</title>
    <style>
        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
        }
        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 0px 135px;
        }
        input[type=date] {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 5.5px 44.5px;
        }
        select {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 6.5px 75.5px;
        }
        .logos {
            width: 100%;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: #f3f3f3;
        }
        .logo1 {
            object-fit: cover;
            width: 520px;
            padding: 10px;
        }
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            background-color: #f3f3f3;
        }
        .menu {
            width: 100%;
            background-color: #030337;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
        }
        .menu ul li {
            padding: 14px 20px;
        }
        .menu ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }
        .content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            text-align: center;
            width: 100%;
            max-width: 800px;
            margin: 20px 0;
        }
        h2 {
            color: #030337;
        }
        table {
            width: 100%;
            margin: 20px 0;
        }
        table td {
            padding: 10px;
            text-align: left;
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .center img {
            margin-left: 20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="logos">
        <img class="logo1" src="images/ban.png" />
    </div>
    <div class="menu">
        <ul>
            <li><a href="customer_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="customer_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
            <li><a href="home_page.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
            <li><a href="home_page.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
            <li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>BOOKING SUCCESSFUL</h2>
        <div class="center">
            <h3>Your payment of <?php echo $_SESSION['total_amount']; ?> VND has been received.<br><br> Your PNR is <strong><?php echo $_SESSION['pnr'];?></strong>. Your tickets have been booked successfully.</h3>
            <img src="images/wds.gif" alt="Success QR Code">
        </div>
        <p>We wish you a pleasant journey!</p>
    </div>
</body>
</html>
