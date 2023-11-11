<?php
// include "view/user/header.php";
require 'view/user/header.php';
if (isset($_GET['act']) && ($_GET['act'] != '')){
    $act = $_GET['act'];
    switch ($act) {
        case "dangnhap" :
            require 'view/user/dangnhap.php';
            break;
        case "dangky" :
            require 'view/user/dangky.php';
            break;
        case "cart" :
            require 'view/user/cart.php';
            break;
            
    }
} else{
    require 'view/user/home.php';
}
require 'view/user/footer.php';
?>