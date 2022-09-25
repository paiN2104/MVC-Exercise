<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Exercise MVC</title>
</head>

<body>
  <?php

  require_once("controllerkaryawan.php");
  session_start();
  include_once("header.php");
  if (isset($_POST["submit"])) {
    insertkar();
  }
  if (isset($_POST["edit"])) {
    editKar($_POST['pos']);
  }
  if (isset($_GET["delete"])) {
    deletekar($_GET["delete"]);
  }
  ?>
  <?php
  if (isset($_SESSION['listkaryawan'])) {
    if (!$_SESSION['listkaryawan'] == 0) {
  ?>
      <h1 class="text-center">List Karyawan</h1>
      <div class="m-5">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama</th>
              <th scope="col">Jabatan</th>
              <th scope="col">Usia</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            foreach (indexkar() as $index => $karyawan) {
              $counter++;
              echo "
        <tr>
          <td>" . $counter . "</td>
          <td>" . $karyawan->nama . "</td>
          <td>" . $karyawan->jabatan . "</td>
          <td>" . $karyawan->usia . "</td>
          <td><a href='index.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a>
          <a href='index.php?edit=" . $index . "'><button class='btn btn-primary'>Edit</button></a></td>
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

  <h1 class="text-center">
    <?php
    if (isset($_GET['edit'])) {
      echo "Edit Karyawan";
    } else {
      echo "Tambah Karyawan";
    }
    ?>
  </h1>
  <form method="POST" action="index.php" class="m-5 p-5 border">
    <div class="mb-3">
      <label for="InputNama" class="form-label">Nama</label>
      <input type="text" class="form-control" id="InputNama" aria-describedby="emailHelp" name="InNama" value="<?php
                                                                                                                if (isset($_GET['edit'])) {
                                                                                                                  echo $_SESSION['listkaryawan'][$_GET['edit']]->nama;
                                                                                                                }
                                                                                                                ?>">
    </div>
    <div class="mb-3">
      <label for="InputJabatan" class="form-label">Jabatan</label>
      <input type="text" class="form-control" id="InputJabatan" name="InJab" value="<?php
                                                                                    if (isset($_GET['edit'])) {
                                                                                      echo $_SESSION['listkaryawan'][$_GET['edit']]->jabatan;
                                                                                    } ?>">
    </div>
    <div class="mb-3">
      <label for="InputUsia" class="form-label">Usia</label>
      <input type="number" class="form-control" id="InputUsia" name="InUsia" value="<?php
                                                                                    if (isset($_GET['edit'])) {
                                                                                      echo $_SESSION['listkaryawan'][$_GET['edit']]->usia;
                                                                                    }
                                                                                    ?>">
    </div>
    <div>
      <input type="hidden" name="pos" value='<?= $_GET['edit'] ?>'>
    </div>
    <button name="<?php
                  if (isset($_GET['edit'])) {
                    echo "edit";
                  } else {
                    echo "submit";
                  }
                  ?>" type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>