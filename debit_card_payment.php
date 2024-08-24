<?php
session_start();
if (isset($_POST['Pay_Now'])) {
    $no_of_pass = $_SESSION['no_of_pass'];
    $flight_no = $_SESSION['flight_no'];
    $journey_date = $_SESSION['journey_date'];
    $class = $_SESSION['class'];
    $pnr = $_SESSION['pnr'];
    $payment_id = $_SESSION['payment_id'];
    $total_amount = $_SESSION['total_amount'];
    $payment_date = $_SESSION['payment_date'];
    $payment_mode = 'Debit Card';

    require_once('Database Connection file/mysqli_connect.php');

    // Xác định truy vấn cập nhật số ghế dựa trên lớp
    $query = $class == 'economy' ? 
        "UPDATE Flight_Details SET seats_economy = seats_economy - ? WHERE flight_no = ? AND departure_date = ?" :
        "UPDATE Flight_Details SET seats_business = seats_business - ? WHERE flight_no = ? AND departure_date = ?";
    
    // Chuẩn bị và thực thi truy vấn cập nhật số ghế
    $stmt = mysqli_prepare($dbc, $query);
    mysqli_stmt_bind_param($stmt, "iss", $no_of_pass, $flight_no, $journey_date);
    mysqli_stmt_execute($stmt);
    $affected_rows_1 = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);

    if ($affected_rows_1 == 1) {
        // Truy vấn chèn thông tin thanh toán
        $query = "INSERT INTO Payment_Details (payment_id, pnr, payment_date, payment_amount, payment_mode) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($stmt, "sssis", $payment_id, $pnr, $payment_date, $total_amount, $payment_mode);
        mysqli_stmt_execute($stmt);
        $affected_rows_2 = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);

        if ($affected_rows_2 == 1) {
            header('location:ticket_success.php');
        } else {
            echo "Submit Error: " . mysqli_error($dbc);
        }
    } else {
        echo "Submit Error: " . mysqli_error($dbc);
    }
    mysqli_close($dbc);
} else {
    echo "Payment request not received";
}
?>
