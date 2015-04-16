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
sudo cp config/raspicam /etc/init.d/
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
