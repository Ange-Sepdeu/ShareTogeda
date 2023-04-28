<?php
require './db/db.php';
$name = $_SESSION["fullName"];
$sql = "SELECT * FROM parcours WHERE donorName=?";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?loginerror-sqlerror");
    exit();
} else {
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $donationId=array();
    $receiver=array();
    $date=array();
    $status=array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($donationId,$row['donation_id']);
            array_push($date, Date("Y", strtotime($row['donation_date'])));
            array_push($receiver,$row['receivername']);
            array_push($status,$row['status']);
        }
}
?>