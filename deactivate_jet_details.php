<?php
    session_start();
?>
<html>
    <head>
        <title>Welcome Administrator</title>
        <style>
            * {
                font-size: 20px;
                box-sizing: border-box; /* Include padding and border in element's total width and height */
            }

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

            .logo {
                width: 100%;
                height: 100px;
                display: flex;
                align-items: center;
                justify-content: flex-start; /* Aligns the logo to the left */
                background-color: #f3f3f3;
                padding-left: 10px;
                margin-bottom: 20px;
            }

            .logo img {
                object-fit: cover;
                height: 80px; /* Adjust the height as needed */
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
                font-size: 36px; /* Adjust the font size as needed */
            }

            h2 {
                color: #030337;
                text-align: center;
                margin-top: 20px;
                font-size: 30px; /* Increases the font size */
            }

            .content {
                width: 100%;
                max-width: 800px;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin: 20px 0;
                text-align: center;
            }

            .form-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }

            .form-group {
                width: 48%;
            }

            input[type="text"], input[type="submit"] {
                width: 100%;
                padding: 10px;
                margin: 10px 0;
                border: 1.5px solid #030337;
                border-radius: 4px;
            }

            input[type="submit"] {
                background-color: #030337;
                color: white;
                font-weight: bold;
                cursor: pointer;
            }

            input[type="submit"]:hover {
                background-color: #020225;
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
		<form action="deactivate_jet_details_form_handler.php" method="post">
			<h2>ENTER THE AIRCRAFT TO BE DEACTIVATED</h2>
			<div>
			<?php
				if(isset($_GET['msg']) && $_GET['msg']=='success')
				{
					echo "<strong style='color: green'>The Aircraft has been successfully deactivated.</strong>
						<br>
						<br>";
				}
				else if(isset($_GET['msg']) && $_GET['msg']=='failed')
				{
					echo "<strong style='color:red'>*Invalid Jet ID entered, please enter again.</strong>
						<br>
						<br>";
				}
			?>
			<table cellpadding="5" style="padding-left: 20px;">
				<tr>
					<td class="fix_table">Enter a valid Jet ID</td>
				</tr>
				<tr>
					<td class="fix_table"><input type="text" name="jet_id" required></td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Deactivate" name="Deactivate">
			</div>
		</form>
	</body>
</html>