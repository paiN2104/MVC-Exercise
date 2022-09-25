<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <title>Office</title>
</head>

<body>
  <?php
  require_once("controlleroffice.php");
  require_once("controllermix.php");
  session_start();
  include_once("header.php");
  if (isset($_POST["submit"])) {
    insertoff();
  }
  if (isset($_POST['edit'])) {
    editOff($_POST['pos']);
  }
  if (isset($_GET["delete"])) {
    deleteoff($_GET["delete"]);
  }
  ?>
  <?php
  if (isset($_SESSION['listoffice'])) {
    if (!$_SESSION['listoffice'] == 0) {
  ?>
      <h1 class="text-center">List Office</h1>
      <div class="m-5">
        <table class="table table-dark table-striped">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Office Name</th>
              <th scope="col">Address</th>
              <th scope="col">City</th>
              <th scope="col">Phone</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $counter = 0;
            foreach (indexoff() as $index => $office) {
              $counter++;
              echo "
      <tr>
        <td>" . $counter . "</td>
        <td>" . $office->nama . "</td>
        <td>" . $office->alamat . "</td>
        <td>" . $office->kota . "</td>
        <td>" . $office->notelp . "</td>
        <td><a href='viewoffice.php?delete=" . $index . "'><button class='btn btn-primary'>Delete</button></a>
        <a href='viewoffice.php?edit=" . $index . "'><button class='btn btn-primary'>Edit</button></a></td>
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

  <h1 class="text-center"><?php
                          if (isset($_GET['edit'])) {
                            echo "Edit Office";
                          } else {
                            echo "Tambah Office";
                          }
                          ?></h1>
  <form method="POST" action="viewoffice.php" class="m-5 p-5 border">
    <div class="mb-3">
      <label for="officename" class="form-label">Nama Office</label>
      <input type="text" class="form-control" id="InOffice" name="InOffice" aria-describedby="emailHelp" value="<?php
                                                                                                                if (isset($_GET['edit'])) {
                                                                                                                  echo $_SESSION['listoffice'][$_GET['edit']]->nama;
                                                                                                                }
                                                                                                                ?>">
    </div>
    <div class="mb-3">
      <label for="address" class="form-label">Address</label>
      <input type="text" class="form-control" id="InAdd" name="InAdd" value="<?php
                                                                              if (isset($_GET['edit'])) {
                                                                                echo $_SESSION['listoffice'][$_GET['edit']]->alamat;
                                                                              }
                                                                              ?>">
    </div>
    <div class="mb-3">
      <label for="city" class="form-label">City</label>
      <input type="text" class="form-control" id="InCity" name="InCity" value="<?php
                                                                                if (isset($_GET['edit'])) {
                                                                                  echo $_SESSION['listoffice'][$_GET['edit']]->kota;
                                                                                }
                                                                                ?>">
    </div>
    <div class="mb-3">
      <label for="telepon" class="form-label">Telepon</label>
      <input type="text" class="form-control" id="InTel" name="InTel" value="<?php
                                                                              if (isset($_GET['edit'])) {
                                                                                echo $_SESSION['listoffice'][$_GET['edit']]->notelp;
                                                                              }
                                                                              ?>">
    </div>
    <div>
      <?php
        if(isset($_GET['edit'])){
      ?>
      <input type="hidden" name="pos" value="<?= $_GET['edit'] ?>">
      <?php } ?>
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