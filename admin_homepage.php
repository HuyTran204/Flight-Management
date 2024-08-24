<?php
    session_start();
?>
<html>
    <head>
        <title>Welcome Administrator</title>
        <style>
            * {
                font-size: 20px;
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

            .logo {
                width: 1230px;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: flex-start; /* Aligns the logo to the left */
                margin: 20px 0;
            }

            .logo img {
                object-fit: cover;
                width: 520px;
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

            h1#title {
                color: #030337;
                text-align: center;
                margin-top: 20px;
            }

            h2 {
                color: #030337;
                text-align: center;
                margin-top: 20px;
                font-size: 30px; /* Increases the font size */
            }

            table {
                margin-top: 20px;
                border-collapse: collapse;
            }

            .admin_func {
                padding: 10px;
            }

            .admin_func a {
                color: #030337;
                font-weight: bold;
                text-decoration: none;
            }

            .admin_func a:hover {
                text-decoration: underline;
            }
        </style>
        <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="logo">
            <img src="images/ban.png" alt="Logo"/>
        </div>
        <div class="menu">
            <ul>
                <li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
        <h1 id="title">VIETNAM AIRLINES</h1>
        <h2>Welcome Administrator!</h2>
        <table cellpadding="5">
            <tr>
                <td class="admin_func"><a href="admin_view_booked_tickets.php"><i class="fa fa-plane" aria-hidden="true"></i> View Booked Flight Tickets</a></td>
            </tr>
            <tr>
                <td class="admin_func"><a href="add_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Add Flight</a></td>
            </tr>
            <tr>
                <td class="admin_func"><a href="delete_flight_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Delete Flight Schedule Details</a></td>
            </tr>
            <tr>
                <td class="admin_func"><a href="add_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Add Aircraft Details</a></td>
            </tr>
            <tr>
                <td class="admin_func"><a href="activate_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Activate Aircraft</a></td>
            </tr>
            <tr>
                <td class="admin_func"><a href="deactivate_jet_details.php"><i class="fa fa-plane" aria-hidden="true"></i> Deactivate Aircraft</a></td>
            </tr>
        </table>
    </body>
</html>
