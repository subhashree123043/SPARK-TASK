<?php
include "header.php";

include "connection.php";
$id = $_GET['id'];
?>

<body>

    <section class="container" id="view">
        <header class="header">
            <div class="container">
                <nav class="navbar">
                    <a href="#" class="nav-logo">Bank Of Spark</a>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="customerlist.php" class="nav-link">View Customer</a>
                        </li>
                    </ul>
                    <div class="hamburger">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </div>
                </nav>
            </div>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 det">
                    <div class="custimg">
                        <img src="pic/cust.jpg" class="img-fluid" alt="">
                    </div>
                    <?php echo '<a href="money.php?id=' . $id . '" class="button">Transfer Money</a>' ?>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <?php

                    $sql = "SELECT * FROM customer WHERE cust_id =$id";
                    $res = mysqli_query($con, $sql) or die("failled");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <div class="custdet">
                                    <label>Name</label>
                                <h2><?php echo $row['cust_name']; ?></h2>
                                <label>Account Number</label>
                                <p><?php echo $row['cust_acc']; ?></p>
                                <label>Address</label>
                                <p><?php echo $row['cust_addrs']; ?></p>
                                <label>Email</label>
                                <p><?php echo $row['cust_email']; ?></p>
                                <label>Mobile</label>
                                <p><?php echo $row['cust_mob']; ?></p>
                                <label>Current Balance</label>
                                <p><?php echo $row['cust_bank_ballance']; ?></p>

                            </div>
                            <?php echo '<a href="transaction.php?id=' . $id . '" class="btn trnshist">View all Transaction History</a>' ?>
                    <?php }
                    } else {
                        echo "<h2>Not Found</h2>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>
