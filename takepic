#!/bin/bash
rm /home/pi/sent

raspistill -o image.jpg -vf -hf -n -t 1200

EMAIL=$1

echo "Photo timestamp: $(date)" > message.out

sudo -u pi mutt -s "RaspiCam triggered" $EMAIL -a image.jpg < message.out

