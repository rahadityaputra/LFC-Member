<?php 
$currentPage = 'card';
?>

<!DOCTYPE html>
<html lang="en">
<?php include   '../views/template/head.php' ?>
<body>
    <?php include   '../views/template/navbar.php' ?>
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
                                <img src="<?php echo $data[0]["image_path"] ?>" alt="Profile Picture">
                                <!-- <img src="" alt=""> -->
                            </div>
                            <h5 class="card-title">
                                <?php echo $data[0]["name"]; ?>
                            </h5>
                            <span class="badge badge-member badge-<?php echo $data[0]["member_type"]; ?>">
                                <?php echo $data[0]["member_type"]; ?> member
                            </span>
                            <p class="card-text mt-3">
                                Join Date: <?php echo $data[0]["join_date"]; ?><br>
                                Expired Date: <?php echo $data[0]["expired_date"]; ?>
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
                                        <td>
                                            <p><strong>Full Name</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["name"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Birth Date</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["birth"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Gender</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["gender"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Address</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["address"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Member ID</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["id_member"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Member Type</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["member_type"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Join Date</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["join_date"]; ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><strong>Expired Date</strong></p>
                                        </td>
                                        <td class="colon"><span>:</span></td>
                                        <td><span><?php echo $data[0]["expired_date"]; ?></span></td>
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