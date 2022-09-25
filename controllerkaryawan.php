<?php
require_once("modelkaryawan.php");
require_once("controllermix.php");

function insertkar()
{
    if (!isset($_SESSION["listkaryawan"])) {
        $_SESSION["listkaryawan"] = array();
    }
    $karyawan = new karyawan();
    $karyawan->nama = $_POST["InNama"];
    $karyawan->jabatan = $_POST["InJab"];
    $karyawan->usia = $_POST["InUsia"];
    array_push($_SESSION["listkaryawan"], $karyawan);
}

function editKar($id){
    $_SESSION['listkaryawan'][$id]->setNama($_POST["InNama"]);
    $_SESSION['listkaryawan'][$id]->setJabatan($_POST["InJab"]);
    $_SESSION['listkaryawan'][$id]->setUsia($_POST["InUsia"]);
}
function indexkar()
{
    return $_SESSION["listkaryawan"];
}
function deletekar($id)
{
    foreach(indexmix() as $index=>$isi){
        if(indexkar()[$id]->nama==$_SESSION['listkaryawan'][$isi->nama]->nama){
            unset($_SESSION["listmix"][$index]);
            unset($_SESSION["listkaryawan"][$id]);
        }
    }
    unset($_SESSION["listkaryawan"][$id]);
}
