<?php
if (intval($_GET['id']) == 0) {
    header("Location: ./index.php");
}
include_once (__DIR__ . "/connect.php");
include_once (__DIR__ . "/models/users.php");

$sql = "SELECT id, name, description, price, img_big FROM products WHERE id=". intval($_GET['id']);
$rsData = mysqli_query($connect, $sql);
if (!($arData = mysqli_fetch_assoc($rsData))) {
    header("Location: ./index.php");
}
$title = $arData['name'];
$page = "product";
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
                            <li class="breadcrumb-item"><a href="./index.php">Home</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="block-product">
        <div class="block-product__container">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./assets/images/<?=$arData['img_big'];?>" alt="<?=$arData['name'];?>">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="block-product__detail">
            <h3 class="block-product__detail-collection">WOMEN COLLECTION</h3>
            <div class="block-product__detail-line"><div class="block-product__detail-line-pink"></div></div>
            <h2 class="block-product__detail-name"><?=$arData['name'];?></h2>
            <p class="block-product__detail-text"><?=$arData['description'];?></p>
            <div class="row">
                <div class="col-6 block-product__detail-property-left">MATERIAL: <span class="block-product__detail-property-val">COTTON</span></div>
                <div class="col-6 block-product__detail-property-right">DESIGNER: <span class="block-product__detail-property-val">BINBURHAN</span></div>
            </div>
            <div class="block-product__detail-price">$<?=$arData['price'];?></div>
            <div class="block-product__detail-line-long"></div>
            <div class="row block-product__detail-property-block">
                <div class="col-4 block-product__detail-property-name">CHOOSE COLOR</div>
                <div class="col-4 block-product__detail-property-name">CHOOSE SIZE</div>
                <div class="col-4 block-product__detail-property-name">QUANTITY</div>
            </div>
            <div class="row block-product__detail-property-form">
                <div class="col-4"><select class="form-select">
                        <option value="Red">Red</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select></div>
                <div class="col-4"><select class="form-select">
                        <option value="XXL">XXL</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select></div>
                <div class="col-4"><input type="number" class="form-control" value="1"></div>
            </div>
            <a href="" class="block-product__detail-cart cart-add" data-product-id="<?=$arData['id']?>"><img src="./assets/images/cart-pink.png" alt="cart" class="block-product__detail-cart-img">Add to Cart</a>
        </div>
    </section>
    <section class="container">
        <div class="main__box-shop__block-products">
            <h3 class="block-products__heading">you may like also</h3>
            <div class="main__box-shop__block-products_list">
                <div class="block-product__item">
                    <a href="#" class="block-product__item-link">
                        <img src="./assets/images/product1.jpg" class="block-product__item-img" alt="product 1">
                        <h5 class="block-product__item-heading">Mango  People  T-shirt</h5>
                        <p class="block-product__item-price">$52.00</p>
                    </a>
                    <div class="block-product__item-card-add">
                        <a class="item-card-add__link" href="#"><img class="item-card-add__img" src="./assets/images/cart-add.svg" alt="cart-img">Add to cart</a>
                    </div>
                </div>
                <div class="block-product__item">
                    <a href="#" class="block-product__item-link">
                        <img src="./assets/images/product2.jpg" class="block-product__item-img" alt="product 2">
                        <h5 class="block-product__item-heading">Mango  People  T-shirt</h5>
                        <p class="block-product__item-price">$52.00</p>
                    </a>
                    <div class="block-product__item-card-add">
                        <a class="item-card-add__link" href="#"><img class="item-card-add__img" src="./assets/images/cart-add.svg" alt="cart-img">Add to cart</a>
                    </div>
                </div>
                <div class="block-product__item">
                    <a href="#" class="block-product__item-link">
                        <img src="./assets/images/product3.jpg" class="block-product__item-img" alt="product 3">
                        <h5 class="block-product__item-heading">Mango  People  T-shirt</h5>
                        <p class="block-product__item-price">$52.00</p>
                    </a>
                    <div class="block-product__item-card-add">
                        <a class="item-card-add__link" href="#"><img class="item-card-add__img" src="./assets/images/cart-add.svg" alt="cart-img">Add to cart</a>
                    </div>
                </div>
                <div class="block-product__item">
                    <a href="#" class="block-product__item-link">
                        <img src="./assets/images/product4.jpg" class="block-product__item-img" alt="product 4">
                        <h5 class="block-product__item-heading">Mango  People  T-shirt</h5>
                        <p class="block-product__item-price">$52.00</p>
                    </a>
                    <div class="block-product__item-card-add">
                        <a class="item-card-add__link" href="#"><img class="item-card-add__img" src="./assets/images/cart-add.svg" alt="cart-img">Add to cart</a>
                    </div>
                </div>
            </div>
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
<?
include_once (__DIR__ . "/include/footer.php");
?>