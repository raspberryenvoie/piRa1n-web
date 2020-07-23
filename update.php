<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Updating...</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
       <strong>⚠️ Don't shutdown the Pi until the updates are completed!</strong><br>
       You can find the update status <a href="update_status.php" class="updateStatus">here</a>.
      <?php
      if (isset($_POST['updateSubmit'])){
        shell_exec("nohup sudo /home/pi/piRa1n-web/update.sh > /dev/null 2>&1 &");
      }
      ?>
    </div>
  </body>
</html>
