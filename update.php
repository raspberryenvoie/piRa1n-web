<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Updating piRa1n...</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
       <strong>⚠️ Don't shutdown the Pi until the update are installed!</strong><br>
       You can find the status of the update <a href="update_status.php">here</a>.
      <?php
      if(isset($_POST['updateSubmit'])){
        shell_exec("nohup sudo /home/pi/piRa1n/update.sh > /dev/null 2>&1 &");
      }
      ?>
    </div>
  </body>
</html>
