#!/bin/sh
sudo apt update
sudo apt upgrade -y
sudo apt install apache2 php -y
sudo sed -i 's/.*DirectoryIndex.*/        DirectoryIndex index.php index.html index.cgi index.pl index.xhtml index.htm/g' /etc/apache2/mods-available/dir.conf
sudo systemctl restart apache2.service
cd /home/pi/
git clone https://github.com/raspberryenvoie/piRa1n-web.git
cd piRa1n-web/
sudo cp index.php, options.php, shutdown.php, style.css, stylesheet.css, update.php, update_status.php /var/www/html/
printf "www-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/config.sh\nwww-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/shutdown.sh\nwww-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/update.sh" | sudo tee -a /etc/sudoers
