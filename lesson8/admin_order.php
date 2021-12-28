<?php
$title = "Admin Order page";
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

        <h3>Orders</h3>
        <?php
        $sql0 = "SELECT * FROM orders" ;
        $rsData0 = mysqli_query($connect, $sql0);
        while ($arData0 = mysqli_fetch_assoc($rsData0)):

            ?>
            <h3>Order #<?=$arData0['id'];?></h3>
            <?php
            $sql = "SELECT * FROM cart WHERE order_id={$arData0['id']}";
            $rsData = mysqli_query($connect, $sql);
            ?>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" class="cart__col_head cart__col_head_one">Product Details</th>
                    <th scope="col" class="cart__col_head cart__col_head_center">unite Price</th>
                    <th scope="col" class="cart__col_head cart__col_head_center">Quantity</th>
                    <th scope="col" class="cart__col_head cart__col_head_center">shipping</th>
                    <th scope="col" class="cart__col_head cart__col_head_center">Subtotal</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $total = 0;
                while ($arData = mysqli_fetch_assoc($rsData)):
                    $sql1 = "SELECT id, name, price, img_small FROM products WHERE id=". intval($arData['product_id']);
                    $rsData1 = mysqli_query($connect, $sql1);
                    $arData1 = mysqli_fetch_assoc($rsData1);
                    ?>
                    <tr>
                        <td class="cart__img-padding"><div class="row">
                                <div class="col-3"><a href="./product.php?id=<?=$arData1['id']?>"><img src="./assets/images/<?=$arData1['img_small'];?>" alt="<?=$arData1['name']?>" style="width: 100px;"></a></div>
                                <div class="col-9">
                                    <p class="cart__text-heading"><a class="cart__text-heading__link" href="./product.php?id=<?=$arData1['id']?>"><?=$arData1['name']?></a></p>
                                </div>
                            </div></td>
                        <td class="cart__text-padding">$<?=$arData1['price']?></td>
                        <td class="cart__form-padding"><?=$arData['count']?></td>
                        <td class="cart__text-padding">FREE</td>
                        <?php
                        $total += $arData1['price'] * $arData['count'];
                        ?>
                        <td class="cart__text-padding">$<?=$arData1['price'] * $arData['count']?></td>
                    </tr>
                <?endwhile;?>
                </tbody>
            </table>
        <?endwhile;?>
    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>