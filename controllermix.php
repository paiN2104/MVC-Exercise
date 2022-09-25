<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
require_once("modelmix.php");


if (!isset($_SESSION['listmix'])) {
    $_SESSION['listmix'] = array();
}

function insertmix()
{
    if (!isset($_SESSION['listmix'])) {
        $_SESSION['listmix'] = array();
    }
    $check = true;
    $mix = new mix();
    $mix->nama = $_POST["InName"];
    $mix->office = $_POST["InOffice"];
    foreach(indexmix() as $index=>$temp){
        if(($temp->nama == $mix->nama)&&($temp->office == $mix->office)){
            ?>
            <script>swal("Sudah Di Assign");</script>
            <?php
            $check = false;
        }
    }
    if($check==true){
        array_push($_SESSION["listmix"], $mix);
    }
    
}
function editmix($id){
    $_SESSION['listmix'][$id]->setNama($_POST['InName']);
    $_SESSION['listmix'][$id]->setOffice($_POST['InOffice']);
}
function indexmix()
{
    return $_SESSION["listmix"];
}
function deletemix($id)
{
    unset($_SESSION["listmix"][$id]);
}
