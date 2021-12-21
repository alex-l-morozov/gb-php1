<?php
$title = "Profile page";
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
        Добрый день, <?=$arProfile['user']['name']?>!<br / >
        Ваш логин - <?=$arProfile['user']['login']?>
    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>