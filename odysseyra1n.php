<?php
 if (isset($_POST['odysseyra1nDoneSubmit'])) {
  shell_exec("sudo /home/pi/piRa1n-web/odysseyra1n_done.sh");
  header("Location: /");
  die();
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Installing Odysseyra1n...</title>
  </head>
  <body>
    <?php if (isset($_POST['odysseyra1nSubmit'])){
      echo '<p><a href="/" class="back">&lt; Go back</a></p>';
    } ?>
    <div class="output">
      <?php
      if (isset($_POST['odysseyra1nSubmit'])){
        echo '<form action="odysseyra1n.php" method="post"><p>1. Restore rootfs<br>2. Jailbreak with Checkra1n but don\'t install Cydia (If "Auto shutdown" is enabled, you will need to unplug and replug the Pi to turn it back on).<br>3. Unplug your iDevice and unlock it.<br><input type="submit" value="Next" name="odysseyra1nNextSubmit"></p>';
      } elseif (isset($_POST['odysseyra1nNextSubmit'])) {
        shell_exec("nohup sudo /home/pi/piRa1n/odysseyra1n.sh > /dev/null 2>&1 &");
        echo '<form action="odysseyra1n.php" method="post"><p>4. Plug the device back into the Pi.<br>5. Once Sileo is installed, open it, do all the updates and install the libhooker package.<br>6. If you are finished, click Done and re-jailbreak.<br>⚠️ OpenSSH is installed by default. Please change the root password to prevent the possibility of unsavory people remotely logging into your device using the default password.<br>Note: You don\'t have to reinstall Odysseyra1n after each reboot, just re-jailbreak using Checkra1n.<br><input type="submit" value="Done" name="odysseyra1nDoneSubmit"></p>';
      } ?>
      </form>
    </div>
  </body>
</html>
