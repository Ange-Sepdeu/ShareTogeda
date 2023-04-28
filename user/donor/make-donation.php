<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="css/make-donation.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <title>Make Donation</title>
</head>
<body>
<?php
      session_start();
    //   $name = $_SESSION["donorname"];
    //   $email = $_SESSION["donoremail"];
    //   $phone = $_SESSION["donortel"];

      $name = "John Doe";
      $email = "doe25@gmail.com";
      $phone = "675512623";

    //   if(empty($name))
    //   {
    //     header("Location: login")
    //   }
    ?>
    <main>
        <section id="left-side">
            <h2>Make Donation</h2>
            <form id="form" action="server/action_donation.php" enctype="multipart/form-data" method="POST">
                <div id="error" style="color: tomato;"></div>
                <div id="food-entry1" class="entry">
                    <label for="food-input1">Food Description</label>
                </div>
                <div id="quantity-entry1" class="entry">
                    <label for="quantity-input1">Name</label>
                    <div id="quantity-div1" class="input quantity">
                        <input onfocusout="validate(event)" type="text" name="foodName" id="foodName" placeholder="Food Name" required>
                        <i class="fa-solid fa-pizza-slice"></i>
                    </div>
                </div>
                <div id="quantity-entry2" class="entry">
                    <label for="quantity-input2">Quantity</label>
                    <div id="quantity-div2" class="input quantity">
                        <input type="text" name="quantity" onfocusout="validate(event)" id="quantity" min="1" placeholder="Quantity Amount" required>
                    </div>
                </div>
                <div id="food-entry2" class="entry">
                    <label for="food-input2">Expiry Date</label>
                    <div id="food-div2" class="input">
                        <input onfocusout="validate(event);" type="datetime-local" id="donordatetime" name="donordatetime" placeholder="Enter the expiry date" />
                    </div>
                </div>

                    <button type="submit" name="submit" id="add-button" style="display:none">
                        Donate
                    </button>
            </form>
        </section>

        <section id="right-side">
            <div id="location">
                <img src="../../resources/images/map.png" alt="Map">
            </div>
            <p id="address-line-1" class="address"><span>Drop Off Location:</span> No 2 Chinwona Street</p>
            <p id="address-line-2" class="address">Rumuodumaya, Port Harcourt</p>
        </section>
    </main>
</body>
<script>
    function validate(e)
    {
        e.preventDefault()
        var error = ""
        var foodName = document.getElementById("foodName").value
        var quantity = document.getElementById("quantity").value
        var datetime = document.getElementById("donordatetime").value
        if(e.srcElement.id==="foodName")
     {
         var regexName = /^([a-zA-Z]+)$/
         if(!foodName.match(regexName))
          error = "Invalid food name"
          else
          error = ""
          document.getElementById("error").innerHTML = error
    }
    if(e.srcElement.id==="quantity")
    {    
    var regexQuantity = /^([0-9]+)$/
    if(!quantity.match(regexQuantity))
         error = "Invalid quantity"    
         else
          error = ""
         document.getElementById("error").innerHTML = error
    }    
    if(e.srcElement.id==="donordatetime")
    {
    if(new Date(datetime) < new Date())
         error = "Expiry date is less than current date"
         else
          error = ""     
         document.getElementById("error").innerHTML = error
    }
    if(error==="" && (foodName!="" && quantity!="" && datetime!=""))
     document.getElementById("add-button").style.display=""
    }
</script>
</html>