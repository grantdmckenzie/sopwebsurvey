<?php
session_start();
 
$str = "";
$length = 0;
for ($i = 0; $i < 6; $i++) {
	// these numbers represent ASCII table (small letters)
	$str .= chr(rand(97, 122));
}
 
//md5 letters and saving them to session
$letters = md5($str);
$_SESSION['letters'] = $letters;
 
//determine width and height for our image and create it
$imgW = 300;
$imgH = 100;
$image = imagecreatetruecolor($imgW, $imgH);
 
//setup background color and border color
$backgr_col = imagecolorallocate($image, 238,239,239);
$border_col = imagecolorallocate($image, 208,208,208);
 
//let's choose color in range of purple color
$text_col = imagecolorallocate($image, rand(70,90),rand(50,70),rand(120,140));
 
//now fill rectangle and draw border
imagefilledrectangle($image, 0, 0, $imgW, $imgH, $backgr_col);
imagerectangle($image, 0, 0, $imgW-1, $imgH-1, $border_col);
 
//save fonts in same folder where you PHP captcha script is
//name these fonts by numbers from 1 to 3
//we shall choose different font each time
$fn = rand(1,3);
$font = $fn . ".ttf";
 
//setup captcha letter size and angle of captcha letters
$font_size = $imgH / 2.2;
$angle = rand(-15,15);
$box = imagettfbbox($font_size, $angle, $font, $str);
$x = (int)($imgW - $box[4]) / 2;
$y = (int)($imgH - $box[5]) / 2;
imagettftext($image, $font_size, $angle, $x, $y, $text_col, $font, $str);
 
//now we should output captcha image
header("Content-type: image/png");
imagepng($image);
imagedestroy ($image);
?>