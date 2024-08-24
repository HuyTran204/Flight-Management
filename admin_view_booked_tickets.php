<?php
session_start();
?>
<html>

<head>
    <title>View Booked Tickets</title>
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
            margin: 20px 0;
        }

        input[type=date] {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 5.5px 44.5px;
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
            font-size: 30px;
        }

        table {
            width: 100%;
            margin: 20px 0;
        }

        table td {
            text-align: center;
            padding: 15px;
        }

        .fix_table {
            padding: 10px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="logos">
        <img class="logo1" src="images/ban.png" />
    </div>
    <div class="menu">
        <ul>
            <li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
            <li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
    </div>
    <div class="content">
        <h2>View Booked Flight Tickets</h2>
        <form action="admin_view_booked_tickets_form_handler.php" method="post">
            <table cellpadding="5">
                <tr>
                    <td class="fix_table">Enter Flight Number</td>
                    <td class="fix_table">Enter Departure Date</td>
                </tr>
                <tr>
                    <td class="fix_table"><input type="text" name="flight_no" required></td>
                    <td class="fix_table"><input type="date" name="departure_date" required></td>
                </tr>
            </table>
            <br>
            <input type="submit" value="View" name="Submit">
        </form>
    </div>
</body>

</html>
