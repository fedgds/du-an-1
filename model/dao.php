<?php
function pdo_get_connection(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}
// Hàm thực thi câu lệnh INSERT DELETE UPDATE
function pdo_execute($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);

    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// Truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args=array_slice(func_get_args(),1);

    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows=$stmt->fetchAll();
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// Truy vấn  1 dữ liệu
function pdo_query_one($sql){
    $sql_args=array_slice(func_get_args(),1);
    try{
        $conn=pdo_get_connection();
        $stmt=$conn->prepare($sql);
        $stmt->execute($sql_args);
        $row=$stmt->fetch(PDO::FETCH_ASSOC);
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
pdo_get_connection();
function insert(){
    $sql = "INSERT INTO product (name, price, img, idcategory)
    VALUES ('ProductA', 19, 'productA.jpg', 1);
    
    INSERT INTO product_color (white, yellow, black, blue, idproduct)
    VALUES ('anhmuado', 'anhmauxanh', 'anhmutng', 'blue', LAST_INSERT_ID())";
    pdo_execute($sql);
}
function update(){
    $sql = "UPDATE product
    JOIN product_color ON product.id = product_color.idproduct
    SET product.name = 'NewProductA',
        product.price = 29,
        product.img = 'new_productA.jpg',
        product_color.white = 'new_anhmuado',
        product_color.yellow = 'new_anhmauxanh',
        product_color.black = 'new_anhmuâtng'
    WHERE product.id = 22";
    pdo_execute($sql);
}
function delete(){
    // Tắt ràng buộc khóa ngoại trước khi xóa sau đó bật lại
    $sql = "SET foreign_key_checks = 0;
    DELETE product, product_color
    FROM product
    LEFT JOIN product_color ON product.id = product_color.idproduct
    WHERE product.id = 22;
    SET foreign_key_checks = 1";
    pdo_execute($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input class="mr20" type="submit" name="themmoi" value="THÊM MỚI">
        <input class="mr20" type="submit" name="sua" value="UPDATE">
        <input class="mr20" type="submit" name="xoa" value="DELETE">
    </form>
    <?php
    if(isset($_POST['themmoi'])){
        insert();
    }
    if(isset($_POST['sua'])){
        update();
    }
    if(isset($_POST['xoa'])){
        delete();
    }
    ?>
</body>
</html>