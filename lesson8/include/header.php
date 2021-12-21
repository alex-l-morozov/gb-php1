<?php
use \Shop\Users;

if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == 'yes') {
    Users::getInstance()->logout();
    header("Location: ./index.php");
}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title; ?></title>
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="//use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <?php if ($page == "index"):?>
    <link rel="stylesheet" href="./assets/css/index.css">
    <?else:?>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/<?=$page;?>.css">

    <?endif; ?>
    <link rel="stylesheet" href="./assets/css/custom.css">
</head>
<body>
<header>
    <div class="header__box-top">
        <div class="container header__box">
            <div class="header__box-logo"><a href="./index.php"><img src="./assets/images/logo.png" alt="logo"></a></div>
            <div class="header__box-search">
                <form class="header__box-search__form">
                    <button class="search__form-browse">Browse <i class="fas fa-caret-down account__button-arrow"></i></button>
                    <input class="search__form-input" type="text" name="q" value="" placeholder="Search for Item...">
                    <button class="search__form-submit" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="header__box-cart">
                <a class="" href="./cart.php"><img src="./assets/images/cart.svg" alt="cart"></a>
            </div>
            <div class="header__box-account__box">
                <?php if(Users::getInstance()->isLogin()):?>
                    <a href="./profile.php" class="account__button">Profile</a>
                    <a href="./index.php?logout=yes" class="account__button">Logout</a>
                <?else:?>
                    <a href="./login.php" class="account__button">Login</a>
                <?endif;?>
            </div>
        </div>
    </div>
    <nav class="header__box-menu">
        <div class="container">
            <ul class="header__box-menu__list">
                <li class="header__box-menu__list_el">
                    <a class="header__box-menu__list_link" href="./index.html">Home</a>
                </li>
                <li class="header__box-menu__list_el">
                    <a class="header__box-menu__list_link" href="./catalog.html">Man</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__box-menu__list_el">
                    <a class="header__box-menu__list_link" href="./catalog.html">Women</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__box-menu__list_el">
                    <a class="header__box-menu__list_link" href="./catalog.html">Kids</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__box-menu__list_el header__box-menu__list_el_last">
                    <a class="header__box-menu__list_link" href="./catalog.html">Accoseriese</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__box-menu__list_el header__box-menu__list_el_last">
                    <a class="header__box-menu__list_link" href="./catalog.html">Features</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
                <li class="header__box-menu__list_el header__box-menu__list_el_last">
                    <a class="header__box-menu__list_link" href="./catalog.html">Hot deals</a>
                    <div class="menu__list_el-mega__box">
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Blazers</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Denim</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Leggings/Pants</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Skirts/Shorts</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Accessories</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                            </ul>
                        </div>
                        <div class="menu__list_el-mega__item">
                            <h3 class="menu__list_el-mega__heading">Man</h3>
                            <ul>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Dresses</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Tops</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Sweaters/Knits</a></li>
                                <li class="menu__list_el-mega__list"><a class="menu__list_el-mega__link" href="./catalog.html">Jackets/Coats</a></li>
                            </ul>
                            <a href="./product.html" class="menu__list-el-mega__sale">
                                <p class="menu__list-el-mega__sale_text">Super<br />sale!</p>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
<main>