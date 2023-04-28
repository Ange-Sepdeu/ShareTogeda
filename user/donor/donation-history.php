<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../resources/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../css/history-detail.css">
    <!-- <link rel="stylesheet" href="../css/history.css"> -->
    <link href="DataTables/datatables.min.css" rel="stylesheet"/>

    
    <title>Donation History</title>
    <style>
        table {
            border: none;
            width: 80%;
            align-self: center;
            background-color: white;
        }
        td {
            padding: 15px;
            text-align: center;
        }
        th {
            padding: 15px;
            border-bottom: 5px solid black;
        }
        #donation-history {
            padding: 40px;
        }
        #donation-detail {
            display: none
        }
        #donation-history h2 {
            margin-bottom: 2%;
            padding: 40px;
        }
        .view-detail button {
            color: white;
            padding: 12px;
            border: none;
            cursor: pointer;
            font-weight: 800;
            letter-spacing: 0.02rem;
            background-color: #3C59F4;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<div id="donation-detail">
    <main>
<div class="top-info">
            <span id="back-arrow">
                <i class="fa-regular fa-circle-left"></i>
            </span>
            <h1>Donation Detail</h1>
</div>

        <div id="section-container">
            <section id="left-side">
                <h2 id="user-info" class="info">User Info</h2>
                <div id="user-info-container" class="info-container">
                    <div id="from" class="detail" title="Donor">
                        <div class="header purple">
                            <h5>From</h5>
                            <i class="fa-regular fa-circle-up"></i>
                        </div>
                        <div class="info-detail purple">
                            <div class="overlay"></div>
                            <span>ID: <span id="donor-id">1000</span></span>
                            <hr>
                            <span>Name: <span id="donor-name">John Doe(You)</span></span>
                        </div>
                    </div>
                    <div id="to" class="detail" title="Receiver">
                        <div class="header yellow">
                            <h5>To</h5>
                            <i class="fa-regular fa-circle-down"></i>
                        </div>
                        <div class="info-detail yellow">
                            <div class="overlay"></div>
                            <span>ID: <span id="receiver-id">292</span></span>
                            <hr>
                            <span>Name: <span id="receiver-name">Mary Ann</span></span>
                        </div>
                    </div>
                </div>
            </section>
            <section id="right-side">
                <div id="item-info-container" class="info-container">
                    <h2 id="item-info" class="info">Item Info</h2>
                    <ul class="detail-list">
                        <li>
                            <div id="items" class="item-detail">
                                <div class="title">
                                    <h5 class="">Food Description</h5>
                                </div>
                                <div class="content">
                                    <span id="foodName">Cornflakes, Milk, Spaghetti</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div id="status" class="item-detail">
                                <h5 class="title">Status</h5>
                                <div class="content">
                                    <span id="status-content">Pending</span>
                                    <a href="tracking-status.php">View Status</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div id="date" class="item-detail">
                                <h5 class="title">Date</h5>
                                <div class="content">
                                    <span id="expiryDate">2023-10-23 11:30</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>
    </main>
    </div>
<?php
        require("server/donation_history.nc.php");
        ?>
    <div id="donation-history">
        <h2 class="title">Donation History</h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%" cellspacing="0">
            <tr id="header">
                <th class="center">Donation ID</th>
                <!-- <th>Items</th> -->
                <th>Receiver</th>
                <th>Status</th>
                <!-- <th class="center">Quantity</th> -->
                <th>Date</th>
            </tr>
            
        <?php
            for($i=0;$i<count($donationId);$i++)
            {
                echo "<tr class='odd'>";
                echo "<td class='donation-id' class='center'>$donationId[$i]</td>";
                echo "<td class='receiver-id'>$receiver[$i]</td>";
                echo "<td class='status'>$status[$i]</td>";
                echo "<td>";
                echo "<span>$date[$i]</span>";
                echo "<div class='view-detail'>";
                echo "<button onclick=\"openDetails('$donationId[$i]', '$receiver[$i]', '$food[$i]', '$expiryDate[$i]', '$status[$i]');\">View Detail</button>";
                echo "</div>";
                echo "</td>";
                echo " </tr>";
            }        
        ?>
        </table>
    </div>
</body>
<script>
    function openDetails(donId, rec, food, expirydate, status)
    {
        document.getElementById("donation-history").style.display="none";
        document.getElementById("donation-detail").style.display="initial";
        document.getElementById("donor-id").innerHTML = donId;
        document.getElementById("receiver-name").innerHTML = rec;
        document.getElementById("foodName").innerHTML = food;
        document.getElementById("expiryDate").innerHTML = expirydate;
        document.getElementById("status-content").innerHTML =status
    }
        </script>
<script src="DataTables/datatables.min.js"></script>
<script src="../../js/back-arrow.js"></script>
<script src="../js/history-detail.js"></script>
<script src="js/donation-history-detail.js"></script>
<!-- <script src="../js/history.js"></script>
<script src="js/donation-history.js"></script> -->
</html>