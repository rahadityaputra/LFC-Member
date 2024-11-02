<?php

$currentPage = 'dashboard';

?>

<!DOCTYPE html>
<html lang="en">

<?php include   '../views/template/head.php' ?>

<body>

    <?php include '../views/template/navbar.php' ?>

    <div class="main container-fluid">
        <!-- <div class="jumbotron col-7"></div> -->
        <div class="member-data-box container">
            <h2>Hello, Admin</h2>
            <h1>Dashboard Page</h1>


            <?php if (count($result) > 0) { ?>
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
                        <?php for ($i = 0; $i < count($result); $i++) { ?>
                            <tr>
                                <th scope="row"><?php echo $i + 1 ?></th>
                                <td><?php echo $result[$i]["name"] ?></td>
                                <td><?php echo $result[$i]["member_type"] ?></td>
                                <td><?php echo $result[$i]["join_date"] ?></td>
                                <td><?php echo $result[$i]["expired_date"] ?></td>
                                <td class="action">
                                    <a href="index.php?action=card_member&id=<?php echo $result[$i]["id_member"] ?>" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="index.php?action=input_member&mode=edit&id=<?php echo $result[$i]["id_member"] ?>" class="btn btn-success"><i class="bi bi-pencil"></i></a>
                                    <a href="index.php?action=delete_member&id=<?php echo $result[$i]["id_member"] ?>&image=<?php echo $result[$i]["image_path"] ?>" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            <?php } else { ?>
                <div class="container d-flex justify-centent-center align-items-center">
                    <span class="fw-bold fs-1">Data Member is Empty !</span>
                </div>
            <?php } ?>


        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>