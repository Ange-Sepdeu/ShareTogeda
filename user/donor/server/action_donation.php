<?php
require("db/db.php");
if(isset($_POST["submit"]))
{
    // session_start()
      $donorName = "John Doe";
      $donorEmail = "chriskameni25@gmail.com";
      $food_desc = $_POST["foodName"];
      $food_quantity = $_POST["quantity"];
      $expiry_datetime = $_POST["donordatetime"];
      $donation_datetime = date('d-m-y h:i');
      srand(time());
      $donation_id =  strval(rand());
      $sql = "INSERT INTO donors(donation_id, donorName, donorEmail, foodDesc, foodQuantity, expiryDate, donation_date) VALUES(?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo `<script>alert('Error'+mysqli_error())</script>`;
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "sssssss",  $donation_id, $donorName, $donorEmail, $food_desc, $food_quantity, $expiry_datetime, $donation_datetime);
                    mysqli_stmt_execute($stmt);
                    // $message = "Thank you ".$donorName." for your donation";
                    // $subject = "ShareTogela Success";
                    // $headers = "From: sharetogela.com" . "\r\n";
                    // if(mail($donorEmail, $subject,$subject, $headers))
                    // {
                    echo"<script>
                    alert('Donation saved Successfully, Check your email');
                    window.location.href='../make-donation.php';
                    </script>";
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
                
    
}

?>