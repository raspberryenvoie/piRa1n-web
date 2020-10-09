<?php
if (isset($_POST['optionsSubmit'])) {
  $autoRecoveryMode = (isset($_POST['autoRecoveryMode']) ? 'yes' : 'no');
  $autoShutdown = (isset($_POST['autoShutdown']) ? 'yes' : 'no');
  $safeMode = (isset($_POST['safeMode']) ? 'yes' : 'no');
  $verboseBoot = (isset($_POST['verboseBoot']) ? 'yes' : 'no');
  exec('printf "'.$autoRecoveryMode.'\n'.$autoShutdown.'\n'.$safeMode.'\n'.$verboseBoot.'\n" | sudo /home/pi/piRa1n/piRa1n -c');
  header("Location: /");
  exit();
} elseif (isset($_POST['odysseyra1nDoneSubmit'])) {
  exec('sudo /home/pi/piRa1n/piRa1n -S');
  header("Location: /");
  exit();
} elseif (isset($_POST['updateSubmit'])) {
  exec('sudo /home/pi/piRa1n/piRa1n -U');
  header("Location: update_status.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>piRa1n | Actions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
  </head>
  <body>
    <div class="header">
      <img src="arrow.png" alt="back" class="back" id="back" tabindex=0>
      <img src="logo.png" alt="logo" class="logo">
      <button class="toggle-light-mode" id="toggle-light-mode">
        <svg width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496"><path fill="currentColor" d="M8,256C8,393,119,504,256,504S504,393,504,256,393,8,256,8,8,119,8,256ZM256,440V72a184,184,0,0,1,0,368Z" transform="translate(-8 -8)"/></svg>
      </button>
    </div>

    <noscript>
      <div class="group">
        <div class="cell">Please enable Javascript!</div>
      </div>
    </noscript>

    <?php
    if (isset($_POST['shutdownSubmit'])) {
      exec('nohup sudo /home/pi/piRa1n/piRa1n -s > /dev/null 2>&1');
      echo '  <div class="group">
      <div class="cell">
        Your Pi has been shut down.
      </div>
    </div>';
    } elseif (isset($_POST['odysseyra1nIntroSubmit'])) {
      echo '  <form class="group" action="actions.php" method="post">
      <div class="cell">1. Restore rootfs</div>
      <div class="cell">2. Jailbreak using checkra1n but don\'t install Cydia</div>
      <div class="cell">(If "Auto shutdown" is enabled, you will need to unplug and replug the Pi to turn it back on.)</div>
      <div class="cell">3. Unplug your iDevice and unlock.</div>
      <input type="submit" name="odysseyra1nInstallSubmit" value="Next" >
    </form>';
    } elseif (isset($_POST['odysseyra1nInstallSubmit'])) {
      exec('nohup sudo /home/pi/piRa1n/piRa1n -o > /dev/null 2>&1 &');
      echo '  <form class="group" action="actions.php" method="post">
      <div class="cell">1. Replug your iDevice</div>
      <div class="cell">2. Once Sileo is installed, open it, do all the updates and install the libhooker package</div>
      <div class="cell">3. If you are finished, click on \'Done\' and re-jailbreak</div>
      <div class="cell">4. Don\'t forget to change the default root and mobile passwords of your iDevice</div>
      <div class="cell">Note: You don\'t have to reinstall odysseyra1n after each reboot, just re-jailbreak using checkra1n.</div>
      <input type="submit" name="odysseyra1nDoneSubmit" value="Done">
    </form>';
    } elseif (isset($_POST['exitRecoveryModeSubmit'])) {
      exec('sudo /home/pi/piRa1n/piRa1n -e');
      echo '  <div class="group">
      <div class="cell">
        Your iDevice is exiting recovery mode...
      </div>
    </div>';
    } else {
      echo '  <div class="group">
      <div class="cell">Doing nothing because no action was provided.</div>
    </div>';
    }
    ?>

    <script src="scripts/toggleLightMode.js"></script>
    <script src="scripts/backButton.js"></script>
  </body>
</html>
