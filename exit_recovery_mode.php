<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Exiting recovery mode...</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
      <?php
      if(isset($_POST['exitRecoveryModeSubmit'])){
        shell_exec("sudo /home/pi/piRa1n/exit_recovery_mode.sh");
      }
      ?>
      Your iDevice is exiting recovery mode...
    </div>
  </body>
</html>
