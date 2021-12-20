<?
$title = "Main page";
$page = "index";
include_once (__DIR__ . "/include/header.php");
?>
    <section class="header__box-banner">
        <div class="container header__box-banner__block">
            <div class="header__box-banner__block-text">
                <h1 class="banner__text-heading">THE BRAND</h1>
                <div class="banner__text-desc">
                    OF LUXERIOUS <span class="banner__text-desc_pink">FASHION</span>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="main__box-shop__category">
            <div class="main__box-shop__category_block-left">
                <a href="./catalog.html" class="shop__category-block shop__category-block__1">
                    <div class="shop__category-block-text">
                        <h4 class="category__text-heading">HOT DEAL</h4>
                        <div class="category__text-desc">FOR MEN</div>
                    </div>
                </a>
                <a href="./catalog.html" class="shop__category-block shop__category-block__2">
                    <div class="shop__category-block-text">
                        <h4 class="category__text-heading">LUXIROUS & trendy</h4>
                        <div class="category__text-desc">ACCESORIES</div>
                    </div>
                </a>
            </div>
            <div class="main__box-shop__category_block-right">
                <a href="./catalog.html" class="shop__category-block shop__category-block__3">
                    <div class="shop__category-block-text">
                        <h4 class="category__text-heading">30% offer</h4>
                        <div class="category__text-desc">women</div>
                    </div>
                </a>
                <a href="./catalog.html" class="shop__category-block shop__category-block__4">
                    <div class="shop__category-block-text">
                        <h4 class="category__text-heading">new arrivals</h4>
                        <div class="category__text-desc">FOR kids</div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="main__box-shop__block-products">
            <h3 class="block-products__heading">Fetured Items</h3>
            <p class="text block-products__text">Shop for items based on what we featured in this week</p>
            <div class="main__box-shop__block-products_list">
                <?
                include_once (__DIR__ . "/connect.php");
                $sql = "SELECT id, name, price, img_small FROM products WHERE active='Y' ORDER BY sort DESC LIMIT 8";
                $rsData = mysqli_query($connect, $sql);
                ?>
                <?php while ($arData = mysqli_fetch_assoc($rsData)) : ?>
                    <div class="block-product__item">
                        <a href="./product.php?id=<?=$arData['id']?>" class="block-product__item-link">
                            <img src="./assets/images/<?=$arData['img_small']?>" class="block-product__item-img" alt="product 1">
                            <h5 class="block-product__item-heading"><?=$arData['name']?></h5>
                            <p class="block-product__item-price">$<?=$arData['price']?></p>
                        </a>
                        <div class="block-product__item-card-add">
                            <a class="item-card-add__link cart-add" data-product-id="<?=$arData['id']?>" href=""><img class="item-card-add__img" src="./assets/images/cart-add.svg" alt="cart-img">Add to cart</a>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
        <div class="block-product__button-block">
            <button class="block-product__button-all">Browse All Product <i class="fas fa-long-arrow-alt-right block-product__button-arrow"></i></button>
        </div>
    </section>
    <section class="container">
        <div class="main__box-shop__feature">
            <div class="main__box-shop__feature-img"></div>
            <div class="main__box-shop__feature-block">
                <div class="feature-block">
                    <div class="feature-block__icon feature-block__icon1"></div>
                    <div class="feature-block__text">
                        <h6 class="feature-block__heading">Free Delivery</h6>
                        <p class="feature-block__desc">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</p>
                    </div>
                </div>
                <div class="feature-block">
                    <div class="feature-block__icon feature-block__icon2"></div>
                    <div class="feature-block__text">
                        <h6 class="feature-block__heading">Sales & discounts</h6>
                        <p class="feature-block__desc">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</p>
                    </div>
                </div>
                <div class="feature-block">
                    <div class="feature-block__icon feature-block__icon3"></div>
                    <div class="feature-block__text">
                        <h6 class="feature-block__heading">Quality assurance</h6>
                        <p class="feature-block__desc">Worldwide delivery on all. Authorit tively morph next-generation innov tion with extensive models.</p>
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
    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>