<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Employee & Office</title>
</head>

<body>
    <?php
    require_once("controllerkaryawan.php");
    require_once("controlleroffice.php");
    require_once("controllermix.php");
    session_start();
    include_once("header.php");
    if (isset($_POST["submit"])) {
        insertmix($_POST['InName'], $_POST['InOffice']);
    }
    if (isset($_GET["delete"])) {
        deletemix($_GET["delete"]);
    }
    if (isset($_POST["Edit"])) {
        editmix($_POST["index"]);
    }
    if (isset($_SESSION['listmix'])) {
        if (!$_SESSION['listmix'] == 0) {
    ?>
            <h1 class="text-center">Office Employee</h1>
            <div class="m-5">
                <table class="table table-striped table-dark p-4">
                    <thead>
                        <tr>
                            <th scope="col">Employee</th>
                            <th scope="col">Office</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">No Telp</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        foreach (indexmix() as $index => $data) {
                            $counter++;
                            echo "
          <tr>
            <td>" . indexkar()[$data->nama]->nama . "</td>
            <td>" . indexoff()[$data->office]->nama . "</td>
            <td>" . indexkar()[$data->nama]->jabatan . "</td>
            <td>" . indexkar()[$data->nama]->usia . "</td>
            <td>" . indexoff()[$data->office]->alamat . "</td>
            <td>" . indexoff()[$data->office]->kota . "</td>
            <td>" . indexoff()[$data->office]->notelp . "</td>
            <td><a href='viewmix.php?delete=" . $index . "'><button class='btn btn-primary me-2'>Delete</button></a><a href='viewmix.php?edit=" . $index . "'><button class='btn btn-primary'>Edit</button></a></td>
          </tr>
          ";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    <?php
        }
    }
    ?>
    <form action="viewmix.php" method="post" class="m-5 p-5 border">
        <label for="Name">Employee</label>
        <?php
        if (isset($_GET['edit'])) {
        ?>
            <input type="hidden" name="index" value="<?= $_GET['edit'] ?>">
        <?php
        }
        ?>

        <select class="form-select mb-2" aria-label="Default select example" name="InName">
            <?php
            if (isset($_GET['edit'])) {
            ?>
                <option value="<?= $_SESSION['listmix'][$_GET['edit']]->nama ?>" selected><?= $_SESSION['listkaryawan'][$_SESSION['listmix'][$_GET['edit']]->nama]->nama ?></option>
            <?php

            }
            ?>

            <?php
            foreach (indexkar() as $index => $karyawan) {
            ?>
                <option value="<?= $index ?>"><?= $karyawan->nama ?></option>
            <?php
            }
            ?>
        </select>
        <label for="Office">Office</label>
        <select class="form-select" aria-label="Default select example" name="InOffice">
            <?php
            if (isset($_GET['edit'])) {
            ?>
                <option value="<?= $_SESSION['listmix'][$_GET['edit']]->office ?>" selected><?= $_SESSION['listoffice'][$_SESSION['listmix'][$_GET['edit']]->office]->nama ?></option>
            <?php

            }
            ?>
            <?php
            foreach (indexoff() as $index => $office) {
            ?>
                <option value="<?= $index ?>"><?= $office->nama ?></option>
            <?php
            }
            ?>
        </select>
        <button name="<?php if (isset($_GET['edit'])) {
                            echo "Edit";
                        } else {
                            echo "submit";
                        }
                        ?>" type="submit" class="btn btn-primary">Submit</button>
    </form>
</body>

</html>

<!-- cheat code -->
<!-- $_SESSION['listkaryawan'][0]->nama; -->
<!-- $_SESSION['listkaryawan'][$data->nama]->nama -->