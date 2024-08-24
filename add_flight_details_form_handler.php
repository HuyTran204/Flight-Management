<?php
session_start();

if (isset($_POST['Submit'])) {
    // Kết nối cơ sở dữ liệu
    require_once('Database Connection file/mysqli_connect.php');

    // Kiểm tra kết nối
    if (!$dbc) {
        die('Could not connect to MySQL: ' . mysqli_connect_error());
    }

    // Thu thập dữ liệu từ form
    $flight_no = trim($_POST['flight_no']);
    $jet_id = trim($_POST['jet_id']);
    $origin = trim($_POST['origin']);
    $destination = trim($_POST['destination']);
    $dep_date = trim($_POST['dep_date']);
    $arr_date = trim($_POST['arr_date']);
    $dep_time = trim($_POST['dep_time']);
    $arr_time = trim($_POST['arr_time']);
    $seats_eco = trim($_POST['seats_eco']);
    $seats_bus = trim($_POST['seats_bus']);
    $price_eco = trim($_POST['price_eco']);
    $price_bus = trim($_POST['price_bus']);

    // Kiểm tra các trường dữ liệu không bị bỏ trống
    $data_missing = array();
    foreach ($_POST as $key => $value) {
        if (empty($value)) {
            $data_missing[] = $key;
        }
    }

    if (empty($data_missing)) {
        // Chuẩn bị và thực thi câu truy vấn với tên cột đúng
        $query = "INSERT INTO flight_details (flight_no, from_city, to_city, departure_date, arrival_date, departure_time, arrival_time, seats_economy, seats_business, price_economy, price_business, jet_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "sssssssiisis", $flight_no, $origin, $destination, $dep_date, $arr_date, $dep_time, $arr_time, $seats_eco, $seats_bus, $price_eco, $price_bus, $jet_id);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                header('Location: add_flight_details.php?msg=success');
                exit();
            } else {
                mysqli_stmt_close($stmt);
                mysqli_close($dbc);
                header('Location: add_flight_details.php?msg=failed');
                exit();
            }
        } else {
            // Nếu chuẩn bị câu truy vấn thất bại
            echo "Error preparing statement: " . mysqli_error($dbc);
        }

        // Đóng kết nối cơ sở dữ liệu
        mysqli_close($dbc);
    } else {
        echo "The following data fields were empty: <br>";
        foreach ($data_missing as $missing) {
            echo $missing . "<br>";
        }
    }
} else {
    echo "Form submission error.";
}
?>
