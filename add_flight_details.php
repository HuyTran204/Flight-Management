<?php
session_start();
?>
<html>
<head>
    <title>Add Flight Schedule Details</title>
    <style>
        body,
        html {
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
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            background-color: #f3f3f3;
        }

        .logo1 {
            object-fit: cover;
            width: 600px;
            padding: 10px;
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
            max-width: 1200px;
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

        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            width: 100%;
            box-sizing: border-box;
            margin-top: 20px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-row .form-group {
            width: 48%;
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
        <form action="add_flight_details_form_handler.php" method="post">
            <h2>Enter Flight Schedule Details</h2>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                echo "<strong style='color: green'>The Flight Schedule has been successfully added.</strong><br><br>";
            } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                echo "<strong style='color: red'>*Invalid Flight Schedule Details, please enter again.</strong><br><br>";
            }
            ?>
            <div class="form-row">
                <div class="form-group">
                    <label>Flight Number</label>
                    <input type="text" name="flight_no" required>
                </div>
                <div class="form-group">
                    <label>Aircraft ID</label>
                    <input list="jet_ids" name="jet_id" placeholder="Select Aircraft ID" required>
                    <datalist id="jet_ids">
                        <?php
                        require_once('Database Connection file/mysqli_connect.php');
                        $query = "SELECT jet_id FROM jet_details";
                        $result = mysqli_query($dbc, $query);
                        while ($row = mysqli_fetch_array($result)) {
                            echo "<option value='" . $row['jet_id'] . "'>";
                        }
                        mysqli_close($dbc);
                        ?>
                    </datalist>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>From</label>
                    <input list="origins" name="origin" placeholder="From" required>
                    <datalist id="origins">
					<option value="" disabled selected>From</option>
                            <option value="Buôn Ma Thuột">Buôn Ma Thuột</option>
                            <option value="Cà Mau">Cà Mau</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="Đà Lạt">Đà Lạt</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Điện Biên">Điện Biên</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Hải Phòng">Hải Phòng</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="Huế">Huế</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Phú Quốc">Phú Quốc</option>
                            <option value="Pleiku">Pleiku</option>
                            <option value="Quy Nhơn">Quy Nhơn</option>
                            <option value="Vinh">Vinh</option>
                            <option value="Vũng Tàu">Vũng Tàu</option>
                    </datalist>
                </div>
                <div class="form-group">
                    <label>To</label>
                    <input list="destinations" name="destination" placeholder="To" required>
                    <datalist id="destinations">
					<option value="" disabled selected>To</option>
                            <option value="Buôn Ma Thuột">Buôn Ma Thuột</option>
                            <option value="Cà Mau">Cà Mau</option>
                            <option value="Cần Thơ">Cần Thơ</option>
                            <option value="Đà Lạt">Đà Lạt</option>
                            <option value="Đà Nẵng">Đà Nẵng</option>
                            <option value="Điện Biên">Điện Biên</option>
                            <option value="Hà Nội">Hà Nội</option>
                            <option value="Hải Phòng">Hải Phòng</option>
                            <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                            <option value="Huế">Huế</option>
                            <option value="Nha Trang">Nha Trang</option>
                            <option value="Phú Quốc">Phú Quốc</option>
                            <option value="Pleiku">Pleiku</option>
                            <option value="Quy Nhơn">Quy Nhơn</option>
                            <option value="Vinh">Vinh</option>
                            <option value="Vũng Tàu">Vũng Tàu</option>
                    </datalist>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Departure Date</label>
                    <input type="date" name="dep_date" required>
                </div>
                <div class="form-group">
                    <label>Arrival Date</label>
                    <input type="date" name="arr_date" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Departure Time</label>
                    <input type="time" name="dep_time" required>
                </div>
                <div class="form-group">
                    <label>Arrival Time</label>
                    <input type="time" name="arr_time" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Seats in Economy Class</label>
                    <input type="number" name="seats_eco" required>
                </div>
                <div class="form-group">
                    <label>Seats in Business Class</label>
                    <input type="number" name="seats_bus" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label>Ticket Price (Economy Class)</label>
                    <input type="number" name="price_eco" required>
                </div>
                <div class="form-group">
                    <label>Ticket Price (Business Class)</label>
                    <input type="number" name="price_bus" required>
                </div>
            </div>
            <input type="submit" value="Submit" name="Submit">
        </form>
    </div>
</body>

</html>
