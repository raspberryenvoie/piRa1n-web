#!/bin/bash
wget -q --spider https://google.com
if [ $? -eq 0 ]; then
  if [[ $(curl -sk https://raw.githubusercontent.com/raspberryenvoie/piRa1n/master/version) == "$(< /home/pi/piRa1n/version)" ]]; then
    echo '0'
  elif [[ $(curl -sk https://raw.githubusercontent.com/raspberryenvoie/piRa1n/master/version) != "$(< /home/pi/piRa1n/version)" ]]; then
    echo '1'
  fi
else
    echo "2"
fi
