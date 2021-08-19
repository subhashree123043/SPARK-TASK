<?php include "header.php";
include 'connection.php';
$id = $_GET['id'];
$mid =0;
if (isset($_GET['main_id'])) {
  $mid=$_GET['main_id'];
}
if(isset($_POST['submit']))
{
  $amount = $_POST['amount'];

  $sql_send = "SELECT * from  customer WHERE cust_id =$id";
  $query = mysqli_query($con,$sql_send);
  $row_send =mysqli_fetch_assoc($query);

  $sql_rec = "SELECT * from  customer WHERE cust_id =$mid";
  $query_rec = mysqli_query($con,$sql_rec);
  $row_rec = mysqli_fetch_assoc($query_rec);

  if (($amount)<0)
  {
       echo '<script type="text/javascript">';
       echo ' alert("Oops! Negative values cannot be transferred")';  // showing an alert box.
       echo '</script>';
   }


 
   // constraint to check insufficient balance.
   else if($amount > $row_send['cust_bank_ballance']) 
   {
       
       echo '<script type="text/javascript">';
       echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
       echo '</script>';
   }
   
 // constraint to check same account number.
   else if($row_send['cust_acc']==$row_rec['cust_acc']) 
   {
       
       echo '<script type="text/javascript">';
       echo ' alert("Bad Luck! You can not transfer money to your account")';  // showing an alert box.
       echo '</script>';
   }

   // constraint to check zero values
   else if($amount == 0){

        echo "<script type='text/javascript'>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }

    else {
        
      // deducting amount from sender's account
      $newbalance =$row_send['cust_bank_ballance'] - $amount;
      $sql_update_send = "UPDATE customer set cust_bank_ballance=$newbalance where cust_id=$id";
      mysqli_query($con,$sql_update_send) or die("failed to update1");
   

      // adding amount to reciever's account
      $newbalance = $row_rec['cust_bank_ballance'] + $amount;
      $sql_update_rec = "UPDATE customer set cust_bank_ballance =$newbalance where cust_id=$mid";
      mysqli_query($con,$sql_update_rec) or die("failed to update2");
      
      $sender = $row_send['cust_name'];
      $sender_acc=$row_send['cust_acc'];
      $receiver = $row_rec['cust_name'];
      $receiver_acc=$row_rec['cust_acc'];
      $transfer_details=$amount ." paid to " ."$receiver";
      $transfer_details_rec=$amount . " received from " . "$sender";
      $date=date("Y-m-d H:i:s",time());
      $sql_ins_send = "INSERT INTO transaction (account, name, debit_amount, credit_amount, transfer_details, date) VALUES ($sender_acc,'$sender',0,$amount,'$transfer_details','$date')";
      $query_ins_send=mysqli_query($con,$sql_ins_send);
      
      $sql_ins_rec = "INSERT INTO transaction(account, name, debit_amount, credit_amount, transfer_details, date) VALUES ($receiver_acc,'$receiver',$amount,0,'$transfer_details_rec','$date')";
      $query_ins_rec=mysqli_query($con,$sql_ins_rec);

      if($query_ins_send && $query_ins_rec){
           echo "<script> alert('Transaction Successful');
                           window.location='customerlist.php';
                 </script>";
          
      }else{
        die("failed");
      }

      $newbalance= 0;
      $amount =0;
}


}
?>

<body>

  <section class="container" id="money">
    <header class="header">
      <div class="container">
        <nav class="navbar">
          <a href="#" class="nav-logo">Bank Of Sparks</a>
          <ul class="nav-menu">
            <li class="nav-item">
              <?php echo '<a href="cust-details.php?id=' . $id . '" class="nav-link">Go Back</a>' ?>
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
        <div class="moneybox">
          <form action="<?php $_SERVER['PHP_SELF']; ?> " autocomplete="off" method="POST" class="form">
            <label>To Account</label>

            <?php echo '<a href="select-cust.php?cid=' . $id . '" class="btn btn-success " style="font-size: 20px; margin-left:20px;" id="modalbox" >Select Receiver</a>' ?>
            <?php
            if (isset($_GET['main_id'])) {
              $sql = "SELECT * FROM customer WHERE cust_id =$mid";
              $res = mysqli_query($con, $sql) or die("failled");
              if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                  <input type="text" class="form-control" value="<?php echo $row['cust_acc']; ?>">
                  <!-- Button trigger modal -->
            <?php }
              }
            } else {
              echo ' <input type="text" class="form-control" >';
            }
            ?>
            <label>Amount</label>
            <input type="text" name="amount" class="form-control">
            <div class="row"><input type="submit" name="submit" class="btn button" value="Send">
              <a href="cust-details.html" class="button">Cancel</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

</body>

</html>
