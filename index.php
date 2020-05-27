<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>piRa1n</title>
  </head>
  <body>
    <div class="header">
      <a href="https://github.com/raspberryenvoie/piRa1n" class="title">piRa1n</a><br>
      Made with ♥️ by <a href="https://www.reddit.com/user/raspberryenvoie" class="author">raspberryenvoie</a>
    </div>
    <div class="options">
      <form action="options.php" method="post">
        <p>
          Auto shutdown:<br>
          <input type="checkbox" name="autoShutdown"<?php
    if( shell_exec("grep 'while true' /home/pi/piRa1n/piRa1n.sh")) {
    }
    else {
      echo "checked";
    }
 ?>>
        </p>
        <p>
          Safe mode:<br>
          <input type="checkbox" name="safeMode"<?php
    if( shell_exec("grep ' -s' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    }
 ?>>
        </p>
        <p>
          Verbose boot:<br>
          <input type="checkbox" name="verbose"<?php
    if( shell_exec("grep ' -v' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    }
  ?>>
        </p>
        <input type="submit" name="optionsSubmit" value="Apply">
      </form>
    </div>
    <div class="shutdown">
      <form action="shutdown.php" method="post">
        <p>
        Shut down the Pi:<br>
        <input type="submit" value="Shut down" name="shutdownSubmit">
        </p>
      </form>
    </div>
    <?php
    $localVersion = readfile('home/pi/piRa1n/version');
    $remoteVersion = shell_exec('curl -sk https://raw.githubusercontent.com/raspberryenvoie/piRa1n/master/version')
    if ($localVersion == $remoteVersion) {
      echo "piRa1n is up to date!";
    }
    elseif ($localVersion != $remoteVersion) {
      echo "    <div class="update">
            <form action="update.php" method="post">
              <p>
              Update:<br>
              <input type="submit" value="Update" name="updateSubmit">
              </p>
            </form>
          </div>";
    }
    ?>
  </body>
</html>
