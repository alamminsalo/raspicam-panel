#!/bin/bash
rm output.h264 message.out sent

raspivid -t $2 -o output.h264 

EMAIL=$1

echo "Photo timestamp: $(date)" > message.out
raspistill -o image.jpg -vf -hf -n

sudo -u pi mutt -s "RaspiCam triggered" $EMAIL -a output.h264 < message.out

