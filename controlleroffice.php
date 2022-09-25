<?php
require_once("modeloffice.php");
require_once("controllermix.php");

function insertoff()
{
    if (!isset($_SESSION['listoffice'])) {
        $_SESSION['listoffice'] = array();
    }
    $office = new office();
    $office->nama = $_POST["InOffice"];
    $office->alamat = $_POST["InAdd"];
    $office->kota = $_POST["InCity"];
    $office->notelp = $_POST["InTel"];
    array_push($_SESSION["listoffice"], $office);
}
function indexoff()
{
    return $_SESSION["listoffice"];
}
function editOff($id){
    $_SESSION['listoffice'][$id]->setNama($_POST['InOffice']);
    $_SESSION['listoffice'][$id]->setAlamat($_POST['InAdd']);
    $_SESSION['listoffice'][$id]->setKota($_POST['InCity']);
    $_SESSION['listoffice'][$id]->setNotelp($_POST['InTel']);
}
function deleteoff($id)
{
    foreach(indexmix() as $index=>$isi){
        if(indexoff()[$id]->nama==$_SESSION['listoffice'][$isi->nama]->nama){
            unset($_SESSION["listmix"][$index]);
            unset($_SESSION["listoffice"][$id]);
        }
    }
    unset($_SESSION["listoffice"][$id]);
}
