#!/bin/bash
sudo apt update
sudo apt upgrade -y
sudo apt install apache2 php git -y
sudo sed -i 's/.*DirectoryIndex.*/        DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm/g' /etc/apache2/mods-available/dir.conf
sudo systemctl restart apache2.service
cd /home/pi/
git clone https://github.com/raspberryenvoie/piRa1n-web.git
cd piRa1n-web/
sudo cp index.php options.php shutdown.php style.css stylesheet.css update.php update_status.php /var/www/html/
echo -e "\n# piRa1n-web\nwww-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/config.sh\nwww-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/shutdown.sh\nwww-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n-web/update.sh\n# End of piRa1n-web" | sudo EDITOR='tee -a' visudo
