<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Text on Image Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mb-4">
                <div class="form-group">
                    <label for="user_text">Enter Text:</label>
                    <input type="text" name="user_text" id="user_text" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Generate Image</button>
            </form>

            <?php
            // Check if form is submitted
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Get user input from the form
                $userText = isset($_POST['user_text']) ? $_POST['user_text'] : '';

                // Create image resource
                $image = imagecreatefrompng("image.png");

                // Allocate colors
                $white = imagecolorallocate($image, 255, 255, 255);
                $black = imagecolorallocate($image, 0, 0, 0);

                // Add user text to image
                imagestring($image, 5, 10, 10, $userText, $black);

                // Output image to a temporary file
                $tempFileName = tempnam(sys_get_temp_dir(), 'output_image');
                imagepng($image, $tempFileName);

                // Free up memory
                imagedestroy($image);

                // Provide a link for the user to preview and download the image
                echo "<p class='mt-4'>Image generated successfully! Click the links below:</p>";
                echo "<img src='preview.php?tempFile=$tempFileName' class='img-fluid mb-2' alt='Image Preview'>";
                echo "<a href='download.php?tempFile=$tempFileName&text=$userText' class='btn btn-success' role='button'>Download Image</a>";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
