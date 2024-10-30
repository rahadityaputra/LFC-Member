<?php
// file ini berfungsi sebagai halaman utama atau dashboard


// cek sesi
include "php/login_session_checker.php";

// ambil data dari semua member dari database
include "php/koneksi.php";

$sqlQuery =  "SELECT 
              id_member, 
              name, 
              join_date, 
              member_type, 
              CASE 
                WHEN member_type = 'regular' OR member_type = 'student' OR member_type = 'online' THEN join_date + INTERVAL 1 WEEk
                ELSE join_date + INTERVAL 1 MONTH
                END AS expired_date
              FROM members";

$result = mysqli_query($koneksi, $sqlQuery);

const members = array();

$count_member = mysqli_num_rows($result);

if ($count_member > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $members[] = $row;
  }
}





?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>LFC Member</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="src/style/styles.css?v=<?php echo time(); ?>">
</head>

<body>
  <nav class="navbar navbar navbar-expand-lg" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">
        <!-- <img src="image/liverpoolfc.png" alt="Logo" width="30" class="d-inline-block "> -->
        <span>Liverpool</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-link active" aria-current="page" href="#"><i class="bi bi-house"></i> Dashboard</a>
          <a class="nav-link" href="input.php"><i class="bi bi-plus-circle"></i> Input</a>
          <a class="nav-link" href="php/logout.php"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="main container-fluid">
    <!-- <div class="jumbotron col-7"></div> -->
    <div class="member-data-box container">
      <h2>Hello, Admin</h2>
      <h1>Dashboard Page</h1>


      <?php if($count_member  > 0) { ?>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Type</th>
              <th scope="col">Join Date</th>
              <th scope="col">End Date</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php for ($i = 0; $i < count($members); $i++) { ?>
              <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php echo $members[$i]["name"] ?></td>
                <td><?php echo $members[$i]["member_type"] ?></td>
                <td><?php echo $members[$i]["join_date"] ?></td>
                <td><?php echo $members[$i]["expired_date"] ?></td>
                <td class="action">
                  <form class="d-inline" action="./card">
                    <input type="text" name="id" id="" value="<?php echo  $members[$i]["id_member"] ?>" hidden>
                    <button type="submit" class="btn btn-success"><i class="bi bi-eye"></i></button>
                  </form>
                  <form class="d-inline" action="input.php">
                    <input type="text" name="mode" value="edit" hidden>
                    <input type="text" name="id" id="" value="<?php echo  $members[$i]["id_member"] ?>" hidden>
                    <button type="submit" class="btn btn-success"><i class="bi bi-pencil"></i></button>
                  </form>
                  <form class="d-inline" action="php/hapus_member.php">
                    <input type="text" name="id" id="" value="<?php echo  $members[$i]["id_member"] ?>" hidden>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i></button>
                  </form>
                </td>
              </tr>
            <?php } ?>
  
          </tbody>
        </table>

      <?php } else {?>
        <div class="container d-flex justify-centent-center align-items-center">
          <span class="fw-bold fs-1">Data Member is Empty !</span>
        </div>
        <?php } ?>


    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>