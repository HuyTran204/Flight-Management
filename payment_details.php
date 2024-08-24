<?php
session_start();
?>
<html>
<head>
    <title>Enter Payment Details</title>
    <style>
        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
        }
        button {
            background-color: #030337;
            color: white;
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 45px;
            margin: 20px 0;
            cursor: pointer;
        }
        button:hover {
            background-color: #444;
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
            width: 100%;
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
            width: 90%; /* Increased width to 90% */
            max-width: 1200px; /* Increased max-width */
            margin: 20px 0;
        }
        h2 {
            color: #030337;
        }
        h3 {
            color: #030337;
            margin-left: 30px;
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
        .radio-group {
            display: flex;
            justify-content: space-between;
        }
        .radio-group label {
            margin-right: 10px;
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
        <h2>ENTER THE PAYMENT DETAILS</h2>
        <h3><u>Payment Summary</u></h3>
        <?php
        if (!isset($_SESSION['flight_no']) || !isset($_SESSION['journey_date']) || !isset($_SESSION['no_of_pass']) || !isset($_SESSION['total_no_of_meals']) || !isset($_SESSION['pnr']) || !isset($_SESSION['class'])) {
            die('Required session variables are not set. Please go back and try again.');
        }

        $flight_no = $_SESSION['flight_no'];
        $journey_date = $_SESSION['journey_date'];
        $no_of_pass = $_SESSION['no_of_pass'];
        $total_no_of_meals = $_SESSION['total_no_of_meals'];
        $payment_id = rand(100000000, 999999999);
        $pnr = $_SESSION['pnr'];
        $_SESSION['payment_id'] = $payment_id;
        $payment_date = date('Y-m-d'); 
        $_SESSION['payment_date'] = $payment_date;

        require_once('Database Connection file/mysqli_connect.php');
        if ($_SESSION['class'] == 'economy') {
            $query = "SELECT price_economy FROM Flight_Details WHERE flight_no=? AND departure_date=?";
        } else if ($_SESSION['class'] == 'business') {
            $query = "SELECT price_business FROM Flight_Details WHERE flight_no=? AND departure_date=?";
        } else {
            die('Invalid class. Please go back and try again.');
        }

        $stmt = mysqli_prepare($dbc, $query);
        if ($stmt === false) {
            die('MySQL prepare statement failed: ' . mysqli_error($dbc));
        }

        mysqli_stmt_bind_param($stmt, "ss", $flight_no, $journey_date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $ticket_price);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($dbc);

        $total_ticket_price = $no_of_pass * $ticket_price;
        $total_meal_price = 250 * $total_no_of_meals;
        $total_insurance_fee = $_SESSION['insurance'] == 'yes' ? 100 * $no_of_pass : 0;
        $total_priority_checkin_fee = $_SESSION['priority_checkin'] == 'yes' ? 200 * $no_of_pass : 0;
        $total_lounge_access_fee = $_SESSION['lounge_access'] == 'yes' ? 300 * $no_of_pass : 0;
        $total_discount = 0;
        $total_amount = $total_ticket_price + $total_meal_price + $total_insurance_fee + $total_priority_checkin_fee + $total_lounge_access_fee + $total_discount;
        $_SESSION['total_amount'] = $total_amount;

        echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
        echo "<tr><td class=\"fix_table\">Base Fare, Fuel and Transaction Charges (Fees & Taxes included):</td><td class=\"fix_table\">".$total_ticket_price." VND</td></tr>";
        echo "<tr><td class=\"fix_table\">Meal Combo Charges:</td><td class=\"fix_table\">".$total_meal_price." VND</td></tr>";
        echo "<tr><td class=\"fix_table\">Priority Checkin Fees:</td><td class=\"fix_table\">".$total_priority_checkin_fee." VND</td></tr>";
        echo "<tr><td class=\"fix_table\">Lounge Access Fees:</td><td class=\"fix_table\">".$total_lounge_access_fee." VND</td></tr>";
        echo "<tr><td class=\"fix_table\">Insurance Fees:</td><td class=\"fix_table\">".$total_insurance_fee." VND</td></tr>";
        echo "<tr><td class=\"fix_table\">Discount:</td><td class=\"fix_table\">".$total_discount." VND</td></tr>";
        echo "</table>";

        echo "<hr style='margin-right:900px; margin-left: 50px'>";
        echo "<table cellpadding=\"5\" style='margin-left: 50px'>";
        echo "<tr><td class=\"fix_table\"><strong>Total:</strong></td><td class=\"fix_table\">".$total_amount." VND</td></tr>";
        echo "</table>";
        echo "<hr style='margin-right:900px; margin-left: 50px'>";
        echo "<br>";
        echo "<p style=\"margin-left:50px\">Your Payment/Transaction ID is <strong>".$payment_id.".</strong> Please note it down for future reference.</p>";
        echo "<br>";
        ?>
        <form method="post" action="payment_details_form_handler.php">
            <div class="payment-type">
                <strong>Payment Type:</strong><br>
                <label>
                    Credit <input type='radio' name='payment_type' value='Credit' checked />
                </label>
                <label>
                    Bank transfer <input type='radio' name='payment_type' value='Bank transfer' />
                </label>
                <label>
                    Cash <input type='radio' name='payment_type' value='Cash' />
                </label>
            </div>
            <div class="center">
                <button type="submit" name="Pay_Now">Pay Now</button>
            </div>
        </form>
    </div>
</body>
</html>
