<?php include "header.php"?>

<body>

  <section class="container" id="custlist">
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
        <div class="col-sm-8">
          <div class="from-group searchInput">
            <input type="search" class="from-control" id="search" placeholder="Search">
          </div>
        </div>
      </div>
      <div class="row overflow-x">

        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col"># Sl.No</th>
              <th scope="col">Name</th>
              <th scope="col">Account Number </th>
              <th scope="col">View Details</th>
              <th scope="col">View All Transactions</th>
            </tr>
          </thead>

          <tbody>
            <?php
            include "connection.php";
            $sl=1;
            $sql = "SELECT * FROM `customer`  \n"

    . "ORDER BY `customer`.`cust_id` ASC";
            $res = mysqli_query($con, $sql) or die("query failled");
            if(mysqli_num_rows($res)>0){
              while ($row=mysqli_fetch_assoc($res)) {
            ?>
                <tr>
                  <th scope="row"><?php echo $sl++; ?></th>
                  <td><?php echo $row['cust_name']; ?></td>
                  <td><?php echo $row['cust_acc']; ?></td>

                  <td><?php echo'<a href="cust-details.php?id=' . $row['cust_id'] . '" class="btn viewbtn">View</a>'?></td>
                  <td><?php echo'<a href="transaction.php?id=' . $row['cust_id'] . '" class="btn transbtn">Transactions</a>'?></td>
                </tr>
                <?php }
                }else{echo "<h2>Not Found</h2>";} 
                                ?>
          </tbody>
        </table>

      </div>
    </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/table.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/tablecust.js"></script>
  <script src="js/main.js"></script>


</body>

</html>
