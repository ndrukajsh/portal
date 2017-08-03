<?php
function img_resize($target, $newcopy, $w, $h, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    //$scale_ratio = $w_orig / $h_orig;
    //if (($w / $h) > $scale_ratio) {
    //       $w = $h * $scale_ratio;
    //} else {
    //       $h = $w / $scale_ratio;
    //}
    $img = "";
    $ext = strtolower($ext);
    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    } else if($ext =="png"){ 
      $img = imagecreatefrompng($target);
    } else { 
      $img = imagecreatefromjpeg($target);
    }
    $tci = imagecreatetruecolor($w, $h);
    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 96);
}

$target_file = "user_img/lajmi3.jpg";
$resized_file = "user_img/lajmi333.jpg";
$wmax = 700;
$hmax = 400;
img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt="jpg");

//for ($i=1; $i <= 16 ; $i++) {
//  $target_file = "user_img/lajmi".$i."jpg";
//  $resized_file = "user_img/lajmi".$i."jpg";
//  $wmax = 200;
//  $hmax = 300;
//  img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
//
//}
?>

