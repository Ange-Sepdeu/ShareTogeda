<?php
session_start();
$name = $_SESSION["fullname"];
$email = $_SESSION["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../resources/fontawesome-free-6.3.0-web/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/settings-flyout.css">
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" />
    <title>Admin Panel</title>
</head>
<body>
    <section id="left-pane">
        <h2 class="title">
            <span>Admin Panel</span>
            <span class="email">joegoldberg@gmail.com</span>
        </h2>
        <hr>
        <div class="action-container">
            <div class="action">
                <button id="dashboard-btn" class="action-btn active" onclick="clickHandler(event); ">Dashboard</button>
            </div>
            <div class="action">
                <button id="donation-btn" class="action-btn" onclick="clickHandler(event);setActive(0);"> Donations</button>
            </div>
            <div class="action">
                <button id="donor-btn" class="action-btn" onclick="clickHandler(event);setActive(1);">View Donors</button>
            </div>
            <div class="action">
                <button id="receiver-btn" class="action-btn" onclick="clickHandler(event);setActive(1);">View Receivers</button>
            </div>
        </div>
    </section>
    <section id="right-pane">
        <nav id="navbar">
            <span class="svg">
                <img src="../resources/images/menu4.png" alt="">
            </span>
            <span id="menu-toggler" class="svg">
                <img src="../resources/images/menu4.png" alt="">
            </span>
            <button id="settings-btn" class="svg">
                <img src="../resources/images/settings100.png" alt="">
            </button>
            
            <div id="settings">
                <a href="update-profile.html">Update Profile</a>
                <hr>
                <form id="signout-form" action="login.html" method="">
                    <input type="submit" value="Sign out" />
                </form>
            </div>
        </nav>

        <main>
            <div id="dashboard" class="content active">
                <h2>Hi Admin, welcome back!</h2>
                <div id="info-container">
                    <div class="info" id="new">
                        <span>New Donations</span>
                        <div class="amount">
                            <span>6</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                    <div class="info" id="incomplete">
                        <span>Incomplete Donations</span>
                        <div class="amount">
                            <span>8</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                    <div class="info" id="successful">
                        <span>Successful Donations</span>
                        <div class="amount">
                            <span>12</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                    <div class="info" id="total-donations">
                        <span>Total Donations</span>
                        <div class="amount">
                            <span>20</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                    <div class="info" id="reg-donors">
                        <span>Total Reg. Donors</span>
                        <div class="amount">
                            <span>8</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                    <div class="info" id="reg-receivers">
                        <span>Total Reg. Receivers</span>
                        <div class="amount">
                            <span>8</span>
                            <i class="fa-solid fa-angles-right" title="View More"></i>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        require("server/donations.php");
        ?>
    <div id="donation-history">
        <h2 class="title">Donations Table</h2>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
        <tr id="header">
                <th class="center">Donor Name</th>
                <!-- <th>Items</th> -->
                <th>Receiver Name</th>
                <th>Status</th>
                <!-- <th class="center">Quantity</th> -->
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $array = array();
            for($i=0;$i<count($recId);$i++)
            { 
            $array["donorId"] = $donorId[$i];
            $array["donorName"]=$donorName[$i];
            $array["recId"] = $recId[$i];
            $array["foodQuantity"] = $foodQuantity;
            $array["receiver-name"] = $receiverName[$i];
            $array["status"] = $status[$i];
            $array["foodDesc"] = $food[$i];
            $array["date"] = $date[$i];
            $string = implode(",", $array);
                ?>
                 <tr class='odd'>
                <td class='donation-id' class='center'><?= $donorName[$i] ?></td>
                <td class='receiver-id'><?= $receiverName[$i] ?></td>
                <td class='status'><?= $status[$i]?></td>
                <td>
                <span><?= $date[$i] ?></span>
                <div style="display:none;" class='view-detail'>
                <button style="
                background-color: dodgerblue;
                display:none;
                color: white;
                border:none;
                padding: 7px;
                border-radius: 10px" 
                data-value="<?= $string; ?>" onclick="openDetails(this);">View Detail</button>
                </div>
                <button style="
                background-color: dodgerblue;
                color: white;
                border:none;
                padding: 7px;
                border-radius: 10px;" 
                data-value="<?= $string; ?>" onclick="viewDonationDetails(this);">View Detail</button>
                </td>
                 </tr>
            <?php }        
        ?>
        </tbody>
        </table>
</div>
        
            <div id="donations" class="content table-container" style="display:none;">
                <div id="donation-history" class="table-item active">
                    <div class="top-info">
                        <h2>Donations Table</h2>
                        <span class="back-arrow not-active">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <tr id="header">
                            <th class="center">Donor ID</th>
                            <!-- <th>Items</th> -->
                            <th>Receiver ID</th>
                            <th>Status</th>
                            <!-- <th class="center">Quantity</th> -->
                            <th>Date</th>
                        </tr>
                        
                    </table>
                </div>
            </div>
                <div id="history-detail" class="table-item">
                    <div class="top-info">
                        <h2>Donation Detail</h2>
                        <span  class="back-arrow">
                            <i onclick="location.reload();" class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <div id="info-container">
                        <div id="donor" class="category">
                            <span class="title">Donor Info</span>
                            <div id="donor-id" class="info">
                                <h4>Donor ID</h4>
                                <span class="user-donor-id">1000001 - Click for more info</span>
                            </div>
                            <div id="donor-name" class="info">
                                <h4>Name</h4>
                                <span id="user-donor-name">John Doe</span>
                            </div>
                        </div>
                        <div id="receiver" class="category">
                            <span class="title">Receiver Info</span>
                            <div id="receiver-id" class="info">
                                <h4>Receiver ID</h4>
                                <span class="user-receiver-id">292 - Click for more info</span>
                            </div>
                            <div id="receiver-name" class="info">
                                <h4>Name</h4>
                                <span id="user-receiver-name">Mary Ann</span>
                            </div>
                        </div>
                        <hr>
                        <div id="items" class="category">
                            <span class="title">Items</span>
                            <div id="items" class="info">
                                <h4>Items</h4>
                                <span id="items-details">Cornflakes, Milk, Spaghetti</span>
                            </div>
                            <div id="quantity" class="info">
                                <h4>Quantity</h4>
                                <span id="items-quantity">1, 3, 4</span>
                            </div>
                            <div id="status" class="info">
                                <h4>Status</h4>
                                <span id="item-status">Pending</span>
                                <div class="track-status">
                                    <button>Track Status</button>
                                </div>
                            </div>
                            <div id="date" class="info">
                                <h4>Date</h4>
                                <span id="donation-date">2023-10-23 11:30</span>
                            </div>
                        </div>
                    </div>
                <div id="track-status" class="table-item">
                    <div class="top-info">
                        <h2>Tracking Details</h2>
                        <span class="back-arrow">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <div class="step-container">
                        <div id="step-one" class="step">
                            <span>Donation Placed</span>
                            <div class="status complete">
                                <span>Completed</span>
                                <i class="fa-regular fa-circle-check"></i>
                                <div class="change-status">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-two" class="step">
                            <span>Donation Picked Up</span>
                            <div class="status">
                                <span>On Progress</span>
                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                <div class="change-status active">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-three" class="step">
                            <span>Donation Arrived at Office</span>
                            <div class="status">
                                <span>On Progress</span>
                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                <div class="change-status active">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-four" class="step">
                            <span>Donation Quality Checked</span>
                            <div class="status">
                                <span>On Progress</span>
                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                <div class="change-status active">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-five" class="step">
                            <span>Donation Shipped to Destination</span>
                            <div class="status">
                                <span>On Progress</span>
                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                <div class="change-status active">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div id="step-six" class="step">
                            <span>Donation Processed at Destination</span>
                            <div class="status">
                                <span>On Progress</span>
                                <i class="fa-solid fa-spinner fa-spin-pulse"></i>
                                <div class="change-status active">
                                    <button onclick="markComplete(event)">
                                        <i class="fa-solid fa-check" title="Mark Complete"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="extra-information">
                        <span>Documentation</span>
                        <div class="gallery">
                            <span id="no-documentation">Process isn't complete, hence no documentation.</span>
                            <!-- IMAGES TO BE SHOWN WHEN PROCESS IS COMPLETED SHOULD BE PLACED HERE. -->
                            <!-- <img src="../../resources/images/uploaded-images/1.jpg" alt="">
                            <img src="../../resources/images/uploaded-images/2.jpg" alt="">
                            <img src="../../resources/images/uploaded-images/3.jpg" alt=""> -->
                        </div>
                    </div>
                    <div class="upload-images">
                        <span class="upload-span">Upload Completion Images</span>
                        <form action="" method="POST">
                            <input type="file" multiple name="upload-image" id="upload-image">
                            <button type="submit">Upload</button>
                        </form>
                    </div>
                    <div id="track-location-div">
                        <button class="track-location">Track Location</button>
                    </div>
                </div>
                <div id="track-location" class="table-item">
                    <div class="top-info">
                        <h2>Track Location</h2>
                        <span class="back-arrow">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14969.891201196193!2d57.395299!3d-20.280688!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x217c5c9f4d1c80b5%3A0x9088d2393f5f29c8!2sMiddlesex%20University%20Mauritius!5e0!3m2!1sen!2sng!4v1681429257338!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
            
                    <div id="legend-container">
                        <h3 class="legend-title">Legends</h3>
                        <div id="legends">
                            <div id="shipping-destination" class="legend">
                                <img src="../resources/images/green-dot.png" alt="">
                                <span class="content">Shipping Destination</span>
                            </div>
                            <div id="shipping-origin" class="legend">
                                <img src="../resources/images/blue-dot.png" alt="">
                                <span class="content">Shipping Origin</span>
                            </div>
                            <div id="shipping-vehicle" class="legend">
                                <img src="../resources/images/truck.png" alt="">
                                <span id="vehicle-content" class="content">Shipping Vehicle</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="donors" class="content table-container">
                <div id="donor-table" class="table-item active">
                    <div class="top-info">
                        <h2>Donors Table</h2>
                        <span class="back-arrow not-active">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <table cellspacing="0">
                        <thead>
                            <tr id="header">
                                <th>Donor ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DUMMY DATA -->
                            <tr class="odd">
                                <td class="donor-id">1000001</td>
                                <td class="donor-name">John Doe</td>
                                <td class="email">johndoe@gmail.com</td>
                                <!-- <td></td>
                                <td class="center address"></td> -->
                                <td>
                                    <span class="date-joined">2023-09-03 10:46</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="donor-id">1000029</td>
                                <td class="donor-name">George Bush</td>
                                <td class="email">georgebush@gmail.com</td>
                                <td>
                                    <span class="date-joined">2021-11-03 08:46</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="donor-id">1000052</td>
                                <td class="donor-name">Larry Kane</td>
                                <td class="email">larrykane@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-04-12 18:30</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="donor-id">1003297</td>
                                <td class="donor-name">Harry Potter</td>
                                <td class="email">harrypotter@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-11-24 23:01</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="donor-id">1005431</td>
                                <td class="donor-name">James Bond</td>
                                <td class="email">jamesbond@gmail.com</td>
                                <td>
                                    <span class="date-joined">2020-01-10 03:05</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="donor-id">1006103</td>
                                <td class="donor-name">Alicia Keys</td>
                                <td class="email">aliciakeys@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-01-30 07:15</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="donor-id">1007651</td>
                                <td class="donor-name">Patricia Sub</td>
                                <td class="email">patriciasub@gmail.com</td>
                                <td>
                                    <span class="date-joined">2021-12-20 09:23</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="donor-id">1020702</td>
                                <td class="donor-name">Damilton Haywire</td>
                                <td class="email">damiltonhaywire@gmail.com</td>
                                <td>
                                    <span class="date-joined">2023-02-28 10:11</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="donor-detail" class="table-item">
                    <div class="top-info">
                        <h2>Donor Detail</h2>
                        <span class="back-arrow">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <div class="info-container">
                        <form action="POST">
                            <div class="entry">
                                <label for="donor-id-input">ID</label>
                                <input id="donor-id-input" disabled type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="donor-name-input">Name</label>
                                <input id="donor-name-input" type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="donor-email-input">Email</label>
                                <input id="donor-email-input"  type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="donor-phone-input">Phone Number</label>
                                <input id="donor-phone-input" type="text" value="+230 5 123 4567">
                            </div>
                            <div class="entry">
                                <label for="donor-address-input">Address</label>
                                <input id="donor-address-input" type="text" value="3 Koboo Close, Off Saint Laurel Road, New York, America">
                            </div>
                            <div class="entry">
                                <label for="donor-date-joined-input">Date Joined</label>
                                <input id="donor-date-joined-input" type="text" value="">
                            </div>
                            <input type="submit" value="Save Changes">
                        </form>
                    </div>
                </div>
            </div>
            <div id="receivers" class="content table-container">
                <div id="receiver-table" class="table-item active">
                    <div class="top-info">
                        <h2>Receivers Table</h2>
                        <span class="back-arrow not-active">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <table cellspacing="0">
                        <thead>
                            <tr id="header">
                                <th>Receiver ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Date Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- DUMMY DATA -->
                            <tr class="odd">
                                <td class="receiver-id">292</td>
                                <td class="receiver-name">Mary Ann</td>
                                <td class="email">maryann@gmail.com</td>
                                <!-- <td></td>
                                <td class="center address"></td> -->
                                <td>
                                    <span class="date-joined">2022-08-12 04:10</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="receiver-id">480</td>
                                <td class="receiver-name">Leroy Sane</td>
                                <td class="email">leroysane@gmail.com</td>
                                <td>
                                    <span class="date-joined">2021-12-24 12:20</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="receiver-id">300</td>
                                <td class="receiver-name">Hugh Jones</td>
                                <td class="email">hughjones@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-06-18 09:40</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="receiver-id">132</td>
                                <td class="receiver-name">Sasha Banks</td>
                                <td class="email">sashabanks@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-01-15 13:05</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="receiver-id">523</td>
                                <td class="receiver-name">Eric Daniel</td>
                                <td class="email">ericdaniel@gmail.com</td>
                                <td>
                                    <span class="date-joined">2021-04-11 07:45</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="receiver-id">330</td>
                                <td class="receiver-name">Dante Kroos</td>
                                <td class="email">dantekroos@gmail.com</td>
                                <td>
                                    <span class="date-joined">2021-11-28 09:22</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="odd">
                                <td class="receiver-id">720</td>
                                <td class="receiver-name">Raymond Zeze</td>
                                <td class="email">raymondzeze@gmail.com</td>
                                <td>
                                    <span class="date-joined">2023-01-22 15:12</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                            <tr class="even">
                                <td class="receiver-id">121</td>
                                <td class="receiver-name">David Senior</td>
                                <td class="email">davidsenior@gmail.com</td>
                                <td>
                                    <span class="date-joined">2022-08-09 11:32</span>
                                    <div class="view-detail">
                                        <button>View Detail</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="receiver-detail" class="table-item">
                    <div class="top-info">
                        <h2>Receiver Detail</h2>
                        <span class="back-arrow">
                            <i class="fa-regular fa-circle-left"></i>
                        </span>
                    </div>
                    <div class="info-container">
                        <form action="POST">
                            <div class="entry">
                                <label for="receiver-id-input">ID</label>
                                <input id="receiver-id-input" disabled type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="receiver-name-input">Name</label>
                                <input id="receiver-name-input" type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="receiver-email-input">Email</label>
                                <input id="receiver-email-input"  type="text" value="">
                            </div>
                            <div class="entry">
                                <label for="receiver-phone-input">Phone Number</label>
                                <input id="receiver-phone-input" type="text" value="+230 5 123 4567">
                            </div>
                            <div class="entry">
                                <label for="receiver-address-input">Address</label>
                                <input id="receiver-address-input" type="text" value="3 Koboo Close, Off Saint Laurel Road, New York, America">
                            </div>
                            <div class="entry">
                                <label for="receiver-date-joined-input">Date Joined</label>
                                <input id="receiver-date-joined-input" type="text" value="">
                            </div>
                            <input type="submit" value="Save Changes">
                        </form>
                    </div>
                </div>
            </div>
        </main>
        
    </section>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function () {
$('#example').DataTable();
});

function setActive(num)
{
    if(num==1)
    document.getElementById("donation-history").style.display="none"
    if(num==0)
    document.getElementById("donation-history").style.display="initial"
    document.getElementById("history-detail").style.display = "none";
}
function viewDonationDetails(e)
{
    var dataValues = e.getAttribute("data-value").split(",");
    document.getElementById("donation-history").style.display="none";
    document.getElementById("history-detail").style.display = "block";
    document.getElementById("history-detail").style.backgroundColor = "white";
    // document.getElementById("user-donor-id").innerHTML =dataValues[0]
    // document.getElementById("user-donor-name").innerHTML =dataValues[1]
    // document.getElementById("user-receiver-id").innerHTML =dataValues[2]
    // document.getElementById("user-receiver-name").innerHTML =dataValues[3]
    // document.getElementById("items-details").innerHTML =dataValues[4]
    // document.getElementById("item-quantity").innerHTML =dataValues[5]
    // document.getElementById("item-status").innerHTML =dataValues[6]
    // document.getElementById("donation-date").innerHTML =dataValues[7]

}
</script>
<script src="../js/settings-flyout.js"></script>
<script src="js/index.js"></script>
<script src="js/custom-back-arrow.js"></script>
</html>