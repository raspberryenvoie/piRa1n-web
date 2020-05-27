<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Shutting down your Pi...</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
      <?php
      if(isset($_POST['shutdownSubmit'])){
        echo shell_exec("nohup sudo /home/pi/piRa1n/shutdown.sh > /dev/null 2>&1 &");
        echo "Your Pi has been shut down!";
      }
      ?>
    </div>
  </body>
</html>
