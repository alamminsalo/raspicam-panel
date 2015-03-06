#!/bin/bash
rm image.jpg message.out sent

raspistill -o image.jpg -vf -hf -n

EMAIL=$1

echo "Photo timestamp: $(date)" > message.out

sudo -u pi mutt -s "RaspiCam triggered" $EMAIL -a image.jpg < message.out

