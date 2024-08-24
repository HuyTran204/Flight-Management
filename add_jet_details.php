<?php
session_start();
?>
<html>

<head>
    <title>Enter Aircraft Details</title>
    <style>
        input {
            border: 1.5px solid #030337;
            border-radius: 4px;
            padding: 7px 30px;
            width: calc(100% - 64px);
            margin-bottom: 10px;
        }

        input[type=submit] {
            background-color: #030337;
            color: white;
            border-radius: 4px;
            padding: 7px 45px;
            margin-top: 20px;
            display: block;
            width: auto;
            margin-left: auto;
            margin-right: auto;
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
        <form action="add_jet_details_form_handler.php" method="post">
            <h2>Enter the Aircraft Details</h2>
            <div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] == 'success') {
                    echo "<strong style='color: green'>The Aircraft has been successfully added.</strong><br><br>";
                } else if (isset($_GET['msg']) && $_GET['msg'] == 'failed') {
                    echo "<strong style='color:red'>*Jet ID already exists, please enter a new Jet ID.</strong><br><br>";
                }
                ?>
                <table cellpadding="5">
                    <tr>
                        <td class="fix_table">Enter a valid Jet ID</td>
                    </tr>
                    <tr>
                        <td class="fix_table"><input type="text" name="jet_id" required></td>
                    </tr>
                </table>
                <br>
                <table cellpadding="5">
                    <tr>
                        <td class="fix_table">Enter the Jet Type/Model</td>
                    </tr>
                    <tr>
                        <td class="fix_table"><input type="text" name="jet_type" required></td>
                    </tr>
                </table>
                <br>
                <table cellpadding="5">
                    <tr>
                        <td class="fix_table">Enter the total capacity of the Jet</td>
                    </tr>
                    <tr>
                        <td class="fix_table"><input type="number" name="jet_capacity" required></td>
                    </tr>
                </table>
                <input type="submit" value="Submit" name="Submit">
            </div>
        </form>
    </div>
</body>
</html>
