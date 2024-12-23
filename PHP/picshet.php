<?php
$img = imagecreate (88, 31);
$white = imagecolorallocate($img, 207, 238, 182);
$gray1 = imagecolorallocate($img, 110, 110, 110);
$gray2 = imagecolorallocate($img, 210, 210, 210);
$black1 = imagecolorallocate($img, 0, 0, 0);
imagerectangle($img,0,0,87,30,$gray2);
imagepolygon($img, Array(70, 22, 76, 9, 82, 22), 3, $gray1);

//Функция счетчика для вывода                                      c//
$rezview = file_get_contents('count.txt');
$rezview = explode("%%%", $rezview);
$rezview1 = preg_replace('/.*:/', '', $rezview[0]);
$rezview1 = explode(",", $rezview1);
imagestring($img, 2, 5, 2, $rezview1[0], $black1);
imagestring($img, 2, 5, 15, $rezview1[1], $black1);
header("Content-type: image/png; charset=utf-8");

imagepng($img);     // вывод изображения
imagedestroy($img); // освобождение памяти
?>