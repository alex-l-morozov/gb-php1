<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/config.inc.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/functions.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/header.php');
/**
 * 1. Создать галерею фотографий. Она должна состоять всего из одной странички, на которой пользователь видит все картинки в уменьшенном виде и форму для загрузки нового изображения. При клике на фотографию она должна открыться в браузере в новой вкладке. Размер картинок можно ограничивать с помощью свойства width. При загрузке изображения необходимо делать проверку на тип и размер файла.
 * 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, а просто передавая в функцию построения адрес папки с изображениями. Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.
 */
if (isset($_GET['save']) && $_GET['save'] == 'Y') {
    if ($_FILES['file']['error']) {
        $message = 'Ошибка загрузки файла!';
    } elseif ($_FILES['file']['size'] > 1000000) {
        $message = 'Файл слишком большой';
    } elseif (
        $_FILES['file']['type'] == 'image/jpeg'||
        $_FILES['file']['type'] == 'image/png' ||
        $_FILES['file']['type'] == 'image/gif'
    ) {
        $file_name = translit($_FILES['file']['name']);
        if (copy($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . DIR_UPLOAD_IMG . '/' . $file_name)) {
            resize_image(150,
                         150,
                         $_FILES['file']['tmp_name'],
                         $_SERVER['DOCUMENT_ROOT'] . DIR_UPLOAD_IMG_RESIZE . '/' . $file_name,
                         explode('/', $_FILES['file']['type'])[1]
            );
        } else {
            $message = 'Ошибка загрузки файла!';
        }
    } else {
        $message = 'Не правильный тип файла!';
    }
}
$arPhoto = array_slice(scandir($_SERVER['DOCUMENT_ROOT'] . DIR_UPLOAD_IMG_RESIZE), 2);
?>
    <div class="container">
        <form name="form" action="/lesson4.php?save=Y" method="post" enctype="multipart/form-data">
            <div class="row mt-3">
                <div class="col-6">
                    <label for="formFile" class="form-label">Загрузить изображение</label>
                    <input name="file" class="form-control" type="file" id="formFile">
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="col-6">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </form>
        <div class="row">
            <?php if(count($arPhoto) > 0):?>
            <?php foreach ($arPhoto as $photo):?>
            <div class="col-3">
                <a href="<?=DIR_UPLOAD_IMG?>/<?=$photo?>" target="_blank"><img src="<?=DIR_UPLOAD_IMG_RESIZE?>/<?=$photo?>"></a>
            </div>
            <?php endforeach;?>
            <?php endif;?>
        </div>
    </div>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/include/footer.php');