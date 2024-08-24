<html>
<head>
    <title>
        Create New User Account
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

        .center_form {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-grow: 1;
            width: 100%;
            min-height: calc(100vh - 100px);
            padding-top: 20px;
        }

        .center_form form {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            font-weight: bold;
            text-align: center;
            width: 100%;
            max-width: 600px;
            max-height: 842px;
            overflow: auto;
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

        legend {
            color: #030337;
            text-align: center;
        }

        strong {
            color: #030337;
        }

        a {
            color: #030337;
            font-weight: bold;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .success-image {
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
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
            <li><a href="home_page.php"><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
            <li><a href="login_page.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
            <li><a href="login_page.php"><i class="fa fa-ticket" aria-hidden="true"></i> Book Tickets</a></li>
            <li><a href="pnrall.php"><i class="fa fa-ticket" aria-hidden="true"></i> Check PNR</a></li>
            <li><a href="home_page.php"><i class="fa fa-plane" aria-hidden="true"></i> About Us</a></li>
            <li><a href="home_page.php"><i class="fa fa-phone" aria-hidden="true"></i> Contact Us</a></li>
        </ul>
    </div>
    <br>
    <div class="center_form">
        <form>
            <h2>New user successfully registered! Login into your account to book tickets.</h2>
            <img class="success-image" src="images/shutterstock_390581569.jpg" alt="Success Image"/>
        </form>
    </div>
</body>
</html>
