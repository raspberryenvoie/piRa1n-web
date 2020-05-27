<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Code:400,600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <title>Applying the settings...</title>
  </head>
  <body>
    <p>
      <a href="/" class="back">&lt; Go back</a>
    </p>
    <div class="output">
      <?php
      if(isset($_POST['optionsSubmit'])){//to run PHP script on submit
        if(!empty($_POST['autoShutdown'])){
          $autoShutdown = "y";
        }
        else {
          $autoShutdown = "n";
        }
        if(!empty($_POST['safeMode'])){
          $safeMode = "y";
        }
        else {
          $safeMode = "n";
        }
        if(!empty($_POST['verbose'])){
          $verbose = "y";
        }
        else {
          $verbose = "n";
        }
      }
      echo shell_exec("cd /home/pi/piRa1n && printf '" .$autoShutdown. "\n" .$safeMode. "\n" .$verbose. "\n' | sudo ./config.sh");
      ?>
    </div>
  </body>
</html>
