#!/bin/bash

cd tmp

ls | grep -v $2 | xargs rm

raspistill -w 320 -h 240 -t 500 -o $1 &
#raspivid -ex night -w 320 -h 240 -t 2000 -fps 25 -o - | ffmpeg -i pipe:0 -y -vcodec libvpx -s 320x240 $1.webm > /dev/null 2>&1 &

