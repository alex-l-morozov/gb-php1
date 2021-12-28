<?php
$title = "Admin Product page";
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

        <h3>Products</h3>
        <div><a href="./admin_product_edit.php?id=0">Product Add</a></div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="cart__col_head cart__col_head_one">Product Details</th>
                <th scope="col" class="cart__col_head cart__col_head_center">unite Price</th>
                <th scope="col" class="cart__col_head cart__col_head_center">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT id, name, price, img_small FROM products";
            $rsData = mysqli_query($connect, $sql);
            while ($arData = mysqli_fetch_assoc($rsData)):
                ?>
                <tr>
                    <td class="cart__img-padding"><div class="row">
                            <div class="col-3"><a href="./product.php?id=<?=$arData['id']?>" target="_blank"><img src="./assets/images/<?=$arData['img_small'];?>" alt="<?=$arData['name']?>" style="width: 100px;"></a></div>
                            <div class="col-9">
                                <p class="cart__text-heading"><a class="cart__text-heading__link" href="./product.php?id=<?=$arData['id']?>"><?=$arData['name']?></a></p>
                            </div>
                        </div></td>
                    <td class="cart__text-padding">$<?=$arData['price']?></td>
                    <td class="cart__text-padding"><a href="./admin_product_edit.php?id=<?=$arData['id']?>">Edit</a></td>
                </tr>
            <?endwhile;?>
            </tbody>
        </table>

    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>