<?php include "header.php" ?>

<body>

    <section class="container" id="money">
        <header class="header">
            <div class="container">
                <nav class="navbar">
                    <a href="#" class="nav-logo">Bank Of Scraps</a>
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a href="customerlist.php" class="nav-link">Go Back</a>
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
        <div class="row overflow-x">

            <table class="table" id="myTable">
                <thead style="background-color: white;">
                    <tr>
                        <th scope="col"># Sl.No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Account Number </th>
                        <th scope="col">Select Customer</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    include "connection.php";
                    $id = $_GET['cid'];

                    $sl = 1;
                    $sql = "SELECT * FROM `customer`  \n"

                        . "ORDER BY `customer`.`cust_id` ASC";
                    $res = mysqli_query($con, $sql) or die("query failled");
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $sl++; ?></th>
                                <td><?php echo $row['cust_name']; ?></td>
                                <td><?php echo $row['cust_acc']; ?></td>

                                <td><?php echo '<a href="money.php?id=' . $id. '&& main_id=' . $row['cust_id'] . '" class="btn viewbtn">Select</a>' ?></td>
                            </tr>
                    <?php }
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </section>
    <script src="js/jquery.min.js"></script>
    <script src="js/table.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/tablecust.js"></script>
    <script src="js/main.js"></script>


</body>

</html>