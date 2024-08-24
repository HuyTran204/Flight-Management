<?php
	session_start();
?>
<html>
	<head>
		<title>View Booked Tickets</title>
		<style>
			body, html {
                height: 100%;
                margin: 0;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                background-color: #f3f3f3;
                font-family: Arial, sans-serif;
            }

            .logos {
                width: 100%;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: flex-start; /* Align the logo to the left */
                background-color: #f3f3f3;
                padding-left: 10px;
            }

            .logo1 {
                object-fit: cover;
                width: 300px;
                padding: 10px;
            }

            .menu {
                width: 100%;
                background-color: #030337;
                display: flex;
                justify-content: center;
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
                width: 90%;
                max-width: 800px;
                margin: 20px 0;
            }

            h2 {
                color: #030337;
                font-size: 24px;
            }

            table {
                width: 100%;
                margin: 20px 0;
                border-collapse: collapse;
            }

            table, th, td {
                border: 1.5px solid #030337;
            }

            th, td {
                padding: 10px;
                text-align: center;
            }

            tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            input {
    			border: 1.5px solid #030337;
    			border-radius: 4px;
    			padding: 7px 20px;
                width: calc(100% - 50px);
			}

			input[type=submit] {
				background-color: #030337;
				color: white;
    			border-radius: 4px;
    			padding: 7px 45px;
                width: calc(100% - 60px);
                margin-top: 20px;
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
                <li><a href="admin_homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="admin_homepage.php"><i class="fa fa-desktop" aria-hidden="true"></i> Dashboard</a></li>
                <li><a href="logout_handler.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </div>
		<div class="content">
			<h2>List of Booked Tickets for the Flight</h2>
			<?php
				if(isset($_POST['Submit'])) {
					$data_missing = array();
					if(empty($_POST['flight_no'])) {
						$data_missing[] = 'Flight No.';
					} else {
						$flight_no = trim($_POST['flight_no']);
					}
					if(empty($_POST['departure_date'])) {
						$data_missing[] = 'Departure Date';
					} else {
						$departure_date = $_POST['departure_date'];
					}

					if(empty($data_missing)) {
						require_once('Database Connection file/mysqli_connect.php');
						$query = "SELECT pnr, date_of_reservation, class, no_of_passengers, payment_id, customer_id FROM Ticket_Details WHERE flight_no = ? AND journey_date = ? AND booking_status = 'CONFIRMED' ORDER BY class";
						$stmt = mysqli_prepare($dbc, $query);
						mysqli_stmt_bind_param($stmt, "ss", $flight_no, $departure_date);
						mysqli_stmt_execute($stmt);
						mysqli_stmt_bind_result($stmt, $pnr, $date_of_reservation, $class, $no_of_passengers, $payment_id, $customer_id);
						mysqli_stmt_store_result($stmt);
						if(mysqli_stmt_num_rows($stmt) == 0) {
							echo "<h3>No booked tickets information is available!</h3>";
						} else {
							echo "<table>";
							echo "<tr><th>PNR</th>
								<th>Date of Reservation</th>
								<th>Class</th>
								<th>No. of Passengers</th>
								<th>Payment ID</th>
								<th>Customer ID</th>
							</tr>";
							while(mysqli_stmt_fetch($stmt)) {
								echo "<tr>
									<td>".$pnr."</td>
									<td>".$date_of_reservation."</td>
									<td>".$class."</td>
									<td>".$no_of_passengers."</td>
									<td>".$payment_id."</td>
									<td>".$customer_id."</td>
								</tr>";
							}
							echo "</table><br>";
						}
						mysqli_stmt_close($stmt);
						mysqli_close($dbc);
					} else {
						echo "The following data fields were empty!<br>";
						foreach($data_missing as $missing) {
							echo $missing ."<br>";
						}
					}
				} else {
					echo "Submit request not received";
				}
			?>
		</div>
	</body>
</html>
