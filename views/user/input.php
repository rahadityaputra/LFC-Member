<?php

$currentPage = 'input';

?>

<!DOCTYPE html>
<html lang="en">

<?php include   '../views/template/head.php' ?>

<body>

    <?php include '../views/template/navbar.php' ?>

    <div class="main container-fluid row">
        <!-- <div class="jumbotron col-7"></div> -->
        <div class="imput-member-box">
            <div class="container form-member col px-1 text-white">

                <!-- form -->
                <form
                    action=<?php echo ($mode == "edit") ? "index.php?action=edit_member" : "index.php?action=add_member"; ?>
                    class="p-3 m-3 rounded shadow"
                    method="post"
                    enctype="multipart/form-data"> <!-- untuk  mengupload file gambar-->

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
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Your Name" value="<?php echo (isset($result[0]["name"]) ? $result[0]["name"] : "") ?>" required />
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label">Birth Date</label>
                            <input type="date" class="form-control" id="dob" name="birth" value=<?php echo (isset($result[0]["birth"]) ? $result[0]["birth"] : "") ?> required />
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <!-- cek apakah yang male atau female data yang mau diedit -->
                            <?php if (isset($result[0]["gender"]) && $result[0]["gender"] == "female") { ?>
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
                            <textarea class="form-control" id="address" rows="3" name="address" placeholder="Enter Your Full Address" required><?php echo isset($result[0]["address"]) ? $result[0]["address"] : "" ?></textarea>
                            </textarea>
                        </div>

                        <button type="button" class="btn btn-primary" onclick="openTab('AccountDetails')">Next</button>
                    </div>

                    <!-- Account Details -->
                    <div class="account-detail">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input type="text" class="form-control" id="phone" name="phone-number" placeholder="Enter Your Phone Number" required value="<?php echo (isset($result[0]["phone_number"]) ? $result[0]["phone_number"] : "") ?>" />
                        </div>
                        <button type="button" class="btn btn-danger" onclick="openTab('PersonalInfo')">Previous</button>
                        <button type="button" class="btn btn-primary" onclick="openTab('AdditionalInfo')">Next</button>
                    </div>

                    <div class="additional-info">
                        <div class="mb-3">
                            <label for="member_type" class="form-label">Member Type</label>
                            <select class="form-select" id="member_type" name="member-type" required>
                                <option selected disabled>Choose Type Of Membership</option>
                                <option value="regular" <?php if (isset($result[0]["member_type"]) && $result[0]["member_type"] == 'regular') echo 'selected'; ?>>Regular</option>
                                <option value="student" <?php if (isset($result[0]["member_type"]) && $result[0]["member_type"] == 'student') echo 'selected'; ?>>Student</option>
                                <option value="premium" <?php if (isset($result[0]["member_type"]) && $result[0]["member_type"] == 'premium') echo 'selected'; ?>>Premium</option>
                                <option value="online" <?php if (isset($result[0]["member_type"]) && $result[0]["member_type"] == 'online') echo 'selected'; ?>>Online</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="payment-nominal" class="form-label">Payment Nominal</label>
                            <input type="number" class="form-control" id="payment" name="payment-nominal" />
                        </div>
                        <?php if ($mode == 'add') { ?>
                            <div class="mb-3">
                                <label for="id-card" class="form-label">Identity Card (Opsional)</label>
                                <input type="file" class="form-control" id="id-card" name="card-photo" />
                            </div>
                        <?php } ?>


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
                <?php if (isset($_GET["payment"]) && $_GET["payment"] == 'false') { ?>
                    <div class="alert alert-waring">
                        The payment amount you entered is invalid. Please enter the correct amount !
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script/script.js"></script>
</body>

</html>