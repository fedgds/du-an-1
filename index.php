<?php
require 'view/user/header.php';
if (isset($_GET['act']) && ($_GET['act'] != '')){
    $act = $_GET['act'];
    switch ($act) {
        case "sanpham" :

        break;
    }
} else{
    require 'view/user/home.php';
}
require 'view/user/footer.php';
?>