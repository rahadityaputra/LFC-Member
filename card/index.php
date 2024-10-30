<?php
// file ini berfungsi untuk menampilkan data member berbentuk card dengan animasi tambahan
// foto kartu berasal dari folder ./photo , yang dimana data foto didapatkan saat pengisian data member (opsional).
// jika foto kartu tidak diinputkan / maka akan diganti foto default sesuai data gender.


include "../php/koneksi.php";

// ambil data id yang masuk
$id = $_GET["id"];

// ambil semua detail data dari id yang sudah didapatkan
$sqlQuery = "SELECT 
              *,
              CASE 
                WHEN member_type = 'regular' OR member_type = 'student' OR member_type = 'online' THEN join_date + INTERVAL 1 WEEk
                ELSE join_date + INTERVAL 1 MONTH
                END AS expired_date 
            FROM members WHERE id_member = '$id'";


$result = mysqli_query($koneksi,  $sqlQuery);
$data = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LFC Member Card</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="../src/style/card.css?v<?php echo time(); ?>">
</head>

<body>
  <nav class="navbar">
    <div class="container-fluid">
      <a class="navbar-brand text-white" href="#">
        <!-- <img src="../src/image/liverpoolfc.png" alt="Logo" width="30" class="d-inline-block "> -->
        <span>Liverpool</span>
      </a>
    </div>
  </nav>

  <div class="background"></div>
  <div class="overlay"></div>

  <div class="main container right-container">
    <div class="col-md-4">
      <div class="card">
        <div class="card-inner">
          <div class="card-front">
            <div class="card-header">
              <img src="../src/image/liverpoolfc.png" alt="logo" class="card-logo">
              <span>LFC Member</span>
            </div>
            <div class="card-body text-center">
              <div class="card-profile rounded-circle mb-3">
                <img src="<?php echo $data["image_path"] ?>" alt="Profile Picture">
                <!-- <img src="" alt=""> -->
              </div>
              <h5 class="card-title">
                <?php echo $data["name"]; ?>
              </h5>
              <span class="badge badge-member badge-<?php echo $data["member_type"];?>">
                <?php echo $data["member_type"]; ?> member
              </span>
              <p class="card-text mt-3">
                Join Date: <?php echo $data["join_date"]; ?><br>
                Expired Date: <?php echo $data["expired_date"]; ?>
              </p>
              <button class="flip-btn text-white btn btn-red">
                <i class="bi bi-arrow-repeat"></i>
                Flip Card
              </button>
            </div>
          </div>
          <div class="card-back">
            <div class="card-header">
              <h3>Member Bio</h3>
            </div>
            <div class="card-body">
              <table>
                <tbody>
                  <tr>
                    <td><p><strong>Full Name</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["name"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Birth Date</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["birth"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Gender</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["gender"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Address</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["address"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Member ID</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["id_member"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Member Type</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["member_type"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Join Date</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["join_date"]; ?></span></td>
                  </tr>
                  <tr>
                    <td><p><strong>Expired Date</strong></p></td>
                    <td class="colon"><span>:</span></td>
                    <td><span><?php echo $data["expired_date"]; ?></span></td>
                  </tr>
                </tbody>
              </table>
              <button class="flip-btn text-white btn">
                <i class="bi bi-arrow-repeat"></i>
                Flip Card
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const flipButtons = document.querySelectorAll(".flip-btn");
    const cardInner = document.querySelector(".card-inner");

    flipButtons.forEach(button => {
      button.addEventListener("click", () => {
        cardInner.classList.toggle("flipped");
      })
    })
  </script>
</body>

</html>