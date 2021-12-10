<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Nation Bank</title>
  <link rel="icon" type="image/x-icon" href="media/favicon.ico" />
  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

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
  <div id= "background-image-3">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0 text-warning fw-bold">Transfer History <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/><path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/><path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/><path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/></svg></h3>

         
        </div><hr noshade size="4" class="mt-5 mb-0"/>
      </header>

      <main class="px-3 mb-0">
        <div class="container">
          <br>
          <div class="row">
            <div class="col">
              <div class="table-responsive-sm">
                <div class="grid-container">
                  <table class="table3 mt-0">
                    <thead>
                      <tr class="text-uppercase text-dark">
                        <th scope="col" class="text-center py-2">Sr. No</th>
                        <th scope="col" class="text-center py-2">Payer</th>
                        <th scope="col" class="text-center py-2">Payee</th>
                        <th scope="col" class="text-center py-2">Amount</th>
                        <th scope="col" class="text-center py-2">Date & Time</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      include 'connect.php';
                      $sql = "SELECT * FROM history ";
                      $query = mysqli_query($conn, $sql);
                      while($rows = mysqli_fetch_assoc($query))
                      {
                        ?>
                        <tr>
                          <td class="py-2 text-white"><?php echo $rows['srno']; ?></td>
                          <td class="py-2 text-white"><?php echo $rows['payer'];?></td>
                          <td class="py-2 text-white"><?php echo $rows['payee']; ?></td>
                          <td class="py-2 text-white"><?php echo $rows['amount']; ?> </td>
                          <td class="py-2 text-white"><?php echo $rows['datetime']; ?> </td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>


    </div>
  </div>
</body>
</html>

