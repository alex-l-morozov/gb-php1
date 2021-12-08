<?php
function resize_image($h, $w, $src, $new_src, $type) {
    $new_img = imagecreatetruecolor($h, $w);
    switch ($type) {
        case 'jpeg':
            $img = imagecreatefromjpeg($src);
            imagecopyresampled($new_img, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagejpeg($new_img, $new_src);
            break;
        case 'png':
            $img = imagecreatefrompng($src);
            imagecopyresampled($new_img, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagepng($new_img, $new_src);
            break;
        case 'gif':
            $img = imagecreatefromgif($src);
            imagecopyresampled($new_img, $img, 0, 0, 0, 0, $h, $w, imagesx($img), imagesy($img));
            imagegif($new_img, $new_src);
            break;
    }
}

function translit($string) {
    $translit = [
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch', 'ы' => 'y', 'ъ' => '', 'ь' => '', 'э' => 'eh', 'ю' => 'yu', 'я'=>'ya'
    ];

    return str_replace(' ', '_', strtr(mb_strtolower(trim($string)), $translit));
}