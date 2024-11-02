
<?php 
$currentPage = 'login';
?>


<!DOCTYPE html>
<html lang="en">

<?php include   '../views/template/head.php' ?>

<body>

  <?php include '../views/template/navbar.php' ?>

  <div class="main container-fluid row">
    <div class="jumbotron col-7"></div>
    <div class="form-member col px-1 text-white">
      <form action="index.php?action=login_verification" class="p-3 m-3 rounded shadow" method="post">
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