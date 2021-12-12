<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/templates/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/connect.php');

?>
    <div class="container">
        <div class="row mt-5">
            <a href="/lesson5/index.php">Вернуться в галерею</a>
            <?php
            if (intval($_GET['id']) > 0):
                $sql = "SELECT img_big, name, raiting FROM gallery WHERE id=". intval($_GET['id']);
                $rsData = mysqli_query($connect, $sql);
                if ($arData = mysqli_fetch_assoc($rsData)):
                    mysqli_query($connect, "UPDATE gallery SET raiting=raiting+1 WHERE id=". intval($_GET['id']));
            ?>
                    <div class="col-12">
                        <img src="<?=$arData['img_big']?>" alt="<?=$arData['name']?>">
                    </div>
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/templates/footer.php');