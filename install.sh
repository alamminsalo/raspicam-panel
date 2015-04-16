#!/bin/bash

#Compile raspicam binary
cd src
./compile.sh
cd ..

#Copy configuration files
echo 'Copying configuration files...'
if [ ! -d "/etc/raspicam" ]; then
	sudo mkdir /etc/raspicam
fi
sudo cp config/config.txt /etc/raspicam/

#The number of the beast!
sudo chmod 666 /etc/raspicam/config.txt

sudo cp config/raspicam /etc/init.d/

#Create runcommand on boot to rc.local
if [ -f "rc.local" ]; then
	rm rc.local
fi
touch rc.local
sh -c 'cat /etc/rc.local | grep -v raspicam | grep -v exit >> rc.local'
echo 'sudo service raspicam start' >> rc.local
echo 'exit 0' >> rc.local
chmod +x rc.local
sudo mv rc.local /etc/rc.local

if [ ! -d "/etc/nginx" ]; then
	sudo mkdir /etc/nginx
fi
sudo cp config/nginx.conf /etc/nginx/


#Install software binaries and scripts
echo 'Copying binaries and scripts to /usr/local/bin...'
sudo cp src/raspicam takepic takevid phpscripts/* /usr/local/bin/

#Install php-pages
echo 'Moving php-files to /var/www/php...'
if [ ! -d "/var/www/php" ]; then
	sudo mkdir -p /var/www/php
fi
sudo cp web/* /var/www/php


#Create nginx HTTPS-certs
echo 'Creating HTTPS certs...'
if [ ! -d "/etc/nginx/ssl" ]; then
	sudo mkdir /etc/nginx/ssl
fi
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/nginx/ssl/nginx.key -out /etc/n

echo 'All done!'

