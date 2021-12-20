<?php
$title = "Login page";
$page = "order";

include_once (__DIR__ . "/connect.php");
include_once (__DIR__ . "/models/users.php");

use \Shop\Users;

if ((isset($_SESSION['login']) && $_SESSION['login'] != "")
    && (isset($_SESSION['password']) && $_SESSION['password'] != "")) {
    if (Users::getInstance()->login(['login' =>$_SESSION['login'], 'password' => $_SESSION['password']], $connect)) {
        header("Location: ./profile.php");
    }
}
if ((isset($_REQUEST['login']) && $_REQUEST['login'] != "")
    && (isset($_REQUEST['password']) && $_REQUEST['password'] != "")) {
    if (Users::getInstance()->login(['login' =>$_REQUEST['login'], 'password' => $_REQUEST['password']], $connect)) {
        header("Location: ./profile.php");
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
    <div class="accordion" id="accordionOrder">
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading1">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                    Login
                </button>
            </h2>
            <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="heading1" data-bs-parent="#accordionOrder">
                <div class="accordion-body">
                    <div class="form__order">
                        <div class="mr-150">
                            <form name="" action="./login.php">
                                <h3 class="form__order-heading">Already registed?</h3>
                                <p class="form__order-text">Please log in below</p>
                                <div>
                                    <label class="form-label">Login <span>*</span></label>
                                    <input name="login" type="text" class="form-control" placeholder="">
                                </div>
                                <div class="mt-20">
                                    <label class="form-label">Password <span>*</span></label>
                                    <input name="password" type="password" class="form-control" placeholder="">
                                </div>
                                <p class="mt-20 form__order-text red">* Required Fileds</p>
                                <button class="btn btn-primary" type="submit">Log in</button> <a href="#" class="forgot">Forgot Password ?</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?
include_once (__DIR__ . "/include/footer.php");
?>

