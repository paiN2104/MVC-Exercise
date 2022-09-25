<?php
if (!isset($_SESSION["listkaryawan"])) {
  $_SESSION["listkaryawan"] = array();
}
if (!isset($_SESSION['listmix'])) {
  $_SESSION['listmix'] = array();
}
if (!isset($_SESSION['listoffice'])) {
  $_SESSION['listoffice'] = array();
}
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="index.php">Employee</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewoffice.php">Office</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="viewmix.php">Office-Employee</a>
        </li>
      </ul>
    </div>
  </div>
</nav>