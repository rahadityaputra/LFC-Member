<?php 
// file ini berfungsi untuk login admin


// cek apakah admin sebelumnya dalam keadaan login atau tidak , jika iya maka admin tidak perlu login lagi
session_start();
if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
  header('Location:index.php');
  exit;
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LFC Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="src/style/styles.css?v=<?php echo time(); ?>">
</head>

<body>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">
        <img src="image/liverpoolfc.png" alt="Logo" width="30" class="d-inline-block ">
        <span>Liverpool</span>
      </a>
    </div>
  </nav>

  <div class="main container-fluid row">
    <div class="jumbotron col-7"></div>
    <div class="form-member col px-1 text-white">
      <form action="./php/cek_login.php" class="p-3 m-3 rounded shadow" method="post" enctype="multipart/form-data">
        <h3 class="text-center">Welcome to the Kop!</h3>
        <p class="text-center">Ready to Never Walk Alone? Sign Up Today!</p>

        <div class="personal-info">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Your Username" required />
          </div>

          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required />
          </div>

        </div>
        <?php if (isset($_GET["error"]) &&  $_GET["error"] == 'true') { ?>
          <div class="error-login">
            <div class="alert alert-danger" role="alert">
              Incorrect username or password.
            </div>
          </div>
        <?php } ?>

        <!-- Submit Button -->
        <button type="submit" name="submit" class="btn btn-success">Login</button>

      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="src/script/script.js"></script>
</body>

</html>