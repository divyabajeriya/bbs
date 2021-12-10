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
  <div id= "background-image-1">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
      <header class="mb-auto">
        <div>
          <h3 class="float-md-start mb-0 text-info fw-bold">Users <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/><path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg></h3>

         
        </div><hr noshade size="4" class="mt-5 mb-0"/>
      </header>

      <main class="px-3 mb-0">
        <?php
        include 'connect.php';
        $sql = "SELECT * FROM users ";
        $result = mysqli_query($conn,$sql);
        ?>

        <div class="container">
          <div class="row">
            <div class="col">
              <div class="table-responsive-sm">
                <table class="table1 mt-3">
                  <thead>
                    <tr class="text-uppercase text-dark">
                      <th scope="col" class="text-center py-2">Account</th>
                      <th scope="col" class="text-center py-2">Name</th>
                      <th scope="col" class="text-center py-2">E-Mail</th>
                      <th scope="col" class="text-center py-2">Balance</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    while($rows = mysqli_fetch_assoc($result)){
                      ?>
                      <tr>
                        <td class="py-2 text-white"><?php echo $rows['account'] ?></td>
                        <td class="py-2 text-white"><?php echo $rows['name']?></td>
                        <td class="py-2 text-white"><?php echo $rows['email']?></td>
                        <td class="py-2 text-white"><?php echo $rows['balance']?></td> 
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
      </main>



    </div>
  </div>
</body>
</html>