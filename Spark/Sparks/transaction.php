<?php include "header.php"?>

<body>

  <section class="container" id="custlist">
    <header class="header">
      <div class="container">
        <nav class="navbar">
          <a href="#" class="nav-logo">Bank Of Sparks</a>
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
              <th scope="col">Received Money</th>
              <th scope="col">Paid Money</th>
              <th scope="col">Transaction Date </th>
              <th scope="col">Transaction Details</th>


            </tr>
          </thead>

          <tbody>
            <?php
            include "connection.php";
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
            $sl=1;
            $sql = "SELECT * FROM `customer` WHERE cust_id=$id";
            $res = mysqli_query($con, $sql) or die("query failled");
            $row1=mysqli_fetch_assoc($res);
            $sql_trns="SELECT * FROM `transaction` WHERE account={$row1['cust_acc']}";
            $result = mysqli_query($con, $sql_trns) or die("query failled");

            if(mysqli_num_rows($result)>0){
              while ($row=mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                  <th scope="row"><?php echo $sl++; ?></th>
                  <td><?php echo $row['name']; ?></td>
                  <td><?php echo $row['account']; ?></td>
                  <td><?php echo $row['debit_amount']; ?></td>
                  <td><?php echo $row['credit_amount']; ?></td>
                  <td><?php echo $row['date']; ?></td>
                  <td><?php echo $row['transfer_details']; ?></td>
                </tr>
                <?php }
                }
             } ?>
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
