<?php
$title = "Admin Product Edit";
$page = "order";

include_once (__DIR__ . "/connect.php");
include_once (__DIR__ . "/models/users.php");

use \Shop\Users;

if ((isset($_SESSION['login']) && $_SESSION['login'] != "")
    && (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    $arProfile = Users::getInstance()->getProfile(['login' =>$_SESSION['login'], 'password' => $_SESSION['password']], $connect);
    if ($arProfile['isSuccess'] == false) {
        header("Location: ./login.php");
    }
    if ($arProfile['user']['role'] != 'admin') {
        header("Location: ./profile.php");
    }
} else {
    header("Location: ./login.php");
}
if (!isset($_REQUEST['id']) || $_REQUEST['id'] == "") {
    $_REQUEST['id'] = 0;
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == "save") {
    if ($_REQUEST['id'] > 0) {
        mysqli_query($connect, "UPDATE products SET name='{$_REQUEST['name']}', price='{$_REQUEST['price']}', description='{$_REQUEST['description']}' WHERE id=". intval($_REQUEST['id']));
    } else {
        $sql = "INSERT INTO products (name, price, description, img_small, img_big) VALUES ('{$_REQUEST['name']}','{$_REQUEST['price']}','{$_REQUEST['description']}', 'product" . rand(1, 8) . ".jpg', 'product.jpg')";
        $result = mysqli_query($connect, $sql);
    }
    header("Location: ./admin_product.php");
}

$name = "";
$description = "";
$price = "";
if ($_REQUEST['id'] > 0) {
    $sql = "SELECT id, name, description, price FROM products WHERE id=". intval($_REQUEST['id']);
    $rsData = mysqli_query($connect, $sql);
    if ($arData = mysqli_fetch_assoc($rsData)) {
        $name = $arData['name'];
        $description = $arData['description'];;
        $price = $arData['price'];
    }
}
include_once (__DIR__ . "/include/header.php");
?>
    <section class="block__page-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="block__page-nav__title">Login</h1>
                </div>
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="block__order container">
        <?php if($arProfile['user']['role'] == 'admin'):?>
            <h2>Admin Block</h2>
            <div><a href="./admin_order.php">Admin Order</a></div>
            <div><a href="./admin_product.php">Admin Products</a></div>
        <?php endif;?>

        <h3>Products <?php if($_REQUEST['id'] > 0):?>Edit<?php else: ?>Add<?endif;?></h3>
        <form method="post" action="./admin_product_edit.php?id=<?=$_REQUEST['id'];?>&action=save">
            <p>Name: <input type="text" name="name" value="<?=$name?>"></p>
            <p>Description: <textarea name="description" rows="10"><?=$description?></textarea></p>
            <p>Price: <input type="text" name="price" value="<?=$price?>"></p>
            <p><input type="submit" name="submit" value="submit"></p>
        </form>
    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>