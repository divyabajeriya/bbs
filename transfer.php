<?php
include 'connect.php';

if(isset($_POST['submit']))
{
  $from = $_POST['from'];
  $to = $_POST['to'];
  $amount = $_POST['amount'];

  $sql = "SELECT * from users where account=$from";
  $query = mysqli_query($conn,$sql);
  $sql1 = mysqli_fetch_array($query);// returns array or output of user from which the amount is to be transferred.

  $sql = "SELECT * from users where account=$to";
  $query = mysqli_query($conn,$sql);
  $sql2 = mysqli_fetch_array($query);

  // constraint to check input of negative value by user
  if (($amount)<0)
  {
    echo '<script type="text/javascript">';
    echo "alert('Invalid Amount: Negative values cannot be transferred!')";  // showing an alert box.
    echo '</script>';
  }

  // constraint to check insufficient balance.
  

  // constraint to check zero values
  else if($amount == 0)
  {
    echo "<script type='text/javascript'>";
    echo "alert('Invalid Amount: Zero cannot be transferred!')";
    echo "</script>";
  }

  else
  {
  // deducting amount from payer's account
    $newbalance = $sql1['balance'] - $amount;
    $sql = "UPDATE users set balance=$newbalance where account=$from";
    mysqli_query($conn,$sql);

    // adding amount to reciever's account
    $newbalance = $sql2['balance'] + $amount;
    $sql = "UPDATE users set balance=$newbalance where account=$to";
    mysqli_query($conn,$sql);
                
    $payer = $sql1['name'];
    $payee = $sql2['name'];
    $sql = "INSERT INTO history(`payer`, `payee`, `amount`) VALUES ('$payer','$payee','$amount')";
    $query=mysqli_query($conn,$sql);

    if($query)
    {
      echo "<script> alert('Hurray!! Entered amount is transferred successfully!');
      window.location='index.html';
      </script>"; 
    }

    $newbalance= 0;
    $amount =0;

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Nation Bank</title>
  <link rel="icon" type="image/x-icon" href="media/favicon.ico" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"crossorigin="anonymous"/>

  <style>
  .bd-placeholder-img {
    font-size: 1.125rem;
    text-anchor: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    user-select: none;
  }

  @media (min-width: 768px) {
    .bd-placeholder-img-lg {
      font-size: 3.5rem;
    }
  }
  </style>

  <!-- Custom styles for this template -->
  <link href="style1.css" rel="stylesheet">
</head>

<body class="d-flex h-100 text-center text-white bg-dark">
  <div id= "background-image-2">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0 fw-bold">Transfer <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-coin" viewBox="0 0 16 16"><path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/><path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path fill-rule="evenodd" d="M8 13.5a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/></svg></h3>

        </div><hr noshade size="4" class="mt-5"/>
      </header>

      <main class="px-3 mb-0">
        <div class="container">
            
          <div class="container-transfer">
            <form method="POST" name="tcredit" class="transfer-form validate-form"><br>
             
                <label class="text-uppercase text-warning fw-bold mb-1">Transfer From:</label>
              <div class="wrap-input">
                <select class="input" name="from" required>
                  <option value="" disabled selected>Select a user</option>
                  <?php
                  include 'connect.php';
                  $sid=$_GET['id'];
                  $sql = "SELECT * FROM users ";
                  $result=mysqli_query($conn,$sql);
                  if(!$result)
                  {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                  }
                  while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['account'];?>" >
                      <?php echo $rows['account'] ;?>:  
                      <?php echo $rows['name'] ;?> (Balance: 
                      <?php echo $rows['balance'] ;?> )
                    </option>
                    <?php
                  }
                  ?>
                </select>
             
                <label class="text-uppercase text-warning fw-bold mb-1">Transfer To:</label>
              <div class="wrap-input">
                <select class="input" name="to" required>
                  <option value="" disabled selected>Select a user</option>
                  <?php
                  include 'connect.php';
                  $sid=$_GET['id'];
                  $sql = "SELECT * FROM users ";
                  $result=mysqli_query($conn,$sql);
                  if(!$result)
                  {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                  }
                  while($rows = mysqli_fetch_assoc($result)) {
                    ?>
                    <option class="table" value="<?php echo $rows['account'];?>" >
                      <?php echo $rows['account'] ;?>:  
                      <?php echo $rows['name'] ;?> (Balance: 
                      <?php echo $rows['balance'] ;?> )
                    </option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <br>
              <label class="text-uppercase text-warning fw-bold">Amount to transfer:</label>
              <div class="wrap-input validate-input">
                <input type="number" class="input" name="amount" required>
              </div>
              <br>
              <div class="text-center" >
                <button class="btn btn-outline-warning px-4 me-sm-3 fw-bold" name="submit" type="submit">Transfer</button>
              </div>
            </form>
        </div>
            </div>
          </div>
      </main>

    </div>
  </div>
</body>
</html>