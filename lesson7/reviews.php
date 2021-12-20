<?
$title = "Reviews";
$page = "reviews";
include_once (__DIR__ . "/include/header.php");
?>
    <section class="block__page-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1 class="block__page-nav__title">Reviews</h1>
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
    <section class="container">
        <?
        include_once (__DIR__ . "/connect.php");
        $sql = "SELECT name, email, description, date FROM reviews WHERE active='Y' ORDER BY id DESC";
        $rsData = mysqli_query($connect, $sql);
        ?>
        <?php while ($arData = mysqli_fetch_assoc($rsData)) : ?>
            <div>
                Name: <?=$arData['name']?><br>
                E-mail: <?=$arData['email']?><br>
                Description: <?=$arData['description']?><br>
                Дата: <?=$arData['date']?></div>
        <?php endwhile;?>
        <hr>
        <form method="post" action="./addreviews.php">
            <p><strong>Add new reviews:</strong></p>
            <p>Name: <input type="text" name="name" maxlength="30" required></p>
            <p>E-mail: <input type="email" name="email" maxlength="20" required></p>
            <p>Description: <textarea name="text" rows="10" required></textarea></p>
            <p><input type="submit" name="submit" value="submit"></p>
        </form>
    </section>
<?
include_once (__DIR__ . "/include/footer.php");
?>