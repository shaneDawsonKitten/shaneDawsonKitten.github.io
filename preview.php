<?php
if (isset($_GET['tempFile']) && file_exists($_GET['tempFile'])) {
    $tempFile = $_GET['tempFile'];
    header("Content-type: image/png");
    readfile($tempFile);
} else {
    echo "Invalid request.";
}
?>
