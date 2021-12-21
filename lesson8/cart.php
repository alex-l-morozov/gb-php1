<?php
include_once (__DIR__ . "/connect.php");
include_once (__DIR__ . "/models/users.php");

$title = "Cart";
$page = "cart";

include_once (__DIR__ . "/include/header.php");
?>
<section class="block__page-nav">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="block__page-nav__title">New Arrivals </h1>
            </div>
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="./catalog.html">Men</a></li>
                        <li class="breadcrumb-item active" aria-current="page">New Arrivals</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="block__page-cart container">
    <?php
    $sql = "SELECT * FROM cart WHERE session_id='" . session_id() . "' AND order_id=0";
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
            <th scope="col" class="cart__col_head cart__col_head_center">ACTION</th>
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
            <td class="cart__text-padding"><a href="#" class="cart__link-del cart-del" data-product-id="<?=$arData['product_id']?>"><i class="fas fa-times-circle"></i></a></td>
        </tr>
        <?endwhile;?>
        </tbody>
    </table>
    <div class="row block__cart-button">
        <div class="col-6"><button class="btn btn-primary cart__button-white" type="button">cLEAR SHOPPING CART</button></div>
        <div class="col-6 block__cart-button__right"><button class="btn btn-primary cart__button-white" type="button">cONTINUE sHOPPING</button></div>
    </div>
    <div class="row block__cart-group">
        <?php if(Users::getInstance()->isLogin()):?>
        <div class="col-4"><p class="block__cart-group__heading">Shipping Adress</p>
            <form>
                <select class="form-select" aria-label="Bangladesh">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
                <input type="text" class="form-control" placeholder="State">
                <input type="text" class="form-control" placeholder="Postcode / Zip">
                <button class="btn btn-primary" type="submit">get a quote</button>
            </form>
        </div>
        <div class="col-4"><p class="block__cart-group__heading">coupon discount</p>
            <p class="block__cart-group__text">Enter your coupon code if you have one</p>
            <form>
                <input type="text" class="form-control" placeholder="State">
                <button class="btn btn-primary" type="submit">Apply coupon</button>
            </form>
        </div>
        <div class="col-4">
            <div class="block__cart-total">
                <p class="block__cart-sub__total">Sub total $<?=$total?></p>
                <p class="block__cart-total__weight">GRAND TOTAL <span class="block__cart-total__pink">$<?=$total?></span></p>
                <hr class="block__cart-total__hr">
                <a href="./profile.php?order=new" class="btn btn-primary" type="button">ORDER</a>
            </div>
        </div>
        <?php endif;?>
    </div>
</section>
<section class="main__box-shop__subscribe">
    <div class="container block__subscribe">
        <div class="block__subscribe-reviews">
            <div class="block__subscribe-review">
                <div class="block__subscribe-review__img">
                    <img src="./assets/images/reviews1.png" alt="">
                </div>
                <div class="block__subscribe-review__block">
                    <p class="block__subscribe-review__text">
                        “Vestibulum quis porttitor dui! Quisque viverra nunc mi,
                        a pulvinar purus condimentum a. Aliquam condimentum mattis neque sed pretium”
                    </p>
                    <p class="block__subscribe-review__name">
                        <span class="review__name-pink">Bin Burhan</span><br />
                        Dhaka, Bd
                    </p>
                    <div class="block__subscribe-review__selecters">
                        <button class="review__selecters-item"></button>
                        <button class="review__selecters-item"></button>
                        <button class="review__selecters-item"></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="block__subscribe-form">
            <h4 class="block__subscribe-form__heading">Subscribe</h4>
            <p class="block__subscribe-form__text">FOR OUR NEWLETTER AND PROMOTION</p>
            <form class="block__subscribe-form__item">
                <input class="subscribe__form-input" type="email" name="email" value="" placeholder="Enter Your Email">
                <button class="subscribe__form-button" type="submit">Subscribe</button>
            </form>
        </div>
    </div>

</section>
<?
include_once (__DIR__ . "/include/footer.php");
?>