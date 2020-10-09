<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>piRa1n | Log</title>
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

    <div class="title">REFRESH TO SEE THE LOG IN REAL TIME</div>
    <div class="group">
      <div class="cell">
        <a class="cellLink" href="log.php">Refresh</a>
      </div>
    </div>

    <div class="title">JAILBREAK LOG</div>
    <div class="group">
      <pre class="cell" id="jailbreakLog"><?php echo shell_exec('sudo /home/pi/piRa1n/piRa1n --jailbreak-log'); ?></pre>
      <button class="cell" id="copyJailbreakLog">Copy to clipboard</button>
    </div>
    <div class="title">UPDATE LOG</div>
    <div class="group">
      <pre class="cell" id="updateLog"><?php echo shell_exec('sudo /home/pi/piRa1n/piRa1n --update-log'); ?></pre>
      <button class="cell" id="copyUpdateLog">Copy to clipboard</button>
    </div>
    <script src="scripts/toggleLightMode.js"></script>
    <script src="scripts/backButton.js"></script>
    <script src="scripts/copyLogToClipboard.js"></script>
  </body>
</html>
