<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/templates/header.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/connect.php');

?>
<div class="container">
        <div class="row mt-5">
            <?php
            $sql = "SELECT id, name, img_small FROM gallery ORDER BY raiting DESC";
            $rsData = mysqli_query($connect, $sql);
            ?>
            <?php while ($arData = mysqli_fetch_assoc($rsData)) : ?>
            <div class="col-3">
                <a href="/lesson5/detail.php?id=<?=$arData['id']?>" target="_blank"><img src="<?=$arData['img_small']?>" alt="<?=$arData['name']?>" width="200"></a>
            </div>
            <?php endwhile;?>
        </div>
    </div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/lesson5/templates/footer.php');