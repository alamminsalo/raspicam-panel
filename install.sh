#!/bin/bash

sudo mkdir /etc/raspicam
sudo cp config.txt /etc/raspicam/config.txt
sudo cp raspicam-init /etc/init.d/raspicam-init
sudo cp raspicam /usr/local/bin/raspicam
sudo cp takepic.sh /usr/local/bin/takepic
sudo cp takevid.sh /usr/local/bin/takevid
