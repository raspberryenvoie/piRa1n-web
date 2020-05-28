#!/bin/bash
wget -q --spider https://google.com
if [ $? -eq 0 ]; then
  if [[ $(curl -sk https://raw.githubusercontent.com/raspberryenvoie/piRa1n/master/version) == "$(< /home/pi/piRa1n/version)" ]]; then
    echo 'piRa1n is up to date!'
  elif [[ $(curl -sk https://raw.githubusercontent.com/raspberryenvoie/piRa1n/master/version) != "$(< /home/pi/piRa1n/version)" ]]; then
    echo 'An update is available!'
  fi
else
    echo "Offline"
fi
