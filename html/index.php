<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>piRa1n | Home</title>
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

    <div class="title">OPTIONS</div>
    <form class="group" action="actions.php" method="post">
      <div class="cell">
        Auto recovery mode
        <label class="switchWrapper">
          <input type="checkbox" name="autoRecoveryMode" <?php echo ((exec('grep \'Auto_Recovery_Mode=false\' /home/pi/piRa1n/piRa1n.conf')) ? 'unchecked' : 'checked'); ?>>
          <span class="slider"></span>
        </label>
      </div>
      <div class="cell">
        Auto shutdown
        <label class="switchWrapper">
          <input type="checkbox" name="autoShutdown" <?php echo ((exec('grep \'Auto_Shutdown=false\' /home/pi/piRa1n/piRa1n.conf')) ? 'unchecked' : 'checked'); ?>>
          <span class="slider"></span>
        </label>
      </div>
      <div class="cell">
        Safe mode
        <label class="switchWrapper">
          <input type="checkbox" name="safeMode" <?php echo ((exec('grep \'Safe_Mode=true\' /home/pi/piRa1n/piRa1n.conf')) ? 'checked' : 'unchecked'); ?>>
          <span class="slider"></span>
        </label>
      </div>
      <div class="cell">
        Verbose boot
        <label class="switchWrapper">
          <input type="checkbox" name="verboseBoot" <?php echo ((exec('grep \'Verbose_Boot=true\' /home/pi/piRa1n/piRa1n.conf')) ? 'checked' : 'unchecked'); ?>>
          <span class="slider"></span>
        </label>
      </div>
        <input type="submit" name="optionsSubmit" value="Apply the changes">
    </form>

    <form class="group" action="actions.php" method="post">
      <input type="submit" name="shutdownSubmit" value="Shut down the Pi">
    </form>

    <form class="group" action="actions.php" method="post">
      <input type="submit" name="odysseyra1nIntroSubmit" value="Install odysseyra1n">
    </form>

<div class="title">IF YOU NEED TO BE IN RECOVERY MODE (CAN TAKE UP TO 15s, BE PATIENT)</div>
    <form class="group" action="actions.php" method="post">
      <input type="submit" name="recoveryModeSubmit" value="Enter recovery mode (Can take a minute to work)">
    </form>

    <div class="title">IF YOU'RE STUCK IN RECOVERY MODE</div>
    <form class="group" action="actions.php" method="post">
      <input type="submit" name="exitRecoveryModeSubmit" value="Exit recovery mode">
    </form>

    <div class="title">UPDATES</div>
    <form class="group" action="actions.php" method="post">
      <?php
      $lookForUpdates = shell_exec('sudo /home/pi/piRa1n/piRa1n -l');
      if ($lookForUpdates == 0) {
        echo '          <div class="cell">Everything is up-to-date</div>';
      } elseif ($lookForUpdates == 1) {
        echo '          <input type="submit" name="updateSubmit" value="Install updates">';
      } elseif ($lookForUpdates == 2) {
        echo '          <div class="cell">You are offline</div>';
      } else {
        echo '          <div class="cell">Could not look for updates</div>';
      }
      ?>
      <div class="cell">
        <a class="cellLink" href="https://github.com/raspberryenvoie/piRa1n/blob/master/CHANGELOG.md#changelog">What's new?</a>
      </div>
    </form>

    <div class="title">FOR MORE INFO</div>
    <div class="group">
      <div class="cell">
        <a class="cellLink" href="https://github.com/raspberryenvoie/piRa1n/wiki">Check out the wiki pages</a>
      </div>
    </div>

    <div class="title">LOG</div>
    <div class="group">
      <div class="cell">
        <a class="cellLink" href="log.php">View the log</a>
      </div>
    </div>

    <div class="footer">
      <a class="softwareVersion" href="https://github.com/raspberryenvoie/piRa1n">piRa1n <?php readfile('/home/pi/piRa1n/version'); ?></a><br>
      <a class="softwareVersion" href="https://github.com/raspberryenvoie/piRa1n-web">piRa1n-web <?php readfile('/home/pi/piRa1n-web/version'); ?></a><br>
      <a class="softwareVersion" href="https://checkra.in/"><?php readfile('/home/pi/piRa1n/checkra1n_version'); ?></a>

      <p>With &lt;3 from raspberryenvoie</p>
    </div>
    <script src="scripts/toggleLightMode.js"></script>
  </body>
</html>
