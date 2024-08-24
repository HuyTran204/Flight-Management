<?php
session_start();
?>
<html>
<head>
    <title>
        View Available Flights
    </title>
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
            padding: 10px 30px;
            margin: 20px 0;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #444;
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
        <?php
            $no_of_pass=$_SESSION['no_of_pass'];
            $class=$_SESSION['class'];
            $count=$_SESSION['count'];
            $flight_no=$_POST['select_flight'];
            $_SESSION['flight_no']=$flight_no;
            echo "<h2>ADD PASSENGERS DETAILS</h2>";
            echo "<form action=\"add_ticket_details_form_handler.php\" method=\"post\">";
            while($count<=$no_of_pass)
            {
                echo "<p><strong>PASSENGER ".$count."<strong></p>";
                echo "<table cellpadding=\"0\" class=\"center\">";
                echo "<tr>";
                echo "<td class=\"fix_table_short\">Passenger's Name</td>";
                echo "<td class=\"fix_table_short\">Passenger's Age</td>";
                echo "<td class=\"fix_table_short\">Passenger's Gender</td>";
                echo "<td class=\"fix_table_short\">Passenger's Inflight Meal</td>";
                echo "<td class=\"fix_table_short\">Passenger's Frequent Flier ID (if applicable)</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_name[]\" required></td>";
                echo "<td class=\"fix_table_short\"><input type=\"number\" name=\"pass_age[]\" required></td>";
                echo "<td class=\"fix_table_short\">";
                echo "<select name=\"pass_gender[]\">";
                echo "<option value=\"male\">Male</option>";
                echo "<option value=\"female\">Female</option>";
                echo "<option value=\"other\">Other</option>";
                echo "</select>";
                echo "</td>";
                echo "<td class=\"fix_table_short\">";
                echo "<select name=\"pass_meal[]\">";
                echo "<option value=\"yes\">Yes</option>";
                echo "<option value=\"no\">No</option>";
                echo "</select>";
                echo "</td>";
                echo "<td class=\"fix_table_short\"><input type=\"text\" name=\"pass_ff_id[]\"></td>";
                echo "</tr>";
                echo "</table>";
                echo "<br><hr>";
                $count=$count+1;
            }
            echo "<br><h2>ENTER TRAVEL DETAILS</h2>";
            echo "<table cellpadding=\"5\" class=\"center\">";
            echo "<tr>";
            echo "<td class=\"fix_table_short\">Do you want access to our Premium Lounge?</td>";
            echo "<td class=\"fix_table_short\">Do you want to opt for Priority Checkin?</td>";
            echo "<td class=\"fix_table_short\">Do you want to purchase Travel Insurance?</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class=\"fix_table\">";
            echo "<div class=\"radio-group\">";
            echo "<label>Yes <input type='radio' name='lounge_access' value='yes' checked/></label>";
            echo "<label>No <input type='radio' name='lounge_access' value='no'/></label>";
            echo "</div>";
            echo "</td>";
            echo "<td class=\"fix_table\">";
            echo "<div class=\"radio-group\">";
            echo "<label>Yes <input type='radio' name='priority_checkin' value='yes' checked/></label>";
            echo "<label>No <input type='radio' name='priority_checkin' value='no'/></label>";
            echo "</div>";
            echo "</td>";
            echo "<td class=\"fix_table\">";
            echo "<div class=\"radio-group\">";
            echo "<label>Yes <input type='radio' name='insurance' value='yes' checked/></label>";
            echo "<label>No <input type='radio' name='insurance' value='no'/></label>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
            echo "</table>";
            echo "<br><br>";
            echo "<div class=\"center\">";
            echo "<input type=\"submit\" value=\"Submit Travel/Ticket Details\" name=\"Submit\">";
            echo "</div>";
            echo "</form>";
        ?>
    </div>
</body>
</html>
