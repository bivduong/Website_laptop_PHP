<?php
session_start();
$string = md5(time());
$string = substr($string, 0, 6);

$_SESSION['captcha'] = $string;

$img = imagecreate(70,50);
$background = imagecolorallocate($img,3,158,227);
$text_color = imagecolorallocate($img, 0,0,0);
imagestring($img, 4,10,15, $string, $text_color);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>
