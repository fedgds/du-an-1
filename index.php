<?php
include "view/user/header.php";
if (isset($_GET['act']) && ($_GET['act'] != '')){
    $act = $_GET['act'];
    switch ($act) {
        case "sanpham" :

        break;
    }
} else{
    include "view/user/home.php";
}
include "view/user/footer.php";
?>