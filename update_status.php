<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Status of updates</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
      <p>⚠️ Don't shut down the Pi until you see "Update completed"!<br>
        Please refresh this page!
      </p>
      <p>
      <?php
      readfile("/home/pi/piRa1n-web/update.out");
      ?>
      </p>
    </div>
  </body>
</html>
