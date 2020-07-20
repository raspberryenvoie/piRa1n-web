<!DOCTYPE html>
<!-- Have a nice day :) -->
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>piRa1n <?php readfile("/home/pi/piRa1n/version"); ?></title>
  </head>
  <body>
    <div class="header">
      <a href="https://github.com/raspberryenvoie/piRa1n" class="title">piRa1n <?php readfile("/home/pi/piRa1n/version"); ?></a><br>
      Made with ♥️ by <a href="https://www.reddit.com/user/raspberryenvoie" class="author">raspberryenvoie</a>
    </div>
    <div class="options">
      <form action="options.php" method="post">
        <p>
          Auto recovery mode:<br>
          <input type="checkbox" name="autoRecoveryMode" <?php
    if( shell_exec("grep 'ideviceenterrecovery' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    } ?>>
        </p>
        <p>
          Auto shutdown:<br>
          <input type="checkbox" name="autoShutdown" <?php
    if( shell_exec("grep 'shutdown' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    } ?>>
        </p>
        <p>
          Safe mode:<br>
          <input type="checkbox" name="safeMode" <?php
    if( shell_exec("grep ' -s' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    } ?>>
        </p>
        <p>
          Verbose boot:<br>
          <input type="checkbox" name="verbose" <?php
    if( shell_exec("grep ' -V' /home/pi/piRa1n/piRa1n.sh")) {
      echo "checked";
    } ?>>
        </p>
        <input type="submit" name="optionsSubmit" value="Apply">
      </form>
    </div>
    <div class="otherDiv">
      <form action="shutdown.php" method="post">
        <p>
        Shut down the Pi:<br>
        <input type="submit" value="Shut down" name="shutdownSubmit">
        </p>
      </form>
    </div>
    <div class="otherDiv">
      <form action="exit_recovery_mode.php" method="post">
        <p>
        If you're stuck in recovery mode:<br>
        <input type="submit" value="Exit" name="exitRecoveryModeSubmit">
        </p>
      </form>
    </div>
    <div class="otherDiv">
    <?php
    $lookForUpdates = shell_exec('/home/pi/piRa1n-web/look_for_updates.sh');
    if ($lookForUpdates == 0) {
      echo "piRa1n and Checkra1n are up to date!";
    }
    elseif ($lookForUpdates == 1) {
      echo '<form action="update.php" method="post"><p>An update is available!<br><input type="submit" value="Update" name="updateSubmit"></p></form>';
    }
    elseif ($lookForUpdates == 2) {
      echo 'You are offline!';
    } ?></div>
  </body>
</html>
