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
        .submit-container {
            display: flex;
            justify-content: center;
        }
        .submit-container input[type=submit] {
            margin: 0;
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
    <h2>AVAILABLE FLIGHTS</h2>
    <?php
        if (isset($_POST['Search'])) {
            $data_missing = array();
            if (empty($_POST['origin'])) {
                $data_missing[] = 'Origin';
            } else {
                $origin = $_POST['origin'];
            }
            if (empty($_POST['destination'])) {
                $data_missing[] = 'Destination';
            } else {
                $destination = $_POST['destination'];
            }
            if (empty($_POST['dep_date'])) {
                $data_missing[] = 'Departure Date';
            } else {
                $dep_date = trim($_POST['dep_date']);
            }
            if (empty($_POST['no_of_pass'])) {
                $data_missing[] = 'No. of Passengers';
            } else {
                $no_of_pass = trim($_POST['no_of_pass']);
            }
            if (empty($_POST['class'])) {
                $data_missing[] = 'Class';
            } else {
                $class = trim($_POST['class']);
            }
            if (empty($data_missing)) {
                $_SESSION['no_of_pass'] = $no_of_pass;
                $_SESSION['class'] = $class;
                $count = 1;
                $_SESSION['count'] = $count;
                $_SESSION['journey_date'] = $dep_date;
                require_once('Database Connection file/mysqli_connect.php');
                if ($class == "economy") {
                    $query = "SELECT flight_no, from_city, to_city, departure_date, departure_time, arrival_date, arrival_time, price_economy FROM Flight_Details WHERE from_city=? AND to_city=? AND departure_date=? AND seats_economy>=? ORDER BY departure_time";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "sssi", $origin, $destination, $dep_date, $no_of_pass);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $flight_no, $from_city, $to_city, $departure_date, $departure_time, $arrival_date, $arrival_time, $price_economy);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo "<h3>No flights are available !</h3>";
                    } else {
                        echo "<form action=\"book_tickets2.php\" method=\"post\">";
                        echo "<table cellpadding=\"10\">";
                        echo "<tr><th>Flight No.</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>
                        <th>Price (Economy)</th>
                        <th>Select</th>
                        </tr>";
                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<tr>
                            <td>".$flight_no."</td>
                            <td>".$from_city."</td>
                            <td>".$to_city."</td>
                            <td>".$departure_date."</td>
                            <td>".$departure_time."</td>
                            <td>".$arrival_date."</td>
                            <td>".$arrival_time."</td>
                            <td>".$price_economy." VND</td>
                            <td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
                            </tr>";
                        }
                        echo "</table> <br>";
                        echo "<div class='submit-container'><input type=\"submit\" value=\"Select Flight\" name=\"Select\"></div>";
                        echo "</form>";
                    }
                } else if ($class == "business") {
                    $query = "SELECT flight_no, from_city, to_city, departure_date, departure_time, arrival_date, arrival_time, price_business FROM Flight_Details WHERE from_city=? AND to_city=? AND departure_date=? AND seats_business>=? ORDER BY departure_time";
                    $stmt = mysqli_prepare($dbc, $query);
                    mysqli_stmt_bind_param($stmt, "sssi", $origin, $destination, $dep_date, $no_of_pass);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_bind_result($stmt, $flight_no, $from_city, $to_city, $departure_date, $departure_time, $arrival_date, $arrival_time, $price_business);
                    mysqli_stmt_store_result($stmt);
                    if (mysqli_stmt_num_rows($stmt) == 0) {
                        echo "<h3>No flights are available !</h3>";
                    } else {
                        echo "<form action=\"book_tickets2.php\" method=\"post\">";
                        echo "<table cellpadding=\"10\">";
                        echo "<tr><th>Flight No.</th>
                        <th>Origin</th>
                        <th>Destination</th>
                        <th>Departure Date</th>
                        <th>Departure Time</th>
                        <th>Arrival Date</th>
                        <th>Arrival Time</th>
                        <th>Price (Business)</th>
                        <th>Select</th>
                        </tr>";
                        while (mysqli_stmt_fetch($stmt)) {
                            echo "<tr>
                            <td>".$flight_no."</td>
                            <td>".$from_city."</td>
                            <td>".$to_city."</td>
                            <td>".$departure_date."</td>
                            <td>".$departure_time."</td>
                            <td>".$arrival_date."</td>
                            <td>".$arrival_time."</td>
                            <td>".$price_business." VND</td>
                            <td><input type=\"radio\" name=\"select_flight\" value=\"".$flight_no."\"></td>
                            </tr>";
                        }
                        echo "</table> <br>";
                        echo "<div class='submit-container'><input type=\"submit\" value=\"Select Flight\" name=\"Select\"></div>";
                        echo "</form>";
                    }
                }   
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
            } else {
                echo "The following data fields were empty! <br>";
                foreach ($data_missing as $missing) {
                    echo $missing ."<br>";
                }
            }
        } else {
            echo "Search request not received";
        }
    ?>
</body>
</html>
