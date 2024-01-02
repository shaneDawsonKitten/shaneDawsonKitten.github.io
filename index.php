<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customized Image Generator</title>
    <style>
        canvas {
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <h1>Customized Image Generator</h1>
    <label for="userName">Enter Your Name:</label>
    <input type="text" id="userName" required>
    <button onclick="generateImage()">Generate Image</button>
    <canvas id="imageCanvas"></canvas>

    <script>
        function generateImage() {
            var userName = document.getElementById("userName").value;

            var canvas = document.getElementById("imageCanvas");
            var context = canvas.getContext("2d");

            // Load the template image
            var templateImage = new Image();
            templateImage.src = "template.jpg";

            templateImage.onload = function() {
                // Draw the template image
                context.drawImage(templateImage, 0, 0);

                // Set font properties
                context.font = "20px Arial";
                context.fillStyle = "black";

                // Text coordinates
                var x = 50;
                var y = 50;

                // Add text to the image
                context.fillText(userName, x, y);
            };
        }
    </script>
</body>
</html>
