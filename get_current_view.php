<?php

    $cam = $_GET['camera'] ? $_GET['camera'] : 0;
    if($cam == 0) {
        $filename = "/var/log/cameramon/camera.dat";
        $filehandle = fopen($filename, 'rb');

        header("Content-Type: image/jpeg");
        header("Content-Length: " . filesize($filename));

        fpassthru($filehandle);
    } else {
        $filename = "img/" . $cam . ".jpg";
    
        $img = imagecreatefromjpeg($filename);
        $img_w = imagesx($img);
        $img_h = imagesy($img);

        $overlay = imagecolorallocatealpha($img, rand(0,255), rand(0,255), rand(0,255), rand(32,127));
        imagefilledrectangle($img, 0, 0, imagesx($img), imagesy($img), $overlay);

        $textcol = imagecolorallocate($img, 255, 255, 255);
        imagestring($img, 5, imagesx($img)-46, imagesy($img)-16, "CAM " . $cam, $textcol);
        imagestring($img, 5, 2, imagesy($img)-16, date("D d-m-Y G:i:s"), $textcol);

        header("Content-Type: image/png");
        imagepng($img);
        imagedestroy($img);
    }
