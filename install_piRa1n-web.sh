#!/bin/sh
[ "$(id -u)" -ne 0 ] && {
    echo 'Please run as root'
    exit 1
}

[ -d /home/pi/piRa1n/ ] || { echo 'Install piRa1n first'; exit 1; }

GREEN="$(tput setaf 2)"
BLUE="$(tput setaf 6)"
NORMAL="$(tput sgr0)"
cat << EOF
${GREEN}#########################################${NORMAL}
${GREEN}#                                       #${NORMAL}
${GREEN}#  ${BLUE}Welcome to the piRa1n-web installer  ${GREEN}#${NORMAL}
${GREEN}#    ${BLUE}Made with <3 by raspberryenvoie    ${GREEN}#${NORMAL}
${GREEN}#                                       #${NORMAL}
${GREEN}#########################################${NORMAL}
EOF

# Update the system and install the dependencies
apt update
apt upgrade -y
apt install apache2 php git -y

# Install piRa1n-web
git clone 'https://github.com/raspberryenvoie/piRa1n-web.git'  /home/pi/piRa1n-web/

# Fix file permissions
chown -R pi:pi /home/pi/piRa1n-web/
chmod -R 755 /home/pi/piRa1n-web/

# Copy files to /var/www/html
rm -rf /var/www/html/*
cp -R /home/pi/piRa1n-web/html/* /var/www/html/

# Add sudoers file
cd /tmp/ || exit
cat << EOF > piRa1n-web
# piRa1n-web
www-data ALL=(ALL) NOPASSWD: /home/pi/piRa1n/piRa1n
EOF
chmod 440 piRa1n-web
if visudo -qcf piRa1n-web; then
  mv piRa1n-web /etc/sudoers.d/
else
  echo 'Failed to add the sudoers file! Add it youself.'
fi
rm -f piRa1n-web

echo 'All done!'
echo "Type $(hostname -I | awk '{print $1}') in a browser to access the web interface."
