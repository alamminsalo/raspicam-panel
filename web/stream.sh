#!/bin/bash

cd tmp

mkfifo buf.webm

raspivid -ex night -w 320 -h 240 -t 2000 -fps 25 -o - | ffmpeg -i pipe:0 -y -vcodec libvpx -s 320x240 buf.webm > /dev/null 2>&1 &

