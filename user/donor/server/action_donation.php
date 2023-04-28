<?php
require("db/db.php");
if(isset($_POST["submit"]))
{
    // session_start()
      $donorName = "John Doe";
      $donorEmail = "chriskameni25@gmail.com";
      $filename = $_FILES['donationProof']["name"];
      $uploadedName = $donorName." ".$filename;
    //   $donorPhone = "675512623";
    $file_temp = $_FILES['donationProof']['tmp_name'];
      $food_desc = $_POST["foodName"];
      $food_quantity = $_POST["quantity"];
      $expiry_datetime = $_POST["donordatetime"];
      $donation_datetime = date('d-m-y h:i');
      srand(time());
      $donation_id =  strval(rand());
      $sql = "INSERT INTO donors(donation_id, donorName, donorEmail, foodDesc, foodQuantity, expiryDate, donation_date, proof) VALUES(?,?,?,?,?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    echo `<script>alert('Error'+mysqli_error())</script>`;
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "ssssssss",  $donation_id, $donorName, $donorEmail, $food_desc, $food_quantity, $expiry_datetime, $donation_datetime, $uploadedName);
                    mysqli_stmt_execute($stmt);
                    move_uploaded_file($file_temp, "./donation_proofs/".$uploadedName);
                    $message = "Thank you ".$donorName." for your donation";
                    $subject = "ShareTogela Success";
                    $headers = "From: sharetogela.com" . "\r\n";
                    if(mail($donorEmail, $subject,$subject, $headers))
                    {
                    echo"<script>
                    alert('Donation saved Successfully, Check your email');
                    window.location.href='../make-donation.php';
                    </script>";
                    }
                    mysqli_stmt_close($stmt);
                    mysqli_close($conn);
                    exit();
                }
                
    
}

?>