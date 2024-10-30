<?php
// file ini berfungsi untuk menambah atau mengedit data member sesuai mode (mode edit atau mode tambah).
include "php/login_session_checker.php";
include "php/koneksi.php";

if (isset($_GET["mode"])) {
  $mode = $_GET["mode"];

  if ($mode == "edit" && isset($_GET["id"])) {
    // echo "mode edit bos";
    // ketika mode tambah member
    $id = $_GET["id"];
    $sqlQuery = "SELECT *  FROM members WHERE id_member = '$id'";
    $result = mysqli_query($koneksi, $sqlQuery);
    $row = mysqli_fetch_assoc($result);
    $name = $row["name"];
    $gender = $row["gender"];
    $address = $row["address"];
    $birth = $row["birth"];
    $phone_number = $row["phone_number"];
    $member_type = $row["member_type"];
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
          <a class="nav-link active" aria-current="page" href="./"><i class="bi bi-house"></i> Dashboard</a>
          <a class="nav-link" href="#"><i class="bi bi-plus-circle"></i> Input</a>
          <a class="nav-link" href="#"><i class="bi bi-box-arrow-in-right"></i> Logout</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="main container-fluid row">
    <!-- <div class="jumbotron col-7"></div> -->
    <div class="imput-member-box">
      <div class="container form-member col px-1 text-white">

        <!-- form -->
        <form action=<?php echo (isset($_GET["mode"]) && $mode == "edit") ? "php/edit_member.php" : "php/tambah_member.php"; ?> class="p-3 m-3 rounded shadow" method="post" enctype="multipart/form-data">
          <!-- tab untuk pindah form -->
          <input type="text" name="id" id="" hidden value="<?php echo $id; ?>">
          <div class="tab d-flex w-100 justify-content-around p-2">
            <div class="personal-info-panel p-2 rounded" disabled>Personal Info</div>
            <div class="account-details-panel p-2 rounded" data-bs-theme="light">Account Details</div>
            <div class="additional-info-panel p-2 rounded" disabled>Additional Info</div>
          </div>

          <!-- Personal Info -->
          <div class="personal-info">
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo (isset($name) ? $name : "") ?>" required />
            </div>

            <div class="mb-3">
              <label for="dob" class="form-label">Birth Date</label>
              <input type="date" class="form-control" id="dob" name="birth" value=<?php echo (isset($birth) ? $birth : "") ?> required />
            </div>

            <div class="mb-3">
              <label class="form-label">Gender</label>
              <!-- cek apakah yang male atau female data yang mau diedit -->
              <?php if (isset($gender) && $gender == "female") { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                  <label class="form-check-label" for="male">Male</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required checked>
                  <label class="form-check-label" for="female">Female</label>
                </div>
              <?php  } else { ?>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="male" value="male" required checked>
                  <label class="form-check-label" for="male">Male</label>
                </div>

                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                  <label class="form-check-label" for="female">Female</label>
                </div>

              <?php } ?>



            </div>

            <div class="mb-3">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter Your Full Address" required><?php echo isset($address) ? $address : "" ?></textarea>
              </textarea>
            </div>

            <button type="button" class="btn btn-primary" onclick="openTab('AccountDetails')">Next</button>
          </div>

          <!-- Account Details -->
          <div class="account-detail">
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" id="phone" name="phone-number" placeholder="Enter Your Phone Number" required value=<?php echo (isset($phone_number) ? $phone_number : "") ?> />
            </div>
            <button type="button" class="btn btn-danger" onclick="openTab('PersonalInfo')">Previous</button>
            <button type="button" class="btn btn-primary" onclick="openTab('AdditionalInfo')">Next</button>
          </div>

          <div class="additional-info">
            <div class="mb-3">
              <label for="member_type" class="form-label">Member Type</label>
              <select class="form-select" id="member_type" name="member-type" required>
                <option selected disabled>Choose Type Of Membership</option>
                <option value="regular" <?php if (isset($member_type) && $member_type == 'regular') echo 'selected'; ?>>Regular</option>
                <option value="student" <?php if (isset($member_type) && $member_type == 'student') echo 'selected'; ?>>Student</option>
                <option value="premium" <?php if (isset($member_type) && $member_type == 'premium') echo 'selected'; ?>>Premium</option>
                <option value="online" <?php if (isset($member_type) && $member_type == 'online') echo 'selected'; ?>>Online</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="payment-nominal" class="form-label">Payment Nominal</label>
              <input type="number" class="form-control" id="payment" name="payment-nominal" />
            </div>

            <div class="mb-3">
              <label for="id-card" class="form-label">Identity Card (Opsional)</label>
              <input type="file" class="form-control" id="id-card" name="card-photo" />
            </div>


            <button type="button" class="btn btn-danger" onclick="openTab(event, 'AccountDetails')">Previous</button>

            <!-- Submit Button -->
            <button type="submit" name="submit" class="btn btn-success">
              <?php
              if (isset($mode) && $mode ==  'edit') {
                echo  'Update';
                # code...
              } else {
                echo  'Add';
              }
              ?>
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="src/script/script.js"></script>
</body>

</html>