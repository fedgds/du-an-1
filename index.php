<?php
// include "view/user/header.php";
require 'view/user/header.php';
if (isset($_GET['act']) && ($_GET['act'] != '')){
    $act = $_GET['act'];
    switch ($act) {
        case "signin" :
            require 'view/user/dangnhap.php';
            break;
        case "signup" :
            require 'view/user/dangky.php';
            break;
        case "forgetpass" :
            require 'view/user/quenmatkhau.php';
            break;
        case "detail" :
            require 'view/user/chitietsanpham.php';
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