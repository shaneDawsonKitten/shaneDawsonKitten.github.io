<?php
if (isset($_GET['tempFile']) && isset($_GET['text']) && file_exists($_GET['tempFile'])) {
    $tempFile = $_GET['tempFile'];
    $text = $_GET['text'];
    
    $image = imagecreatefrompng($tempFile);
    $black = imagecolorallocate($image, 0, 0, 0);
    imagestring($image, 5, 10, 10, $text, $black);
    
    header("Content-type: image/png");
    header("Content-Disposition: attachment; filename=output_image.png");
    imagepng($image);
    
    imagedestroy($image);
    unlink($tempFile); // Delete temporary file after download
} else {
    echo "Invalid request.";
}
?>
