<?php
require 'db.php';
$sql = "SELECT * from donors";
$stmt = mysqli_stmt_init($conn);
if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../login.php?loginerror-sqlerror".mysqli_error($conn));
    exit();
} else {
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $donorId=array();
    $recId=array();
    $date=array();
    $expiryDate = array();
    $food = array();
    $donorName = array();
    $donorEmail = array();
    $receiverName = array();
    $foodQuantity = array();
    $status=array();
        while($row = mysqli_fetch_assoc($result)) {
            array_push($status, $row["status"]);
            array_push($date, $row["donation_date"]);
            array_push($food, $row["foodDesc"]);
            array_push($foodQuantity, $row["foodQuantity"]);
            array_push($donorName, $row["donorName"]);
            array_push($receiverName, $row["receivername"]);
            $sql = "SELECT id, type from users where fullname=? OR fullname=?";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?loginerror-sqlerror".mysqli_error($conn));
            exit();
           } else {
            mysqli_stmt_bind_param($stmt, "ss", $row["donorName"], $row["receivername"]);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
                while($row = mysqli_fetch_assoc($result))
                {
                    if($row["type"] == "donor")
                    array_push($donorId, $row["id"]);
                    if($row["type"] == "receiver")
                    array_push($recId, $row["id"]);
                }
        }
    }
}
?>